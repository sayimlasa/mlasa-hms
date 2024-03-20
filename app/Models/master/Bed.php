<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bed extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function scopeList(){
        return DB::table('beds')
            ->join('rooms','rooms.id','=','beds.roomid')
            ->select('beds.*','rooms.name as room_name')
            ;
    }
}
