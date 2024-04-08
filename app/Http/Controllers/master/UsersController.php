<?php
namespace App\Http\Controllers\master;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\master\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::list()->get();
        return view('master.users.list-user',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('master.users.create-user',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function edit( $userid)
    {
        $user = User::list()->where('u.id', $userid)->first();
        if(!$user) return back()->with('error','User not found');
        $roles = Role::all();
        return view('master.users.create-user',compact('roles','user'));
    }

    public function store(UserRequest $request)
    {
        $userarray = $request->get('user');
        if (empty($userarray['id'])) {//new
            $userarray['password'] = bcrypt('user123');
            $userarray['created_by'] = Auth::id();
            User::query()->create($userarray);
        } else {//update
            $user = User::query()->find($userarray['id']);
            if (!$user) redirect()->back()->with('error', 'User not found');
            $userarray['modified_by'] = Auth::id();
            $user->update($userarray);
        }
        return redirect()->route('users.list')->with('success', 'User saved!');
    }

    public function destroy(string $id)
    {
        $user=User::find($id);
        if(!$user) return redirect()>with('error','User not found');
        $user->delete();
        return redirect()->route('users.list')->with('success','User delete');
    }
}
