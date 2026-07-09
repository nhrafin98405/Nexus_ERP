<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->paginate(10);

        return view('super-admin.settings.roles.index', compact('roles'));
    }


    public function create()
    {
        return view('super-admin.settings.roles.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'description' => 'nullable|string',
        ]);


        Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'status' => true,
            'is_system' => false,
            'created_by' => auth()->id(),
        ]);


        return redirect()
            ->route('super-admin.settings.roles.index')
            ->with('success', 'Role created successfully.');
    }


    public function edit(Role $role)
    {
        return view('super-admin.settings.roles.edit', compact('role'));
    }


    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'description' => 'nullable|string',
        ]);


        if ($role->isSystem()) {

            return back()
                ->with('error', 'System role cannot be modified.');
        }


        $role->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'updated_by' => auth()->id(),
        ]);


        return redirect()
            ->route('super-admin.settings.roles.index')
            ->with('success', 'Role updated successfully.');
    }


    public function destroy(Role $role)
    {
        if ($role->isSystem()) {

            return back()
                ->with('error', 'System role cannot be deleted.');
        }


        $role->delete();


        return back()
            ->with('success', 'Role deleted successfully.');
    }
}