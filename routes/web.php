<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\DashboardController;
use App\Http\Controllers\SuperAdmin\Settings\PermissionController;
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

            Route::resource('settings/permissions',PermissionController::class)->names([
                    'index' => 'settings.permissions.index',
                'create' => 'settings.permissions.create',
                'store' => 'settings.permissions.store',
                'show' => 'settings.permissions.show',
                'edit' => 'settings.permissions.edit',
                'update' => 'settings.permissions.update',
                'destroy' => 'settings.permissions.destroy',
            ]);
    });





require __DIR__ . '/auth.php';
