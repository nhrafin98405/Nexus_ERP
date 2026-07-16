<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::truncate();


        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Menu::create([

            'name'          => 'Dashboard',
            'slug'          => 'dashboard',
            'icon'          => 'bx bx-home-alt',
            'route_name'    => 'super-admin.dashboard',

            'industry'      => 'system',
            'module'        => 'dashboard',
            'menu_group'    => 'system',

            'menu_type'     => 'sidebar',
            'sort_order'    => 1,

            'status'        => 1,
            'is_visible'    => 1,
            'is_system'     => 1,

        ]);



        /*
        |--------------------------------------------------------------------------
        | Petrol Pump ERP
        |--------------------------------------------------------------------------
        */


        $petrol = Menu::create([

            'name'          => 'Petrol Pump',
            'slug'          => 'petrol-pump',
            'icon'          => 'bx bx-gas-pump',

            'industry'      => 'petrol',
            'module'        => 'petrol',
            'menu_group'    => 'industry',

            'menu_type'     => 'sidebar',
            'sort_order'    => 20,

            'status'        => 1,
            'is_visible'    => 1,

        ]);



        Menu::create([

            'parent_id'       => $petrol->id,

            'name'            => 'Fuel Sales',
            'slug'            => 'fuel-sales',
            'icon'            => 'bx bx-line-chart',

            'route_name'      => 'fuel-sales.index',
            'permission_name' => 'fuel-sale.view',

            'industry'        => 'petrol',
            'module'          => 'fuel-sales',
            'menu_group'      => 'petrol',

            'sort_order'      => 1,

            'status'          => 1,
            'is_visible'      => 1,

        ]);



        Menu::create([

            'parent_id'       => $petrol->id,

            'name'            => 'Pumps',
            'slug'            => 'pumps',
            'icon'            => 'bx bx-gas-pump',

            'route_name'      => 'pumps.index',
            'permission_name' => 'pump.view',

            'industry'        => 'petrol',
            'module'          => 'pump',
            'menu_group'      => 'petrol',

            'sort_order'      => 2,

            'status'          => 1,
            'is_visible'      => 1,

        ]);



        Menu::create([

            'parent_id'       => $petrol->id,

            'name'            => 'Tanks',
            'slug'            => 'tanks',
            'icon'            => 'bx bx-cylinder',

            'route_name'      => 'tanks.index',
            'permission_name' => 'tank.view',

            'industry'        => 'petrol',
            'module'          => 'tank',
            'menu_group'      => 'petrol',

            'sort_order'      => 3,

            'status'          => 1,
            'is_visible'      => 1,

        ]);



        Menu::create([

            'parent_id'       => $petrol->id,

            'name'            => 'Nozzles',
            'slug'            => 'nozzles',
            'icon'            => 'bx bx-droplet',

            'route_name'      => 'nozzles.index',
            'permission_name' => 'nozzle.view',

            'industry'        => 'petrol',
            'module'          => 'nozzle',
            'menu_group'      => 'petrol',

            'sort_order'      => 4,

            'status'          => 1,
            'is_visible'      => 1,

        ]);





        /*
        |--------------------------------------------------------------------------
        | HR & Payroll
        |--------------------------------------------------------------------------
        */


        $hr = Menu::create([

            'name'          => 'HR & Payroll',
            'slug'          => 'hr-payroll',
            'icon'          => 'bx bx-group',

            'industry'      => 'system',
            'module'        => 'hr',
            'menu_group'    => 'hr',

            'sort_order'    => 30,

            'status'        => 1,
            'is_visible'    => 1,

        ]);



        Menu::create([

            'parent_id'       => $hr->id,

            'name'            => 'Employees',
            'slug'            => 'employees',
            'icon'            => 'bx bx-user',

            'route_name'      => 'super-admin.settings.employees.index',
            'permission_name' => 'employee.view',

            'module'          => 'employee',
            'menu_group'      => 'hr',

            'sort_order'      => 1,

            'status'          => 1,
            'is_visible'      => 1,

        ]);



        Menu::create([

            'parent_id'       => $hr->id,

            'name'            => 'Attendance',
            'slug'            => 'attendance',
            'icon'            => 'bx bx-calendar-check',

            'route_name'      => 'super-admin.attendance.index',
            'permission_name' => 'attendance.view',

            'module'          => 'attendance',
            'menu_group'      => 'hr',

            'sort_order'      => 2,

            'status'          => 1,
            'is_visible'      => 1,

        ]);



        Menu::create([

            'parent_id'       => $hr->id,

            'name'            => 'Employee Salary',
            'slug'            => 'employee-salary',
            'icon'            => 'bx bx-money',

            'route_name'      => 'super-admin.settings.employee-salaries.index',
            'permission_name' => 'employee-salary.view',

            'module'          => 'salary',
            'menu_group'      => 'hr',

            'sort_order'      => 3,

            'status'          => 1,
            'is_visible'      => 1,

        ]);



        Menu::create([

            'parent_id'       => $hr->id,

            'name'            => 'Payroll',
            'slug'            => 'payroll',
            'icon'            => 'bx bx-wallet',

            'route_name'      => 'super-admin.payroll.index',
            'permission_name' => 'payroll.view',

            'module'          => 'payroll',
            'menu_group'      => 'hr',

            'sort_order'      => 4,

            'status'          => 1,
            'is_visible'      => 1,

        ]);



        Menu::create([

            'parent_id'       => $hr->id,

            'name'            => 'Leave',
            'slug'            => 'leave',
            'icon'            => 'bx bx-calendar-x',

            'route_name'      => 'super-admin.leave.index',
            'permission_name' => 'leave.view',

            'module'          => 'leave',
            'menu_group'      => 'hr',

            'sort_order'      => 5,

            'status'          => 1,
            'is_visible'      => 1,

        ]);



        Menu::create([

            'parent_id'       => $hr->id,

            'name'            => 'Holiday',
            'slug'            => 'holiday',
            'icon'            => 'bx bx-calendar-star',

            'route_name'      => 'super-admin.holiday.index',
            'permission_name' => 'holiday.view',

            'module'          => 'holiday',
            'menu_group'      => 'hr',

            'sort_order'      => 6,

            'status'          => 1,
            'is_visible'      => 1,

        ]);

        /*
|--------------------------------------------------------------------------
| Inventory
|--------------------------------------------------------------------------
*/

        $inventory = Menu::create([

            'name'          => 'Inventory',
            'slug'          => 'inventory',
            'icon'          => 'bx bx-package',

            'industry'      => 'system',
            'module'        => 'inventory',
            'menu_group'    => 'inventory',

            'menu_type'     => 'sidebar',
            'sort_order'    => 40,

            'status'        => 1,
            'is_visible'    => 1,

        ]);

        Menu::create([
            'parent_id' => $inventory->id,
            'name' => 'Products',
            'slug' => 'products',
            'icon' => 'bx bx-box',
            'route_name' => 'super-admin.products.index',
            'permission_name' => 'product.view',
            'module' => 'product',
            'sort_order' => 1,
            'status' => 1,
            'is_visible' => 1,
        ]);

        Menu::create([
            'parent_id' => $inventory->id,
            'name' => 'Categories',
            'slug' => 'categories',
            'icon' => 'bx bx-category',
            'route_name' => 'super-admin.categories.index',
            'permission_name' => 'category.view',
            'module' => 'category',
            'sort_order' => 2,
            'status' => 1,
            'is_visible' => 1,
        ]);

        Menu::create([
            'parent_id' => $inventory->id,
            'name' => 'Stock',
            'slug' => 'stock',
            'icon' => 'bx bx-layer',
            'route_name' => 'super-admin.stock.index',
            'permission_name' => 'stock.view',
            'module' => 'stock',
            'sort_order' => 3,
            'status' => 1,
            'is_visible' => 1,
        ]);

        Menu::create([
            'parent_id' => $inventory->id,
            'name' => 'Purchase',
            'slug' => 'purchase',
            'icon' => 'bx bx-cart',
            'route_name' => 'super-admin.purchase.index',
            'permission_name' => 'purchase.view',
            'module' => 'purchase',
            'sort_order' => 4,
            'status' => 1,
            'is_visible' => 1,
        ]);

        Menu::create([
            'parent_id' => $inventory->id,
            'name' => 'Supplier',
            'slug' => 'supplier',
            'icon' => 'bx bx-user-pin',
            'route_name' => 'super-admin.suppliers.index',
            'permission_name' => 'supplier.view',
            'module' => 'supplier',
            'sort_order' => 5,
            'status' => 1,
            'is_visible' => 1,
        ]);

        Menu::create([
            'parent_id' => $inventory->id,
            'name' => 'Warehouse',
            'slug' => 'warehouse',
            'icon' => 'bx bx-buildings',
            'route_name' => 'super-admin.warehouses.index',
            'permission_name' => 'warehouse.view',
            'module' => 'warehouse',
            'sort_order' => 6,
            'status' => 1,
            'is_visible' => 1,
        ]);



        /*
        |--------------------------------------------------------------------------
        | Accounts
        |--------------------------------------------------------------------------
        */

                $accounts = Menu::create([

                    'name' => 'Accounts',

                    'slug' => 'accounts',

                    'icon' => 'bx bx-wallet',

                    'industry' => 'system',

                    'module' => 'accounts',

                    'menu_group' => 'accounts',

                    'sort_order' => 50,

                    'status' => 1,

                    'is_visible' => 1,

                ]);

                Menu::create([
                    'parent_id' => $accounts->id,
                    'name' => 'Income',
                    'slug' => 'income',
                    'icon' => 'bx bx-trending-up',
                    'route_name' => 'super-admin.income.index',
                    'permission_name' => 'income.view',
                    'module' => 'income',
                    'sort_order' => 1,
                    'status' => 1,
                    'is_visible' => 1,
                ]);

                Menu::create([
                    'parent_id' => $accounts->id,
                    'name' => 'Expense',
                    'slug' => 'expense',
                    'icon' => 'bx bx-trending-down',
                    'route_name' => 'super-admin.expense.index',
                    'permission_name' => 'expense.view',
                    'module' => 'expense',
                    'sort_order' => 2,
                    'status' => 1,
                    'is_visible' => 1,
                ]);

                Menu::create([
                    'parent_id' => $accounts->id,
                    'name' => 'Ledger',
                    'slug' => 'ledger',
                    'icon' => 'bx bx-book',
                    'route_name' => 'super-admin.ledger.index',
                    'permission_name' => 'ledger.view',
                    'module' => 'ledger',
                    'sort_order' => 3,
                    'status' => 1,
                    'is_visible' => 1,
                ]);

                Menu::create([
                    'parent_id' => $accounts->id,
                    'name' => 'Cash Book',
                    'slug' => 'cash-book',
                    'icon' => 'bx bx-money',
                    'route_name' => 'super-admin.cash-book.index',
                    'permission_name' => 'cash-book.view',
                    'module' => 'cash-book',
                    'sort_order' => 4,
                    'status' => 1,
                    'is_visible' => 1,
                ]);

                Menu::create([
                    'parent_id' => $accounts->id,
                    'name' => 'Bank',
                    'slug' => 'bank',
                    'icon' => 'bx bx-bank',
                    'route_name' => 'super-admin.bank.index',
                    'permission_name' => 'bank.view',
                    'module' => 'bank',
                    'sort_order' => 5,
                    'status' => 1,
                    'is_visible' => 1,
                ]);

                Menu::create([
                    'parent_id' => $accounts->id,
                    'name' => 'Journal',
                    'slug' => 'journal',
                    'icon' => 'bx bx-notepad',
                    'route_name' => 'super-admin.journal.index',
                    'permission_name' => 'journal.view',
                    'module' => 'journal',
                    'sort_order' => 6,
                    'status' => 1,
                    'is_visible' => 1,
                ]);



                /*
        |--------------------------------------------------------------------------
        | Reports
        |--------------------------------------------------------------------------
        */

                $reports = Menu::create([

                    'name' => 'Reports',

                    'slug' => 'reports',

                    'icon' => 'bx bx-line-chart',

                    'industry' => 'system',

                    'module' => 'reports',

                    'menu_group' => 'reports',

                    'sort_order' => 60,

                    'status' => 1,

                    'is_visible' => 1,

                ]);

                Menu::create([
                    'parent_id' => $reports->id,
                    'name' => 'Sales Report',
                    'slug' => 'sales-report',
                    'icon' => 'bx bx-bar-chart',
                    'route_name' => '#',
                    'permission_name' => 'sales-report.view',
                    'module' => 'sales-report',
                    'sort_order' => 1,
                    'status' => 1,
                    'is_visible' => 1,
                ]);

                Menu::create([
                    'parent_id' => $reports->id,
                    'name' => 'Attendance Report',
                    'slug' => 'attendance-report',
                    'icon' => 'bx bx-calendar-check',
                    'route_name' => '#',
                    'permission_name' => 'attendance-report.view',
                    'module' => 'attendance-report',
                    'sort_order' => 2,
                    'status' => 1,
                    'is_visible' => 1,
                ]);

                Menu::create([
                    'parent_id' => $reports->id,
                    'name' => 'Payroll Report',
                    'slug' => 'payroll-report',
                    'icon' => 'bx bx-receipt',
                    'route_name' => '#',
                    'permission_name' => 'payroll-report.view',
                    'module' => 'payroll-report',
                    'sort_order' => 3,
                    'status' => 1,
                    'is_visible' => 1,
                ]);

                Menu::create([
                    'parent_id' => $reports->id,
                    'name' => 'Expense Report',
                    'slug' => 'expense-report',
                    'icon' => 'bx bx-pie-chart-alt',
                    'route_name' => '#',
                    'permission_name' => 'expense-report.view',
                    'module' => 'expense-report',
                    'sort_order' => 4,
                    'status' => 1,
                    'is_visible' => 1,
                ]);

                Menu::create([
                    'parent_id' => $reports->id,
                    'name' => 'Profit & Loss',
                    'slug' => 'profit-loss',
                    'icon' => 'bx bx-line-chart-down',
                    'route_name' => '#',
                    'permission_name' => 'profit-loss.view',
                    'module' => 'profit-loss',
                    'sort_order' => 5,
                    'status' => 1,
                    'is_visible' => 1,
                ]);
                /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */

                $settings = Menu::create([

                    'name'          => 'Settings',
                    'slug'          => 'settings',
                    'icon'          => 'bx bx-cog',

                    'industry'      => 'system',
                    'module'        => 'settings',
                    'menu_group'    => 'system',

                    'sort_order'    => 900,

                    'status'        => 1,
                    'is_visible'    => 1,
                    'is_system'     => 1,

                ]);



                Menu::create([

                    'parent_id' => $settings->id,

                    'name' => 'Users',
                    'slug' => 'users',
                    'icon' => 'bx bx-user',

                    'route_name' => 'super-admin.settings.users.index',

                    'permission_name' => 'user.view',

                    'module' => 'users',

                    'sort_order' => 1,

                    'status' => 1,
                    'is_visible' => 1,

                ]);



                Menu::create([

                    'parent_id' => $settings->id,

                    'name' => 'Roles',
                    'slug' => 'roles',
                    'icon' => 'bx bx-shield',

                    'route_name' => 'super-admin.settings.roles.index',

                    'permission_name' => 'role.view',

                    'module' => 'roles',

                    'sort_order' => 2,

                    'status' => 1,
                    'is_visible' => 1,

                ]);



                Menu::create([

                    'parent_id' => $settings->id,

                    'name' => 'Permissions',
                    'slug' => 'permissions',
                    'icon' => 'bx bx-lock',

                    'route_name' => 'super-admin.settings.permissions.index',

                    'permission_name' => 'permission.view',

                    'module' => 'permissions',

                    'sort_order' => 3,

                    'status' => 1,
                    'is_visible' => 1,

                ]);



                Menu::create([

                    'parent_id' => $settings->id,

                    'name' => 'Menus',
                    'slug' => 'menus',
                    'icon' => 'bx bx-menu',

                    'route_name' => 'super-admin.settings.menus.index',

                    'permission_name' => 'menu.view',

                    'module' => 'menus',

                    'sort_order' => 4,

                    'status' => 1,
                    'is_visible' => 1,

                ]);



                Menu::create([

                    'parent_id' => $settings->id,

                    'name' => 'Companies',
                    'slug' => 'companies',
                    'icon' => 'bx bx-buildings',

                    'route_name' => 'super-admin.settings.companies.index',

                    'permission_name' => 'company.view',

                    'module' => 'companies',

                    'sort_order' => 5,

                    'status' => 1,
                    'is_visible' => 1,

                ]);



                Menu::create([

                    'parent_id' => $settings->id,

                    'name' => 'Branches',
                    'slug' => 'branches',
                    'icon' => 'bx bx-git-branch',

                    'route_name' => 'super-admin.settings.branches.index',

                    'permission_name' => 'branch.view',

                    'module' => 'branches',

                    'sort_order' => 6,

                    'status' => 1,
                    'is_visible' => 1,

                ]);



                Menu::create([

                    'parent_id' => $settings->id,

                    'name' => 'Departments',
                    'slug' => 'departments',
                    'icon' => 'bx bx-building-house',

                    'route_name' => 'super-admin.settings.departments.index',

                    'permission_name' => 'department.view',

                    'module' => 'departments',

                    'sort_order' => 7,

                    'status' => 1,
                    'is_visible' => 1,

                ]);



                Menu::create([

                    'parent_id' => $settings->id,

                    'name' => 'Designations',
                    'slug' => 'designations',
                    'icon' => 'bx bx-id-card',

                    'route_name' => 'super-admin.settings.designations.index',

                    'permission_name' => 'designation.view',

                    'module' => 'designations',

                    'sort_order' => 8,

                    'status' => 1,
                    'is_visible' => 1,

                ]);
                /*
        |--------------------------------------------------------------------------
        | Coming Soon Industries
        |--------------------------------------------------------------------------
        */


        $comingSoonModules = [

            [
                'name' => 'Hotel ERP',
                'slug' => 'hotel-erp',
                'icon' => 'bx bx-hotel',
            ],

            [
                'name' => 'Hospital ERP',
                'slug' => 'hospital-erp',
                'icon' => 'bx bx-plus-medical',
            ],

            [
                'name' => 'School ERP',
                'slug' => 'school-erp',
                'icon' => 'bx bx-book',
            ],

            [
                'name' => 'Restaurant ERP',
                'slug' => 'restaurant-erp',
                'icon' => 'bx bx-restaurant',
            ],

            [
                'name' => 'Manufacturing ERP',
                'slug' => 'manufacturing-erp',
                'icon' => 'bx bx-factory',
            ],

            [
                'name' => 'Construction ERP',
                'slug' => 'construction-erp',
                'icon' => 'bx bx-building',
            ],

            [
                'name' => 'Transport ERP',
                'slug' => 'transport-erp',
                'icon' => 'bx bx-car',
            ],

            [
                'name' => 'POS ERP',
                'slug' => 'pos-erp',
                'icon' => 'bx bx-store',
            ],

            [
                'name' => 'E-Commerce ERP',
                'slug' => 'ecommerce-erp',
                'icon' => 'bx bx-cart',
            ],

            [
                'name' => 'Pharmacy ERP',
                'slug' => 'pharmacy-erp',
                'icon' => 'bx bx-capsule',
            ],

        ];



        foreach ($comingSoonModules as $item) {


            Menu::create([

                'name' => $item['name'],

                'slug' => $item['slug'],

                'icon' => $item['icon'],


                'industry' => $item['slug'],

                'module' => $item['slug'],

                'menu_group' => 'coming-soon',


                'badge' => 'Coming Soon',

                'badge_color' => 'warning',


                'coming_soon' => 1,


                'sort_order' => 1000,


                'status' => 1,

                'is_visible' => 1,


            ]);
        }
    }
}
