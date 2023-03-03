<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*create user status*/
        \App\Models\UserStatus::create([
            'name' => 'Active',
            'description' => 'Active user',
        ]);
        \App\Models\UserStatus::create([
            'name' => 'Inactive',
            'description' => 'Inactive user',
        ]);
        \App\Models\UserStatus::create([
            'name' => 'Blocked',
            'description' => 'Blocked user',
        ]);
    }
}
