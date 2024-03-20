<?php

namespace App\Http\Controllers\master;
use App\Http\Controllers\Controller;
use App\Models\Master\Menu;
use App\Models\Master\Permission;
use App\Models\Master\Role;
use App\Models\Master\RoleMenu;
use App\Models\Master\RolePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::list()->get();
        return view('master.roles.role-list', compact('roles'));
    }

    public function create($roleid = null)
    {
        $role = null;
        $replicateid = Request::capture()->get('replicateid');
        if ($roleid) {
            Gate::authorize('action', Permission::edit_user);
            $role = Role::query()->find($roleid);
            $role->submenus = RoleMenu::query()->where('roleid', $roleid)->pluck('submenuid');
            $role->permissions = RolePermission::query()->where('roleid', $roleid)->pluck('permissionid');
//            return $role;
        } else {

            Gate::authorize('action', Permission::add_user);
        }
        if ($replicateid) {
            $replicaterole = Role::query()->find($replicateid);
            $replicaterole->submenus = RoleMenu::query()->where('roleid', $replicateid)->pluck('submenuid');
            $replicaterole->permissions = RolePermission::query()->where('roleid', $replicateid)->pluck('permissionid');

            if ($role == null) $role = new Role();

            $role->id ?
                $role->name = $role->name
                : $role->name = \request()->get('name');

            $role->id ?
                $role->submenus = $role->submenus->merge($replicaterole->submenus)
                : $role->submenus = $replicaterole->submenus;
            $role->id ?
                $role->permissions = $role->permissions->merge($replicaterole->permissions)
                : $role->permissions = $replicaterole->permissions;
//            return \request();
        }


        $menus = Menu::query()->with(['submenus', 'permissions'])->get();
        $roles = Role::query()->where('id', '!=', 1)->get();
        return view('master.roles.create-role', compact('menus', 'roles', 'role'));
    }

    public function store(Request $request)
    {
        if (!Gate::allows('action', Permission::edit_user) &&
            !Gate::allows('action', Permission::add_user)) {
           //not allowed
        }

        Gate::authorize('action');
        $rolearray = $request->get('role');
        $submenus = $request->get('submenus') ?: [];
        $permissions = $request->get('permissions') ?: [];

        DB::beginTransaction();
        try {
            if (empty($rolearray['id'])) {
                $request->validate([
                    'role.name' => ['required', Rule::unique('roles', 'name')]
                ]);
                $rolearray['created_by'] = Auth::id();
                $role = Role::query()->create($rolearray);
            } else {
                $request->validate([
                    'role.name' => ['required', Rule::unique('roles', 'name')->ignore($rolearray['id'])]
                ]);
                $role = Role::query()->find($rolearray['id']);
                if (!$role) throw new \Exception('Role not found!');
                $rolearray['modified_by'] = Auth::id();
                $role->update($rolearray);

                RoleMenu::query()->where('roleid', $role->id)->delete();
                RolePermission::query()->where('roleid', $role->id)->delete();

            }
            RoleMenu::query()->insert(array_map(fn($subid) => ['roleid' => $role->id, 'submenuid' => $subid], $submenus));
            RolePermission::query()->insert(array_map(fn($pid) => ['roleid' => $role->id, 'permissionid' => $pid], $permissions));

            DB::commit();
        } catch (\Exception $e) {
            throw $e;
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->route('roles')->with('success', 'Role saved');
    }

    public function destroy(string $id){
    $role=Role::find($id);
    //check user exist
    if(!$role) return back()->with('error','Role not found');
    else{
        try{
            $role->delete();

        }catch(Exception $e){
            throw $e;
            return redirect()->back()->with('error',$e->getMessage());
        }
        return redirect()->route('roles')->with('success','Role successfully deleted');
    }
}

}
