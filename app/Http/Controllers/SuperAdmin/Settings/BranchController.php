<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBranchRequest;
use App\Models\Branch;
use App\Models\Company;
use App\Services\Branch\BranchCodeGenerator;
use Illuminate\Support\Facades\Storage;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::with('company')
            ->latest()
            ->paginate(10);

        return view(
            'super-admin.settings.branches.index',
            compact('branches')
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'super-admin.settings.branches.create',
            compact('companies')
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBranchRequest $request)
    {
        $data = $request->validated();


        // Website HTTPS
        if (!empty($data['website'])) {

            if (!preg_match('/^https?:\/\//', $data['website'])) {

                $data['website'] = 'https://' . $data['website'];

            }

        }


        // Generate Branch Code
        $data['code'] = BranchCodeGenerator::generate();


        // Logo Upload
        if ($request->hasFile('logo')) {

            $data['logo'] = $request->file('logo')
                ->store('branches', 'public');

        }


        Branch::create($data);


        return redirect()
            ->route('super-admin.settings.branches.index')
            ->with('success', 'Branch created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        return view(
            'super-admin.settings.branches.show',
            compact('branch')
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        $companies = Company::where('status', true)
            ->orderBy('name')
            ->get();


        return view(
            'super-admin.settings.branches.edit',
            compact('branch', 'companies')
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBranchRequest $request, Branch $branch)
    {
        $data = $request->validated();


        // Website HTTPS
        if (!empty($data['website'])) {

            if (!preg_match('/^https?:\/\//', $data['website'])) {

                $data['website'] = 'https://' . $data['website'];

            }

        }


        // Replace Logo
        if ($request->hasFile('logo')) {


            if ($branch->logo && Storage::disk('public')->exists($branch->logo)) {

                Storage::disk('public')->delete($branch->logo);

            }


            $data['logo'] = $request->file('logo')
                ->store('branches', 'public');

        }


        $branch->update($data);


        return redirect()
            ->route('super-admin.settings.branches.index')
            ->with('success', 'Branch updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {

        if ($branch->logo && Storage::disk('public')->exists($branch->logo)) {

            Storage::disk('public')->delete($branch->logo);

        }


        $branch->delete();


        return redirect()
            ->route('super-admin.settings.branches.index')
            ->with('success', 'Branch deleted successfully.');
    }
}