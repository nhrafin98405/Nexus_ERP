<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [

            // user
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',

            // role
            'role.view',
            'role.create',
            'role.edit',
            'role.delete',

            // permission
            'permission.view',
            'permission.create',
            'permission.edit',
            'permission.delete',

            // employee
            'employee.view',
            'employee.create',
            'employee.edit',
            'employee.delete',

            // menu
            'menu.view',
            'menu.create',
            'menu.edit',
            'menu.delete',

            // company
            'company.view',
            'company.create',
            'company.edit',
            'company.delete',

            // branch
            'branch.view',
            'branch.create',
            'branch.edit',
            'branch.delete',

            // department
            'department.view',
            'department.create',
            'department.edit',
            'department.delete',

            // designation
            'designation.view',
            'designation.create',
            'designation.edit',
            'designation.delete',

        ];

        foreach ($permissions as $permission) {

            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);

        }
    }
}