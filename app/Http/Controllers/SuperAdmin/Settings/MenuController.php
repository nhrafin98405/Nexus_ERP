<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Str;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $menus = Menu::with('parent')
        ->orderBy('sort_order')
        ->get();

    return view(
        'super-admin.settings.menus.index',
        compact('menus')
    );
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $parents = Menu::whereNull('parent_id')
        ->orderBy('sort_order')
        ->get();

    $permissions = Permission::orderBy('name')->get();

    return view(
        'super-admin.settings.menus.create',
        compact('parents', 'permissions')
    );
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
{
    $data = $request->validated();

    $data['slug'] = Str::slug($data['slug']);

    $data['created_by'] = auth()->id();

    Menu::create($data);

    return redirect()
        ->route('super-admin.settings.menus.index')
        ->with('success', 'Menu created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo"COMMING SOON";
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(Menu $menu)
{
    $parents = Menu::whereNull('parent_id')
        ->where('id', '!=', $menu->id)
        ->orderBy('sort_order')
        ->get();

    $permissions = Permission::orderBy('name')->get();

    return view(
        'super-admin.settings.menus.edit',
        compact('menu', 'parents', 'permissions')
    );
}

    /**
     * Update the specified resource in storage.
     */
public function update(MenuRequest $request, Menu $menu)
{
    $data = $request->validated();

    $data['slug'] = Str::slug($data['slug']);

    $data['updated_by'] = auth()->id();

    $menu->update($data);

    if ($menu->id == $request->parent_id) {
    return back()
        ->withErrors([
            'parent_id' => 'A menu cannot be its own parent.'
        ])
        ->withInput();
}

    return redirect()
        ->route('super-admin.settings.menus.index')
        ->with('success', 'Menu updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy(Menu $menu)
{
    $menu->delete();

    return redirect()
        ->route('super-admin.settings.menus.index')
        ->with('success', 'Menu deleted successfully.');
}
}
