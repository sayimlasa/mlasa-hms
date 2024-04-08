<?php

namespace App\Models\doctor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Assessment extends Model
{
    use HasFactory;
    public function scopeList()
    {
       return DB::table('assessments as ass')
       ->join('patients as p','ass.patient_id','=','p.patientId')
       ->select(['ass.*','p.first_name as pfirstname','p.middle_name as pmiddlename','p.last_name as plastname',
            'p.mobileno as pmobileno']);
    }
}
