<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Services\DashboardService;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboard = DashboardService::get();

        return view(
            'super-admin.dashboard',
            compact('dashboard')
        );
    }
}