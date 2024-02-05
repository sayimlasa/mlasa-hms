<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\select;

class Location extends Model
{
    use HasFactory;
    public function scopeList()
    {
     return DB::table('locations as l')
    ->join('branches as b','b.id','=','l.branch_id')
    >select(['l.*','b.name as branch_name'])
    ;
    }
    public function  branch()
    {
        return $this->belongsTo(Branch::class);

    }
}
