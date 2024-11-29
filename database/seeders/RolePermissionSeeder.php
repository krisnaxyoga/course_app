<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ownerRole = Role::create(['name' => 'owner']);
        $studentRole = Role::create(['name' => 'student']);
        $teacherRole = Role::create(['name' => 'teacher']);

        $userOwner = User::create([
            'name' => 'Yoga Krisna',
            'occupation' => 'Educator',
            'avatar' => 'images/default-avatar.jpg',
            'email' => 'owner@example.com',
            'password' => bcrypt('password'),
        ]);

        $userOwner->assignRole($ownerRole);
    }
}