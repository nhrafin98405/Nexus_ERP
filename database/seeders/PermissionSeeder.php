<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();


        Permission::query()->delete();



        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */

        $settings = [

            'user',
            'role',
            'permission',
            'menu',
            'company',
            'branch',
            'department',
            'designation',

        ];


        foreach ($settings as $module) {

            $this->createCrudPermission($module);

        }



        /*
        |--------------------------------------------------------------------------
        | HR & Payroll
        |--------------------------------------------------------------------------
        */

        $hr = [

            'employee',
            'attendance',
            'employee-salary',
            'payroll',
            'leave',
            'holiday',

        ];


        foreach ($hr as $module) {

            $this->createCrudPermission($module);

        }




        /*
        |--------------------------------------------------------------------------
        | Petrol Pump ERP
        |--------------------------------------------------------------------------
        */

        $petrol = [

            'fuel-type',
            'pump',
            'tank',
            'nozzle',
            'fuel-sale',
            'expense',

        ];


        foreach ($petrol as $module) {

            $this->createCrudPermission($module);

        }





        /*
        |--------------------------------------------------------------------------
        | Inventory ERP
        |--------------------------------------------------------------------------
        */

        $inventory = [

            'category',
            'product',
            'stock',
            'supplier',
            'warehouse',
            'purchase',

        ];


        foreach ($inventory as $module) {

            $this->createCrudPermission($module);

        }





        /*
        |--------------------------------------------------------------------------
        | Accounts ERP
        |--------------------------------------------------------------------------
        */

        $accounts = [

            'income',
            'expense-account',
            'ledger',
            'cash-book',
            'bank',
            'journal',

        ];


        foreach ($accounts as $module) {

            $this->createCrudPermission($module);

        }





        /*
        |--------------------------------------------------------------------------
        | Reports
        |--------------------------------------------------------------------------
        */

        $reports = [

            'sales-report',
            'attendance-report',
            'payroll-report',
            'expense-report',
            'profit-loss',

        ];


        foreach ($reports as $module) {

            Permission::create([
                'name' => $module.'.view',
                'guard_name' => 'web',
            ]);

        }




        /*
        |--------------------------------------------------------------------------
        | Dashboard & Profile
        |--------------------------------------------------------------------------
        */


        Permission::create([
            'name' => 'dashboard.view',
            'guard_name' => 'web',
        ]);


        Permission::create([
            'name' => 'profile.view',
            'guard_name' => 'web',
        ]);


        Permission::create([
            'name' => 'profile.edit',
            'guard_name' => 'web',
        ]);






        /*
        |--------------------------------------------------------------------------
        | Assign Super Admin
        |--------------------------------------------------------------------------
        */


        $superAdmin = Role::where('name','Super Admin')->first();


        if($superAdmin){

            $superAdmin->syncPermissions(
                Permission::all()
            );

        }





        /*
        |--------------------------------------------------------------------------
        | Assign Admin
        |--------------------------------------------------------------------------
        */


        $admin = Role::where('name','Admin')->first();


        if($admin){

            $admin->syncPermissions([


                'dashboard.view',


                /*
                HR
                */

                'employee.view',
                'employee.create',
                'employee.edit',

                'attendance.view',
                'attendance.create',
                'attendance.edit',

                'employee-salary.view',
                'employee-salary.create',
                'employee-salary.edit',

                'payroll.view',
                'payroll.create',
                'payroll.edit',

                'leave.view',

                'holiday.view',




                /*
                Petrol Pump
                */

                'fuel-type.view',
                'fuel-type.create',
                'fuel-type.edit',

                'pump.view',
                'tank.view',
                'nozzle.view',

                'fuel-sale.view',

                'expense.view',




                /*
                Inventory
                */

                'product.view',

                'category.view',

                'purchase.view',

                'supplier.view',

                'warehouse.view',

                'stock.view',




                /*
                Accounts
                */

                'income.view',

                'ledger.view',

                'cash-book.view',

                'bank.view',

                'journal.view',




                /*
                Reports
                */

                'sales-report.view',

                'attendance-report.view',

                'payroll-report.view',

                'expense-report.view',

                'profit-loss.view',




                /*
                Settings
                */

                'branch.view',

                'department.view',

                'designation.view',


            ]);

        }







        /*
        |--------------------------------------------------------------------------
        | Assign Manager
        |--------------------------------------------------------------------------
        */


        $manager = Role::where('name','Manager')->first();


        if($manager){


            $manager->syncPermissions([


                'dashboard.view',


                'employee.view',


                'attendance.view',

                'attendance.create',


                'leave.view',


                'holiday.view',


                'employee-salary.view',


                'payroll.view',



                /*
                Petrol
                */

                'fuel-sale.view',

                'expense.view',



                /*
                Reports
                */

                'sales-report.view',

                'attendance-report.view',

                'payroll-report.view',


            ]);


        }






        /*
        |--------------------------------------------------------------------------
        | Assign Employee
        |--------------------------------------------------------------------------
        */


        $employee = Role::where('name','Employee')->first();


        if($employee){


            $employee->syncPermissions([


                'dashboard.view',

                'profile.view',

                'profile.edit',

                'attendance.view',

                'leave.view',

                'holiday.view',

                'payroll.view',


            ]);

        }


    }





    /*
    |--------------------------------------------------------------------------
    | Create CRUD Permission Helper
    |--------------------------------------------------------------------------
    */


    private function createCrudPermission($module): void
    {

        $actions = [

            'view',
            'create',
            'edit',
            'delete',

        ];


        foreach($actions as $action){


            Permission::create([

                'name' => $module.'.'.$action,

                'guard_name' => 'web',

            ]);

        }

    }

}