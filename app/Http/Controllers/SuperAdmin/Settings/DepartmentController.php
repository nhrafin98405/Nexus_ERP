<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;
use App\Models\Branch;
use App\Services\Department\DepartmentCodeGenerator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::with('branch')
            ->latest()
            ->paginate(10);

        return view(
            'super-admin.settings.departments.index',
            compact('departments')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'super-admin.settings.departments.create',
            compact('branches')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $data = $request->validated();

        // Generate Department Code
        $data['code'] = DepartmentCodeGenerator::generate();

        Department::create($data);

        return redirect()
            ->route('super-admin.settings.departments.index')
            ->with('success', 'Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view(
            'super-admin.settings.departments.show',
            compact('department')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        $branches = Branch::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'super-admin.settings.departments.edit',
            compact('department', 'branches')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDepartmentRequest $request, Department $department)
    {
        $data = $request->validated();

        $department->update($data);

        return redirect()
            ->route('super-admin.settings.departments.index')
            ->with('success', 'Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()
            ->route('super-admin.settings.departments.index')
            ->with('success', 'Department deleted successfully.');
    }
}