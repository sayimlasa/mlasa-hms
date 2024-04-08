<?php

namespace App\Http\Controllers\reception;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\doctor\Assessment;
use App\Models\master\DoctorType;
use App\Models\master\Role;
use App\Models\reception\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class Appointment extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the current session ID
        $sessionId = $request->get('patientId');
        // Retrieve user based on session ID
        $patient = Patient::where('id', $sessionId)->first();
        return view('receptionist.patients.appointment',compact('patient'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function consultation(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Retrieve the selected value from the radio button
        $selection = $request->input('selection');
        // Pass the selection to the form view
        if($request->selection=="consultation") {
            $userRole = 'doctor'; // Specify the role you want to filter by
            $users = User::list()->where('name', $userRole)->get();
            $doctor = DoctorType::all();
            $patient=Patient::all();
            return view('receptionist.patients.consultation', ['selection' => $selection], compact('users', 'doctor','patient'));
        }
        else{
            $patients=Assessment::list()->get();
            return view('technician.tech-list', ['selection' => $selection],compact('patients'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id'=>'required',
            'doctor_type_id'=>'required',
            'consultation_fee'=>'required',
            'patient_id'=>'required'
        ]);
         DB::beginTransaction();
        try {
            $doctor=new Consultation();
            if($request->consultation_fee==10000) {
                $doctor->doctor_id = $request->doctor_id;
                $doctor->doctor_type_id = $request->doctor_type_id;
                $doctor->created_by = Auth::id();
                $doctor->consultation_fee = $request->consultation_fee;
                $doctor->patient_id=$request->patient_id;
                $doctor->status="active";
                $doctor->save();
            }else{
                return back()->with('error','Consultation fee should exactly 10,000 Tsh');
            }
            DB::commit();
            return  redirect()->route('patient.active')->with('success','patient saved');
        }catch (Exception $e){
            DB::rollBack();
            return back()->with('error','failed to save consultation');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient=Patient::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
