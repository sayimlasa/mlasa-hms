<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\doctor\Assessment;
use App\Models\reception\Patient;
use App\Models\Technician;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patient = Consultation::list()->get();
        return view('receptionist.patients.patient-active', compact('patient'));
    }

    public function show(string $id)
    {
        $patient = Patient::find($id);
        return view('doctor.doctor-assesment')->with(['patient' => $patient]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'disease' => 'required',
        ]);
        $patient = new Assessment();
        $patient->patient_id=$request->patientId;
        $patient->disease = $request->disease;
        $patient->description = $request->description;
        $patient->save();
        return redirect()->route('doctor.index')->with('success','successfully saved assessment');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function patientfromtechnician()
    {
       $patients=Technician::list()->get();
       return view('doctor.patients-from-technician',compact('patients'));
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
