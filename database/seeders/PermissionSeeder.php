<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
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
        'employee.delete'

       ];

       foreach($permissions as $permission){
        Permission::firstOrCreate([
            'name' => $permission,
            'guard_name' =>'web',
        ]);
       }
    }
}
