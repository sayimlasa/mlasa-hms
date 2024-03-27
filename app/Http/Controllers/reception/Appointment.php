<?php

namespace App\Http\Controllers\reception;

use App\Http\Controllers\Controller;
use App\Models\master\DoctorType;
use App\Models\master\Role;
use App\Models\reception\Patient;
use App\Models\User;
use Illuminate\Http\Request;
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
        $userRole = 'doctor'; // Specify the role you want to filter by
        $users = User::list()->where('name', $userRole)->get();
        $doctor=DoctorType::all();
            return view('receptionist.patients.consultation', ['selection' => $selection], compact('users','doctor'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
