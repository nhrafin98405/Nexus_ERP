<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::truncate();

        // Dashboard
        Menu::create([
            'name'       => 'Dashboard',
            'slug'       => 'dashboard',
            'icon'       => 'bx bx-home-alt',
            'route_name' => 'super-admin.dashboard',
            'menu_type'  => 'sidebar',
            'sort_order' => 1,
            'status'     => 1,
        ]);

        // Settings
        $settings = Menu::create([
            'name'       => 'Settings',
            'slug'       => 'settings',
            'icon'       => 'bx bx-cog',
            'menu_type'  => 'sidebar',
            'sort_order' => 2,
            'status'     => 1,
        ]);



        Menu::create([
            'parent_id'  => $settings->id,
            'name'       => 'Roles',
            'slug'       => 'roles',
            'icon'       => 'bx bx-shield',
            'route_name' => 'super-admin.settings.roles.index',
            'menu_type'  => 'sidebar',
            'sort_order' => 2,
            'status'     => 1,
        ]);

        Menu::create([
            'parent_id'  => $settings->id,
            'name'       => 'Permissions',
            'slug'       => 'permissions',
            'icon'       => 'bx bx-lock',
            'route_name' => 'super-admin.settings.permissions.index',
            'menu_type'  => 'sidebar',
            'sort_order' => 3,
            'status'     => 1,
        ]);



        Menu::create([
            'parent_id'       => $settings->id,
            'name'            => 'Users',
            'slug'            => 'users',
            'icon'            => 'bx bx-user',
            'route_name'      => 'super-admin.settings.users.index',
            'permission_name' => 'user.view',
            'menu_type'       => 'sidebar',
            'sort_order'      => 1,
            'status'          => 1,
        ]);

        Menu::create([
            'parent_id'       => $settings->id,
            'name'            => 'Menus',
            'slug'            => 'menus',
            'icon'            => 'bx bx-menu',
            'route_name'      => 'super-admin.settings.menus.index',
            'permission_name' => 'menu.view',
            'menu_type'       => 'sidebar',
            'sort_order'      => 4,
            'status'          => 1,
        ]);
    }
}
