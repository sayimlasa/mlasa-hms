<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\master\Branch;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches=Branch::all();
        return view('master.branches.branch-list',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createbranch()
    {
     return view('master.branches.branch-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required'
        ]);
        $branch=new Branch();
        $branch->name=$request->name;
        $branch->created_by=Auth::id();
        $branch->save();
        return redirect()->route('branch.list')->with('success','Successfully saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branch=Branch::find($id);
        if(!$branch) return back()->with('error','Branch not found');
        return view('master.branches.branch-edit',compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required'
        ]);
        $branch=Branch::find($id);
        $branch->name=$request->name;
        $branch->updated_by=Auth::id();
        $branch->update();
        return redirect()->route('branch.list')->with('success','Branch successfully update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
