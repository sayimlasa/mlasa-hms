<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Consultation extends Model
{
    protected $guarded = [];
    public function scopeList()
    {
        return DB::table('consultations')
            ->join('patients', 'consultations.patient_id','=','patients.id' )
            ->join('users','consultations.doctor_id','=','users.id')
            ->join('doctor_types','consultations.doctor_type_id','=','doctor_types.id')
            ->select(['consultations.*', 'patients.first_name as pfname', 'patients.last_name as plname', 'patients.mobileno as pmobileno',
                'patients.nation as pnation','patients.dob as pdob','users.fname as dfname','users.lname as dlname','doctor_types.name as doctor_type_name']);

    }

}
