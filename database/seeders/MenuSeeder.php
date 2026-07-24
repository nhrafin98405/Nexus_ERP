<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {

        DB::table('menus')->truncate();



        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */


        Menu::create([

            'parent_id'       => null,

            'name'            => 'Dashboard',

            'slug'            => 'dashboard',

            'title'           => 'Dashboard',

            'icon'            => 'bx bx-home-circle',

            'route_name'      => 'super-admin.dashboard',

            'permission_name' => 'dashboard.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 1,

            'is_visible'      => true,

            'is_system'       => true,

            'is_default'      => true,

            'status'          => true,

        ]);




        /*
        |--------------------------------------------------------------------------
        | Petrol Pump Parent
        |--------------------------------------------------------------------------
        */


        $petrolPump = Menu::create([

            'parent_id'       => null,

            'name'            => 'Petrol Pump',

            'slug'            => 'petrol-pump',

            'title'           => 'Petrol Pump',

            'icon'            => 'bx bx-gas-pump',

            'menu_type'       => 'sidebar',

            'sort_order'      => 2,

            'is_visible'      => true,

            'is_system'       => true,

            'is_default'      => true,

            'status'          => true,

        ]);





        /*
        |--------------------------------------------------------------------------
        | Petrol Pump Children
        |--------------------------------------------------------------------------
        */


        Menu::create([

            'parent_id'       => $petrolPump->id,

            'name'            => 'Pumps',

            'slug'            => 'pumps',

            'title'           => 'Pump Management',

            'icon'            => 'bx bx-buildings',

            'route_name'      => 'super-admin.settings.pumps.index',

            'permission_name' => 'pump.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 1,

            'is_visible'      => true,

            'status'          => true,

        ]);




        Menu::create([

            'parent_id'       => $petrolPump->id,

            'name'            => 'Tanks',

            'slug'            => 'tanks',

            'title'           => 'Tank Management',

            'icon'            => 'bx bx-cylinder',

            'route_name'      => 'super-admin.settings.tanks.index',

            'permission_name' => 'tank.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 2,

            'is_visible'      => true,

            'status'          => true,

        ]);




        Menu::create([

            'parent_id'       => $petrolPump->id,

            'name'            => 'Nozzles',

            'slug'            => 'nozzles',

            'title'           => 'Nozzle Management',

            'icon'            => 'bx bx-target-lock',

            'route_name'      => 'super-admin.settings.nozzles.index',

            'permission_name' => 'nozzle.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 3,

            'is_visible'      => true,

            'status'          => true,

        ]);
        /*
        |--------------------------------------------------------------------------
        | Fuel Sales
        |--------------------------------------------------------------------------
        */

        Menu::create([

            'parent_id'       => $petrolPump->id,

            'name'            => 'Fuel Sales',

            'slug'            => 'fuel-sales',

            'title'           => 'Fuel Sales',

            'icon'            => 'bx bx-cart',

            'route_name'      => 'super-admin.settings.fuel-sales.index',

            'permission_name' => 'fuel-sale.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 4,

            'is_visible'      => true,

            'status'          => true,

        ]);




        /*
        |--------------------------------------------------------------------------
        | Fuel Purchases
        |--------------------------------------------------------------------------
        */


        Menu::create([

            'parent_id'       => $petrolPump->id,

            'name'            => 'Fuel Purchases',

            'slug'            => 'fuel-purchases',

            'title'           => 'Fuel Purchases',

            'icon'            => 'bx bx-cart-download',

            'route_name'      => 'super-admin.settings.fuel-purchases.index',

            'permission_name' => 'fuel-purchase.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 5,

            'is_visible'      => true,

            'status'          => true,

        ]);




        /*
        |--------------------------------------------------------------------------
        | Expenses
        |--------------------------------------------------------------------------
        */


        Menu::create([

            'parent_id'       => $petrolPump->id,

            'name'            => 'Expenses',

            'slug'            => 'expenses',

            'title'           => 'Expense Management',

            'icon'            => 'bx bx-wallet',

            'route_name'      => 'super-admin.settings.expenses.index',

            'permission_name' => 'expense.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 6,

            'is_visible'      => true,

            'status'          => true,

        ]);





        /*
        |--------------------------------------------------------------------------
        | Shifts
        |--------------------------------------------------------------------------
        */


        Menu::create([

            'parent_id'       => $petrolPump->id,

            'name'            => 'Shifts',

            'slug'            => 'shifts',

            'title'           => 'Shift Management',

            'icon'            => 'bx bx-time',

            'route_name'      => 'super-admin.settings.shifts.index',

            'permission_name' => 'shift.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 7,

            'is_visible'      => true,

            'status'          => true,

        ]);





        /*
        |--------------------------------------------------------------------------
        | HR Management Parent
        |--------------------------------------------------------------------------
        */


        $hr = Menu::create([

            'parent_id'       => null,

            'name'            => 'HR Management',

            'slug'            => 'hr-management',

            'title'           => 'Human Resource',

            'icon'            => 'bx bx-group',

            'menu_type'       => 'sidebar',

            'sort_order'      => 3,

            'is_visible'      => true,

            'is_system'       => true,

            'is_default'      => true,

            'status'          => true,

        ]);





        /*
        |--------------------------------------------------------------------------
        | HR Children
        |--------------------------------------------------------------------------
        */


        Menu::create([

            'parent_id'       => $hr->id,

            'name'            => 'Departments',

            'slug'            => 'departments',

            'title'           => 'Department Management',

            'icon'            => 'bx bx-building-house',

            'route_name'      => 'super-admin.settings.departments.index',

            'permission_name' => 'department.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 1,

            'is_visible'      => true,

            'status'          => true,

        ]);




        Menu::create([

            'parent_id'       => $hr->id,

            'name'            => 'Designations',

            'slug'            => 'designations',

            'title'           => 'Designation Management',

            'icon'            => 'bx bx-id-card',

            'route_name'      => 'super-admin.settings.designations.index',

            'permission_name' => 'designation.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 2,

            'is_visible'      => true,

            'status'          => true,

        ]);
        Menu::create([

            'parent_id'       => $hr->id,

            'name'            => 'Employees',

            'slug'            => 'employees',

            'title'           => 'Employee Management',

            'icon'            => 'bx bx-user-circle',

            'route_name'      => 'super-admin.settings.employees.index',

            'permission_name' => 'employee.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 3,

            'is_visible'      => true,

            'status'          => true,

        ]);




        Menu::create([

            'parent_id'       => $hr->id,

            'name'            => 'Attendance',

            'slug'            => 'attendance',

            'title'           => 'Attendance Management',

            'icon'            => 'bx bx-calendar-check',

            'route_name'      => 'super-admin.settings.attendances.index',

            'permission_name' => 'attendance.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 4,

            'is_visible'      => true,

            'status'          => true,

        ]);





        Menu::create([

            'parent_id'       => $hr->id,

            'name'            => 'Employee Salaries',

            'slug'            => 'employee-salaries',

            'title'           => 'Employee Salary Management',

            'icon'            => 'bx bx-money',

            'route_name'      => 'super-admin.settings.employee-salaries.index',

            'permission_name' => 'employee-salary.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 5,

            'is_visible'      => true,

            'status'          => true,

        ]);





        Menu::create([

            'parent_id'       => $hr->id,

            'name'            => 'Payroll',

            'slug'            => 'payroll',

            'title'           => 'Payroll Management',

            'icon'            => 'bx bx-wallet-alt',

            'route_name'      => 'super-admin.settings.payrolls.index',

            'permission_name' => 'payroll.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 6,

            'is_visible'      => true,

            'status'          => true,

        ]);





        /*
        |--------------------------------------------------------------------------
        | Settings Parent
        |--------------------------------------------------------------------------
        */


        $settings = Menu::create([

            'parent_id'       => null,

            'name'            => 'Settings',

            'slug'            => 'settings',

            'title'           => 'System Settings',

            'icon'            => 'bx bx-cog',

            'menu_type'       => 'sidebar',

            'sort_order'      => 4,

            'is_visible'      => true,

            'is_system'       => true,

            'is_default'      => true,

            'status'          => true,

        ]);





        /*
        |--------------------------------------------------------------------------
        | Settings Children
        |--------------------------------------------------------------------------
        */


        Menu::create([

            'parent_id'       => $settings->id,

            'name'            => 'Company',

            'slug'            => 'company',

            'title'           => 'Company Settings',

            'icon'            => 'bx bx-building',

            'route_name'      => 'super-admin.settings.company.index',

            'permission_name' => 'company.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 1,

            'is_visible'      => true,

            'status'          => true,

        ]);




        Menu::create([

            'parent_id'       => $settings->id,

            'name'            => 'Branches',

            'slug'            => 'branches',

            'title'           => 'Branch Management',

            'icon'            => 'bx bx-git-branch',

            'route_name'      => 'super-admin.settings.branches.index',

            'permission_name' => 'branch.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 2,

            'is_visible'      => true,

            'status'          => true,

        ]);




        Menu::create([

            'parent_id'       => $settings->id,

            'name'            => 'Users',

            'slug'            => 'users',

            'title'           => 'User Management',

            'icon'            => 'bx bx-user',

            'route_name'      => 'super-admin.settings.users.index',

            'permission_name' => 'user.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 3,

            'is_visible'      => true,

            'status'          => true,

        ]);




        Menu::create([

            'parent_id'       => $settings->id,

            'name'            => 'Roles',

            'slug'            => 'roles',

            'title'           => 'Role Management',

            'icon'            => 'bx bx-shield-quarter',

            'route_name'      => 'super-admin.settings.roles.index',

            'permission_name' => 'role.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 4,

            'is_visible'      => true,

            'status'          => true,

        ]);
        Menu::create([

            'parent_id'       => $settings->id,

            'name'            => 'Permissions',

            'slug'            => 'permissions',

            'title'           => 'Permission Management',

            'icon'            => 'bx bx-lock-alt',

            'route_name'      => 'super-admin.settings.permissions.index',

            'permission_name' => 'permission.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 5,

            'is_visible'      => true,

            'status'          => true,

        ]);





        Menu::create([

            'parent_id'       => $settings->id,

            'name'            => 'Menu Management',

            'slug'            => 'menus',

            'title'           => 'Menu Management',

            'icon'            => 'bx bx-menu',

            'route_name'      => 'super-admin.settings.menus.index',

            'permission_name' => 'menu.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 6,

            'is_visible'      => true,

            'status'          => true,

        ]);





        /*
        |--------------------------------------------------------------------------
        | Fuel Types (Master Data)
        |--------------------------------------------------------------------------
        */


        Menu::create([

            'parent_id'       => $settings->id,

            'name'            => 'Fuel Types',

            'slug'            => 'fuel-types',

            'title'           => 'Fuel Type Management',

            'icon'            => 'bx bx-droplet',

            'route_name'      => 'super-admin.settings.fuel-types.index',

            'permission_name' => 'fuel-type.view',

            'menu_type'       => 'sidebar',

            'sort_order'      => 7,

            'is_visible'      => true,

            'status'          => true,

        ]);



    }

}