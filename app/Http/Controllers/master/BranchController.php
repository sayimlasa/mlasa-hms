<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\master\Branch;
use App\Models\master\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch:: all();
        return view('master.branch.branch-list', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $branch='';
        $branchid = $request->get('branchid') ?? '';
        if(empty($branchid)){
            Gate::authorize('action', Permission::add_branch);
        }else{
            Gate::authorize('action', Permission::edit_branch);
            $branch=Branch::query()->where('branches.id',$branchid)->get();
        }
        return view('master.branch.branch-create',compact('branch'));
    }


    public function store(Request $request)
    {
        $branchArray = $request->get('branch');
        DB::beginTransaction();
        try {
            if (empty($branchArray['id'])) { //create
                Gate::authorize('action', Permission::add_branch);
                $branchArray['created_by'] = Auth::id();
                $branch = new Branch($branchArray);
                $branch->save();
            } else { //upated
                Gate::authorize('action', Permission::edit_branch);
                $branch = Branch::find($branchArray['id']);
                if (!$branch) return back()->with('error', 'Branch not found!');
                $branchArray['updated_by'] = Auth::id();
                $branch->update($branchArray);

            }



            DB::commit();
            return redirect()->route('branches')->with('success', 'Branches saved!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return back()->with('error', 'Failed to save branch');
        }
    }




    public function destroy(string $id)
    {
     $branch=Branch::find($id);
     if(!$branch) return back()->with('error','Branch is not found');
     else{
        try{
      $branch->delete();
        }catch(\Exception $e){
            throw $e;
        }
        return redirect()->route('branches')->with('success','branch successfuly deleted');
     }
    }
}
