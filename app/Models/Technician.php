<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Technician extends Model
{
    use HasFactory;
    public function scopeList(){
        return DB::table('technicians as tech')
            ->join('patients as p','tech.patient_id','=','p.patientId')
            ->join('assessments as ass','tech.ass_id','=','ass.id')
            ->select(['tech.*','p.first_name as pfirstname','p.last_name as plastname',
                'p.middle_name as pmiddlename','p.mobileno as pmobileno',
                'p.dob as pdob','p.patientId as ppatientId','ass.disease as adisease','ass.description as adescription']);
    }
}
