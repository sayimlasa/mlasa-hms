<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public function scopeList(){
        return DB::table('wards')
        ->join('rooms','rooms.wardid','=','wards.id')
        ->select('roooms.*','wards.name as ward_name')
        ;
    }
}
