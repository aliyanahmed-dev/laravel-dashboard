<?php

namespace Database\Seeders;

use App\Models\Role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 'admin' role
        Role::create(['name' => 'admin', 'guard_name' => 'Administrator']);

        // Create 'teacher' role
        Role::create(['name' => 'teacher', 'guard_name' => 'Teacher']);

        // Create 'student' role
        Role::create(['name' => 'student', 'guard_name' => 'Student']);
    }
}
