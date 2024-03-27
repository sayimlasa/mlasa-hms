<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\master\DoctorType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor=DoctorType::all();
        return view('master.doctortypes.doctortype-list',compact('doctor'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.doctortypes.doctortype-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function edit(string $id)
    {
        $doctor=DoctorType::find($id);
        if (!$doctor) return back()->with('error','doctor type not found');
        return view('master.doctortypes.doctortype-create',compact('doctor'));
    }

    public function store(Request $request)
    {
        $doctorarray=$request->get('doctor');
        if(empty($doctorarray['id'])){
            //create
            $doctorarray['created_by']=Auth::id();
            DoctorType::query()->create($doctorarray);
        }else{
            //update
            $doctor=DoctorType::query()->find($doctorarray['id']);
            if(!$doctor) return back()->with('error','doctor type not found');
            $doctorarray['updated_by']=Auth::id();
            $doctor->update($doctorarray);
        }
        return  redirect()->route('doctor.type')->with('successfully added');
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
