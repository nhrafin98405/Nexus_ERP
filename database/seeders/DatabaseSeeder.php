<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

       $this->call([

    PermissionSeeder::class,
    RoleSeeder::class,
    UserSeeder::class,
    MenuSeeder::class,

    CompanySeeder::class,
    BranchSeeder::class,
    DepartmentSeeder::class,
    DesignationSeeder::class,

    PumpSeeder::class,

    FuelTypeSeeder::class,

    TankSeeder::class,
    NozzleSeeder::class,
    SupplierSeeder::class,
    EmployeeSeeder::class,

]);



        $superAdminRole = Role::where('slug','super-admin')
            ->first();



        $user = User::where(
            'email',
            'superadmin@gmail.com'
        )->first();



        if($user && $superAdminRole)
        {

            $user->assignRole($superAdminRole);

        }

    }
}