<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ward extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function wing(){
        return $this->belongsTo(Wing::class);
    }
    public function scopeList(){
    return DB::table('wards')
    ->join('wings','wings.id','=','wards.wing_id')
    ->select('wards.*','wings.name as wing_name');
    }
}
