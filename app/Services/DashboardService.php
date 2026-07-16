<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Expense;
use App\Models\FuelSale;
use App\Models\Payroll;
use Carbon\Carbon;

class DashboardService
{

    /**
     * Dashboard Data
     */
    public static function get(): array
    {

        $user = auth()->user();

        $companyId = $user->company_id;

        $branchId = $user->branch_id;

        $role = strtolower(
            $user->roles->first()?->name ?? ''
        );



        /*
        |--------------------------------------------------------------------------
        | Base Query
        |--------------------------------------------------------------------------
        */

        $employees = Employee::query();

        $attendance = Attendance::query();

        $fuelSales = FuelSale::query();

        $expenses = Expense::query();

        $payrolls = Payroll::query();
                /*
        |--------------------------------------------------------------------------
        | Company / Branch / Employee Scope
        |--------------------------------------------------------------------------
        */

        if ($role !== 'super admin') {

            $employees->where('company_id', $companyId);

            $attendance->where('company_id', $companyId);

            $fuelSales->where('company_id', $companyId);

            $expenses->where('company_id', $companyId);

            $payrolls->where('company_id', $companyId);

        }


        /*
        |--------------------------------------------------------------------------
        | Branch Scope
        |--------------------------------------------------------------------------
        */

        if ($role === 'manager') {

            $employees->where('branch_id', $branchId);

            $attendance->where('branch_id', $branchId);

            $fuelSales->where('branch_id', $branchId);

            $expenses->where('branch_id', $branchId);

            $payrolls->where('branch_id', $branchId);

        }


        /*
        |--------------------------------------------------------------------------
        | Employee Self Scope
        |--------------------------------------------------------------------------
        */

        if ($role === 'employee') {

            $employeeId = optional($user->employee)->id;

            $attendance->where('employee_id', $employeeId);

            $payrolls->where('employee_id', $employeeId);

            $employees->where('id', $employeeId);

        }
                /*
        |--------------------------------------------------------------------------
        | Dashboard Statistics
        |--------------------------------------------------------------------------
        */

        $today = Carbon::today();

        $employeeCount = $employees->count();

        $todayAttendance = (clone $attendance)
            ->whereDate('attendance_date', $today)
            ->count();

        $presentCount = (clone $attendance)
            ->whereDate('attendance_date', $today)
            ->where('status', 'present')
            ->count();

        $absentCount = (clone $attendance)
            ->whereDate('attendance_date', $today)
            ->where('status', 'absent')
            ->count();

        $lateCount = (clone $attendance)
            ->whereDate('attendance_date', $today)
            ->where('status', 'late')
            ->count();

        $todaySales = (clone $fuelSales)
            ->whereDate('created_at', $today)
            ->sum('grand_total');

        $todayExpense = (clone $expenses)
            ->whereDate('created_at', $today)
            ->sum('amount');

        $monthlyPayroll = (clone $payrolls)
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('net_salary');


            /*
|--------------------------------------------------------------------------
| Chart Data
|--------------------------------------------------------------------------
*/

$monthlySales = [];

$monthlyExpense = [];

$monthlyAttendance = [];


for($i = 1; $i <= 12; $i++){

    $monthlySales[] = (clone $fuelSales)
        ->whereMonth('created_at',$i)
        ->sum('grand_total');


    $monthlyExpense[] = (clone $expenses)
        ->whereMonth('created_at',$i)
        ->sum('amount');


    $monthlyAttendance[] = (clone $attendance)
        ->whereMonth('attendance_date',$i)
        ->count();

}


/*
|--------------------------------------------------------------------------
| Recent Data
|--------------------------------------------------------------------------
*/


$recentEmployees = (clone $employees)
    ->latest()
    ->limit(5)
    ->get();


$recentAttendance = (clone $attendance)
    ->latest()
    ->limit(5)
    ->get();


$recentSales = (clone $fuelSales)
    ->latest()
    ->limit(5)
    ->get();


$recentExpenses = (clone $expenses)
    ->latest()
    ->limit(5)
    ->get();

    /*
|--------------------------------------------------------------------------
| Coming Soon Modules
|--------------------------------------------------------------------------
*/

$comingSoonModules = [

    [
        'name' => 'Hotel ERP',
        'icon' => 'bx bx-building-house',
        'color' => 'primary',
    ],

    [
        'name' => 'Hospital ERP',
        'icon' => 'bx bx-plus-medical',
        'color' => 'danger',
    ],

    [
        'name' => 'School ERP',
        'icon' => 'bx bx-book',
        'color' => 'success',
    ],

    [
        'name' => 'Restaurant ERP',
        'icon' => 'bx bx-food-menu',
        'color' => 'warning',
    ],

    [
        'name' => 'Manufacturing ERP',
        'icon' => 'bx bx-factory',
        'color' => 'info',
    ],

    [
        'name' => 'Construction ERP',
        'icon' => 'bx bx-building',
        'color' => 'secondary',
    ],

    [
        'name' => 'Transport ERP',
        'icon' => 'bx bx-car',
        'color' => 'dark',
    ],

    [
        'name' => 'E-Commerce ERP',
        'icon' => 'bx bx-cart',
        'color' => 'primary',
    ],

    [
        'name' => 'Pharmacy ERP',
        'icon' => 'bx bx-capsule',
        'color' => 'success',
    ],

];

/*
|--------------------------------------------------------------------------
| Role Based Widgets
|--------------------------------------------------------------------------
*/

$permissions = [

    'isSuperAdmin' => false,

    'isAdmin' => false,

    'isManager' => false,

    'isEmployee' => false,

];


if($user->hasRole('Super Admin')){

    $permissions['isSuperAdmin'] = true;

}


elseif($user->hasRole('Admin')){

    $permissions['isAdmin'] = true;

}


elseif($user->hasRole('Manager')){

    $permissions['isManager'] = true;

}


elseif($user->hasRole('Employee')){

    $permissions['isEmployee'] = true;

}








                    return [

            'employeeCount'   => $employeeCount,

            'todayAttendance' => $todayAttendance,

            'presentCount'    => $presentCount,

            'absentCount'     => $absentCount,

            'lateCount'       => $lateCount,

            'todaySales'      => $todaySales,

            'todayExpense'    => $todayExpense,

            'monthlyPayroll'  => $monthlyPayroll,
            'monthlySales' => $monthlySales,

'monthlyExpense' => $monthlyExpense,

'monthlyAttendance' => $monthlyAttendance,
'recentEmployees' => $recentEmployees,

'recentAttendance' => $recentAttendance,

'recentSales' => $recentSales,

'recentExpenses' => $recentExpenses,
'comingSoonModules' => $comingSoonModules,
'permissions' => $permissions,

        ];

    }

}