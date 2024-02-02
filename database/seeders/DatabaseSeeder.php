<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        Role::query()->insert(['name' => 'admin', 'created_by' => 1]);
        //insert user
        User::query()->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'roleid' => 1,
            'password' => Hash::make('123'),
            'created_by' => 1

        ]);
        $this->call([
            MenuSeed::class,
            // MachineModalSeeder::class,
            // ProductDefaultsSeeder::class,
            // DepartmentSeeder::class,
            // FormFieldsSeeder::class,
            // TaxCodeSeeder::class,
        ]);
    }
}