<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $superAdmin = Role::firstOrCreate(
            [
                'slug' => 'super-admin',
            ],
            [
                'name' => 'Super Admin',
                'guard_name' => 'web',
                'description' => 'Full system access',
                'status' => true,
                'is_system' => true,
            ]
        );


        $admin = Role::firstOrCreate(
            [
                'slug' => 'admin',
            ],
            [
                'name' => 'Admin',
                'guard_name' => 'web',
                'description' => 'Administrative access',
                'status' => true,
                'is_system' => true,
            ]
        );


        $manager = Role::firstOrCreate(
            [
                'slug' => 'manager',
            ],
            [
                'name' => 'Manager',
                'guard_name' => 'web',
                'description' => 'Manager access',
                'status' => true,
                'is_system' => false,
            ]
        );


        $employee = Role::firstOrCreate(
            [
                'slug' => 'employee',
            ],
            [
                'name' => 'Employee',
                'guard_name' => 'web',
                'description' => 'Employee access',
                'status' => true,
                'is_system' => false,
            ]
        );


        // Super Admin gets all permissions

        $superAdmin->syncPermissions(Permission::all());
    }
}