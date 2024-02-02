<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RolePermission extends Model
{
    use HasFactory;
   
    public function scopeList()
    {
        return DB::table('role_permissions','rp')
            ->join('roles as r','r.id','=','rp.roleid')
            ->join('permissions as p','p.id','=','rp.permissionid');
    }
}
