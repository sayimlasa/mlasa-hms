<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\master\DoctorType;
use App\Models\master\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //insert role
        Role::query()->insert([
            'name' => 'admin',
            'created_by' => 1,
            ]);
        Role::query()->insert([
            'name' => 'doctor',
            'created_by' => 1,

        ]);
        Role::query()->insert([
            'name' => 'pharmacist',
            'created_by' => 1,
        ]);
        Role::query()->insert([
            'name' => 'nurse',
            'created_by' => 1,
        ]);
        Role::query()->insert([
            'name' => 'technician',
            'created_by' => 1,
        ]);
        Role::query()->insert([
            'name' => 'accountant',
            'created_by' => 1,
        ]);
        Role::query()->insert([
            'name' => 'receptionist',
            'created_by' => 1,
        ]);
        //insert user
        User::query()->insert([
            'fname' => 'admin',
            'lname' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'roleid' => 1,
            'password' => Hash::make('123'),
            'created_by' => 1

        ]);
        User::query()->insert([
            'fname' => 'admin',
            'lname' => 'admin',
            'username' => 'admin',
            'email' => 'doctor@gmail.com',
            'roleid' => 2,
            'password' => Hash::make('123'),
            'created_by' => 1

        ]);
        User::query()->insert([
            'fname' => 'receptionist',
            'lname' => 'receptionist',
            'username' => 'receptionist',
            'email' => 'receptionist@gmail.com',
            'roleid' => 7,
            'password' => Hash::make('123'),
            'created_by' => 1

        ]);
        User::query()->insert([
            'fname' => 'admin',
            'lname' => 'admin',
            'username' => 'admin',
            'email' => 'technician@gmail.com',
            'roleid' => 5,
            'password' => Hash::make('123'),
            'created_by' => 1

        ]);
        DoctorType::query()->insert([
            'name'=>'super specialist'
        ]);
        $this->call([
            MenuSeed::class,
            //MachineModalSeeder::class,
            //ProductDefaultsSeeder::class,
            //DepartmentSeeder::class,
            //FormFieldsSeeder::class,
            //TaxCodeSeeder::class,
        ]);
    }
}
