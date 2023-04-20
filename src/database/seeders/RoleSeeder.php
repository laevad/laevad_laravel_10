<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'id' => Uuid::uuid3(Uuid::NAMESPACE_DNS, 'admin')->toString(),
                'name' => 'admin',
                'description' => 'Administrator',
            ],
            [
                'id' => Uuid::uuid3(Uuid::NAMESPACE_DNS, 'user')->toString(),
                'name' => 'user',
                'description' => 'User',
            ],
        ];

        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }
    }
}
