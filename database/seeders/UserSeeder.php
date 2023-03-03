<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*create admin user*/
        $admin = \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role_id' => \App\Models\Role::where('name', 'admin')->first()->id,
            'status_id' => \App\Models\UserStatus::where('name', 'Active')->first()->id,
        ]);

        /*create user*/
        $user = \App\Models\User::create([
            'name' => 'User',
            'email' => 'user@user.com',
            'username' => 'user',
            'password' => bcrypt('user'),
            'role_id' => \App\Models\Role::where('name', 'user')->first()->id,
            'status_id' => \App\Models\UserStatus::where('name', 'Active')->first()->id,
        ]);
    }
}
