<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class Ward extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [];

    public  function scopeList()
    {
        return DB::table('wards')
            ->join('wings','wards.wing_id','=','wings.id')
            ->select(['wards.*','wings.name as wing_name']);
    }

    public function wing(){
        return $this->belongsTo(Wing::class);
    }
}
