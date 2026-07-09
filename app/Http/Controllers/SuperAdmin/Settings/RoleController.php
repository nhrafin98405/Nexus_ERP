<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->paginate(10);

        return view(
            'super-admin.settings.roles.index',
            compact('roles')
        );
    }


    public function edit($id)
    {
        $role = Role::findOrFail($id);

        $permissions = Permission::all();

        return view(
            'super-admin.settings.roles.edit',
            compact('role','permissions')
        );
    }


    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->update([
            'name' => $request->name,
        ]);


        // Permission Assign
        $role->syncPermissions(
            $request->permissions ?? []
        );


        return redirect()
            ->route('super-admin.settings.roles.index')
            ->with('success','Role updated successfully');
    }
}