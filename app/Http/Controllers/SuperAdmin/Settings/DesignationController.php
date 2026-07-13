<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDesignationRequest;
use App\Models\Designation;
use App\Models\Department;
use App\Services\Designation\DesignationCodeGenerator;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $designations = Designation::with('department')
            ->latest()
            ->paginate(10);

        return view(
            'super-admin.settings.designations.index',
            compact('designations')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'super-admin.settings.designations.create',
            compact('departments')
        );
    }

    /**
     * Store a newly created resource.
     */
    public function store(StoreDesignationRequest $request)
    {
        $data = $request->validated();

        // Generate Designation Code
        $data['code'] = DesignationCodeGenerator::generate();

        Designation::create($data);

        return redirect()
            ->route('super-admin.settings.designations.index')
            ->with('success', 'Designation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation)
    {
        return view(
            'super-admin.settings.designations.show',
            compact('designation')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        $departments = Department::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'super-admin.settings.designations.edit',
            compact('designation', 'departments')
        );
    }

    /**
     * Update the specified resource.
     */
    public function update(StoreDesignationRequest $request, Designation $designation)
    {
        $data = $request->validated();

        $designation->update($data);

        return redirect()
            ->route('super-admin.settings.designations.index')
            ->with('success', 'Designation updated successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();

        return redirect()
            ->route('super-admin.settings.designations.index')
            ->with('success', 'Designation deleted successfully.');
    }
}