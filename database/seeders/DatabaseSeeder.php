<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            ]);

            $superAdminRole = Role::where('name','Super Admin')->first();

            $user = \App\Models\User::where('email','superadmin@gmail.com')->first();

            if ($user && $superAdminRole){
                $user->assignRole($superAdminRole);
            }

            // run again so super admin gets newly created permissions 

            $superAdminRole?->syncPermissions(Permission::all());

    }
}
