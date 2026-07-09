<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{

    /**
     * Show permissions for role
     */
    public function index(Role $role)
    {
        $modules = Permission::orderBy('name')
    ->get()
    ->groupBy(function ($permission) {
        return explode('.', $permission->name)[0];
    });

$rolePermissions = $role->permissions
    ->pluck('name')
    ->toArray();

return view(
    'super-admin.settings.roles.permissions',
    compact(
        'role',
        'modules',
        'rolePermissions'
    )
);

       
       dd($modules);
    }



    /**
     * Update role permissions
     */
    public function update(Request $request, Role $role)
    {

        if ($role->isSystem()) {

            return back()
                ->with(
                    'error',
                    'System role permission cannot be modified.'
                );
        }


        $permissions = $request->permissions ?? [];


        $role->syncPermissions($permissions);


        return redirect()
            ->route(
                'super-admin.settings.roles.permissions.index',
                $role->id
            )
            ->with(
                'success',
                'Role permissions updated successfully.'
            );

    }

}