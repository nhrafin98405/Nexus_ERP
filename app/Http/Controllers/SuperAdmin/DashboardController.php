<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index(): View
    {

        $totalUsers = User::count();
        $totalRoles = Role::count();
        $totalPermissions = Permission::count();
        return view('super-admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalRoles' => $totalRoles,
            'totalPermissions' => $totalPermissions,


        ]);
    }
}
