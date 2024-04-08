<?php

namespace App\Http\Controllers;

use App\Models\doctor\Assessment;
use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients=Assessment::list()->get();
        return view('technician.tech-list',compact('patients'));
    }
    public function show($id)
    {
        $patient=Assessment::list()->where('ass.id',$id)->first();
        return view('technician.tech-assessment')->with(['patient'=>$patient]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function save(Request $request)
    {
        $request->validate([
            'comment'=>'request',
            'patient_id'=>'request'
        ]);
       $patient=new Technician();
       $patient->patient_id=$request->ppatientId;
       $patient->ass_id=$request->disiease;
       $patient->comment=$request->comment;
       $patient->save();
        return redirect()->route('technician.index')->with('success','successfully save comment');
    }

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
