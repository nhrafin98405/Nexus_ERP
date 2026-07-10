<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {

            $menus = Menu::whereNull('parent_id')
                ->where('status', 1)
                ->orderBy('sort_order')
                ->with('children')
                ->get();

            $view->with('sidebarMenus', $menus);

        });
    }
}