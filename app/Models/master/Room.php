<?php

namespace App\Models\Master;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function scopeList(){
        return DB::table('wards')
        ->join('rooms','rooms.wardid','=','wards.id')
        ->select('rooms.*','wards.name as ward_name')
        ;
    }
}
