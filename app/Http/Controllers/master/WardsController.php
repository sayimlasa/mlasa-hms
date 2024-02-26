<?php

namespace App\Http\Controllers\master;
use App\Models\master\Ward;
use App\Models\master\Wing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wards = Ward::list()->get();
        return view('master.wards.list-ward', compact('wards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $wings=Wing::all();
        return view('master.wards.create-ward',compact('wings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:wards',
            'wing_id'=>'required'
        ]);
        $ward=new Ward();
        $ward->name=$request->name;
        $ward->wing_id=$request->wing_id;
        $ward->save();
        return redirect()->route('ward.index')->with('wing Successfully saved');
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
        $ward = Ward::list()->first();
        if(!$ward) return back()->with('error','Ward not found');
        $wings=Wing::all();
        return view('master.wards.edit-ward',compact('ward','wings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required', Rule::unique('wards', 'name')->ignore('id'),
            'wing_id'=>'required'
        ]);
        $ward=Ward::find($id);
        $ward->name=$request->name;
        $ward->wing_id=$request->wing_id;
        $ward->update();
        return redirect()->route('ward.index')->with('ward Successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ward=Ward::find($id);
        if(!$ward) return back()->with('error','Ward successfully deleted');
        $ward->delete();
        return redirect()->route('ward.index');
    }
}
