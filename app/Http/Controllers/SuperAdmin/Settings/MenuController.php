<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

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

    return view(
        'super-admin.settings.menus.create',
        compact('parents')
    );
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
