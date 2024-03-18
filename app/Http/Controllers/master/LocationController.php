<?php
namespace App\Http\Controllers\master;
use App\Http\Controllers\Controller;
use App\Models\master\Branch;
use App\Models\master\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations=Location::list()->get();
        return view('master.locations.location-list',compact('locations'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches=Branch::all();
        return view('master.locations.location-create',compact('branches',));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
         $location=new Location();
         $location->name=$request->name;
         $location->created_by=Auth::id();
         $location->branch_id=$request->branch_id;
         $location->save();
        return redirect()->route('location')->with('success','location succesfully saved');
    }


    public function edit(string $id)
    {
        $location=Location::find($id);
        if (!$location) return back()->with('error','Location not found');
        $branches=Branch::all();
        return view('master.locations.location-edit',compact('location','branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',Rule::unique('locations','name')->ignore('id'),
            'branch_id'=>'required'
        ]);
        $location=Location::find($id);
        $location->name=$request->name;
        $location->branch_id=$request->branch_id;
        $location->updated_by=Auth::id();
        $location->update();
        return redirect()->route('location')
            ->with('success','Location successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
