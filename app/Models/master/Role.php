<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeList()
    {
        return DB::table('roles', 'r')
            ->leftJoin('users as u', 'u.roleid', '=', 'r.id')
            ->groupBy('r.id')
            ->select(['r.*'])
            ->selectRaw('count(u.id) as usercount');
    }
}
