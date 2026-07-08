<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $superAdmin = Role::firstOrCreate([
            'name' => 'super-admin',
            'guard_name' => 'web',
        ]);
       $admin = Role::firstOrCreate([
        'name' => 'admin',
        'guard_name' => 'web',
        ]);

       $manager = Role::firstOrCreate([
        'name' => 'manager',
        'guard_name' => 'web',
        ]);
        $employee = Role::firstOrCreate([
            'name' => 'employee',
            'guard_name' => 'web',
        ]);

        // Super admin get all permissions 

        $superAdmin->syncPermissions(Permission::all());
    }
}
