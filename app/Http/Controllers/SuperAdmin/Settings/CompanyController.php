<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use App\Services\Company\CompanyCodeGenerator;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $companies = Company::latest()->paginate(10);

    return view(
        'super-admin.settings.companies.index',
        compact('companies')
    );
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('super-admin.settings.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(StoreCompanyRequest $request)
{

// dd(
//     $request->hasFile('logo'),
//     $request->file('logo')
// );


     $data = $request->validated();

     if (!empty($data['website'])) {

    if (!preg_match('/^https?:\/\//', $data['website'])) {

        $data['website'] = 'https://' . $data['website'];

    }

}

    $data['code'] = CompanyCodeGenerator::generate();

    if ($request->hasFile('logo')) {

    $data['logo'] = $request->file('logo')
        ->store('companies', 'public');

}

    Company::create($data);

    return redirect()
        ->route('super-admin.settings.companies.index')
        ->with('success', 'Company created successfully.');
}

    /**
     * Display the specified resource.
     */
public function show(Company $company)
{
    return view(
        'super-admin.settings.companies.show',
        compact('company')
    );
}

    /**
     * Show the form for editing the specified resource.
     */
  public function edit(Company $company)
{
    return view(
        'super-admin.settings.companies.edit',
        compact('company')
    );
}

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCompanyRequest $request, Company $company)
{
    $data = $request->validated();


    if (!empty($data['website'])) {

        if (!preg_match('/^https?:\/\//', $data['website'])) {

            $data['website'] = 'https://' . $data['website'];

        }

    }


    if ($request->hasFile('logo')) {


        if ($company->logo && \Storage::disk('public')->exists($company->logo)) {

            Storag::disk('public')->delete($company->logo);

        }


        $data['logo'] = $request->file('logo')
            ->store('companies', 'public');

    }



    $company->update($data);



    return redirect()
        ->route('super-admin.settings.companies.index')
        ->with('success', 'Company updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
{
    $company->delete();

    return redirect()
        ->route('super-admin.settings.companies.index')
        ->with('success', 'Company deleted successfully.');
}
}
