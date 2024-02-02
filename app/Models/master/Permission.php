<?php

namespace App\Models\master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    const add_user = "add_user";
    const edit_user = "edit_user";
    const reset_password = "reset_password";
    const add_department = "add_department";
    const edit_department = "edit_department";
    const add_department_group = "add_department_group";
    const edit_department_group = "edit_department_group";
    const add_role = "add_role";
    const edit_role = "edit_role";
    const add_branch = "add_branch";
    const edit_branch = "edit_branch";
    const add_location = "add_location";
    const edit_location = "edit_location";
}
