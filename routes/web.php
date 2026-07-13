<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\Settings\BranchController;
use App\Http\Controllers\SuperAdmin\Settings\CompanyController;
use App\Http\Controllers\SuperAdmin\Settings\DepartmentController;
use App\Http\Controllers\SuperAdmin\Settings\DesignationController;
use App\Http\Controllers\SuperAdmin\Settings\EmployeeController;
use App\Http\Controllers\SuperAdmin\Settings\MenuController;
use App\Http\Controllers\SuperAdmin\Settings\PermissionController;
use App\Http\Controllers\SuperAdmin\Settings\RoleController;
use App\Http\Controllers\SuperAdmin\Settings\RolePermissionController;
use App\Http\Controllers\SuperAdmin\Settings\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






Route::middleware(['auth', 'super.admin'])
    ->prefix('super-admin')
    ->name('super-admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


        Route::resource('settings/users', UserController::class)
            ->names([
                'index' => 'settings.users.index',
                'create' => 'settings.users.create',
                'store' => 'settings.users.store',
                'show' => 'settings.users.show',
                'edit' => 'settings.users.edit',
                'update' => 'settings.users.update',
                'destroy' => 'settings.users.destroy',
            ]);

        Route::resource('settings/permissions', PermissionController::class)->names([
            'index' => 'settings.permissions.index',
            'create' => 'settings.permissions.create',
            'store' => 'settings.permissions.store',
            'show' => 'settings.permissions.show',
            'edit' => 'settings.permissions.edit',
            'update' => 'settings.permissions.update',
            'destroy' => 'settings.permissions.destroy',
        ]);

        Route::resource('settings/roles', RoleController::class)
            ->names([
                'index' => 'settings.roles.index',
                'create' => 'settings.roles.create',
                'store' => 'settings.roles.store',
                'show' => 'settings.roles.show',
                'edit' => 'settings.roles.edit',
                'update' => 'settings.roles.update',
                'destroy' => 'settings.roles.destroy',
            ]);

        Route::get(
            'settings/roles/{role}/permissions',
            [RolePermissionController::class, 'index']
        )->name('settings.roles.permissions.index');


        Route::put(
            'settings/roles/{role}/permissions',
            [RolePermissionController::class, 'update']
        )->name('settings.roles.permissions.update');

        Route::resource(
            'settings/menus',
            MenuController::class
        )->names([
            'index'   => 'settings.menus.index',
            'create'  => 'settings.menus.create',
            'store'   => 'settings.menus.store',
            'show'    => 'settings.menus.show',
            'edit'    => 'settings.menus.edit',
            'update'  => 'settings.menus.update',
            'destroy' => 'settings.menus.destroy',
        ]);

        Route::resource('settings/companies', CompanyController::class)
            ->names([
                'index'   => 'settings.companies.index',
                'create'  => 'settings.companies.create',
                'store'   => 'settings.companies.store',
                'show'    => 'settings.companies.show',
                'edit'    => 'settings.companies.edit',
                'update'  => 'settings.companies.update',
                'destroy' => 'settings.companies.destroy',
            ]);

        Route::resource('settings/branches', BranchController::class)
            ->names([
                'index'   => 'settings.branches.index',
                'create'  => 'settings.branches.create',
                'store'   => 'settings.branches.store',
                'show'    => 'settings.branches.show',
                'edit'    => 'settings.branches.edit',
                'update'  => 'settings.branches.update',
                'destroy' => 'settings.branches.destroy',
            ]);

        Route::resource('settings/departments', DepartmentController::class)
            ->names([
                'index'   => 'settings.departments.index',
                'create'  => 'settings.departments.create',
                'store'   => 'settings.departments.store',
                'show'    => 'settings.departments.show',
                'edit'    => 'settings.departments.edit',
                'update'  => 'settings.departments.update',
                'destroy' => 'settings.departments.destroy',
            ]);

        Route::resource('settings/designations', DesignationController::class)
            ->names([
                'index'   => 'settings.designations.index',
                'create'  => 'settings.designations.create',
                'store'   => 'settings.designations.store',
                'show'    => 'settings.designations.show',
                'edit'    => 'settings.designations.edit',
                'update'  => 'settings.designations.update',
                'destroy' => 'settings.designations.destroy',
            ]);

        Route::resource('settings/employees', EmployeeController::class)
            ->names([
                'index'   => 'settings.employees.index',
                'create'  => 'settings.employees.create',
                'store'   => 'settings.employees.store',
                'show'    => 'settings.employees.show',
                'edit'    => 'settings.employees.edit',
                'update'  => 'settings.employees.update',
                'destroy' => 'settings.employees.destroy',
            ]);

        Route::get(
            'settings/employees/department/{department}',
            [EmployeeController::class, 'department']
        )
            ->name('settings.employees.department');
    });



require __DIR__ . '/auth.php';
