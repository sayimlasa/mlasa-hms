<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wing extends Model
{
    use HasFactory;
    public function wards(){
        return $this->hasMany(Ward::class);
    }

}
