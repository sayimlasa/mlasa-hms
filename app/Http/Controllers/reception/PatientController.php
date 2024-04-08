<?php

namespace App\Http\Controllers\reception;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\reception\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('receptionist.patients.patient-list', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('receptionist.patients.create-patient');
    }

    public function edit(string $id)
    {
        $patient = Patient::find($id);
        if (!$patient) return back()->with('error', 'patient not found');
        return view('patients.create-patient');
    }

    public function store(Request $request)
    {
        $patientarray = $request->get('patient');
        if (empty($patientarray['id'])) {
            $patientarray['created_by'] = Auth::id();
            $patientarray['patientId'] = mt_rand(1, 10000);
            Patient::query()->create($patientarray);
        } else {
            $patient = Patient::query()->find($patientarray['id']);
            if (!$patient) return back()->with('error', 'patient not found');
            $patientarray['updated_by'] = Auth::id();
            $patient->update($patientarray);
        }

        return redirect()->route('patient.view')->with('success', 'patient successfully saved');
    }

    public function active()
    {
        $patient = Consultation::list()->get();
        return view('receptionist.patients.patient-active', compact('patient'));

    }

    public function destroy(string $id)
    {
        $patient = Patient::find($id);
        if (!$patient) return back()->with('error', 'patient not found');
        $patient->delete();
        return redirect()->route('patient')->with('success', 'Patient successfully deleted');
    }

    public function view(Patient $patient)
    {
        return view('receptionist.patients.appointment', ['patient' => $patient]);
    }
}
