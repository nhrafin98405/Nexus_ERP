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

            Permission::create([
                'name' => $module.'.view',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.create',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.edit',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.delete',
                'guard_name' => 'web',
            ]);

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

            Permission::create([
                'name' => $module.'.view',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.create',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.edit',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.delete',
                'guard_name' => 'web',
            ]);

        }
                /*
        |--------------------------------------------------------------------------
        | Petrol Pump ERP
        |--------------------------------------------------------------------------
        */

        $petrol = [

            'pump',
            'tank',
            'nozzle',
            'fuel-sale',
            'expense',

        ];

        foreach ($petrol as $module) {

            Permission::create([
                'name' => $module.'.view',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.create',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.edit',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.delete',
                'guard_name' => 'web',
            ]);

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

            Permission::create([
                'name' => $module.'.view',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.create',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.edit',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.delete',
                'guard_name' => 'web',
            ]);

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

            Permission::create([
                'name' => $module.'.view',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.create',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.edit',
                'guard_name' => 'web',
            ]);

            Permission::create([
                'name' => $module.'.delete',
                'guard_name' => 'web',
            ]);

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
        | Dashboard
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
        | Assign Permissions
        |--------------------------------------------------------------------------
        */

        $superAdmin = Role::where('name', 'Super Admin')->first();

        if ($superAdmin) {

            $superAdmin->syncPermissions(
                Permission::all()
            );

        }


        $admin = Role::where('name', 'Admin')->first();

        if ($admin) {

            $admin->syncPermissions([

                'dashboard.view',

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

                'pump.view',
                'tank.view',
                'nozzle.view',
                'fuel-sale.view',
                'expense.view',

                'product.view',
                'category.view',
                'purchase.view',
                'supplier.view',
                'warehouse.view',
                'stock.view',

                'income.view',
                'ledger.view',
                'cash-book.view',
                'bank.view',
                'journal.view',

                'sales-report.view',
                'attendance-report.view',
                'payroll-report.view',
                'expense-report.view',
                'profit-loss.view',

                'branch.view',
                'department.view',
                'designation.view',

            ]);

        }


        $manager = Role::where('name', 'Manager')->first();

        if ($manager) {

            $manager->syncPermissions([

                'dashboard.view',

                'employee.view',

                'attendance.view',
                'attendance.create',

                'leave.view',

                'holiday.view',

                'employee-salary.view',

                'payroll.view',

                'fuel-sale.view',

                'expense.view',

                'sales-report.view',

                'attendance-report.view',

                'payroll-report.view',

            ]);

        }


        $employee = Role::where('name', 'Employee')->first();

        if ($employee) {

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
}