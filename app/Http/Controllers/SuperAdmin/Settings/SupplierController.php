<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;

use App\Models\Supplier;
use App\Models\Company;
use App\Models\Pump;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Exception;

class SupplierController extends Controller
{

    /**
 * Display Suppliers
 */
public function index()
{
    $suppliers = Supplier::with([
            'company',
            'pump',
            'creator',
            'updater',
        ])
        ->latest()
        ->paginate(15);

    return view(
        'super-admin.settings.suppliers.index',
        compact('suppliers')
    );
}
/**
 * Create Supplier
 */
public function create()
{
    $companies = Company::where('status', true)
        ->latest()
        ->get();

    $pumps = Pump::where('status', true)
        ->latest()
        ->get();

    return view(
        'super-admin.settings.suppliers.create',
        compact(
            'companies',
            'pumps'
        )
    );
}
/**
 * Store Supplier
 */
public function store(Request $request)
{
    $request->validate([

        'company_id'      => 'required|exists:companies,id',
        'pump_id'         => 'required|exists:pumps,id',

        'name'            => 'required|string|max:255',
        'code'            => 'required|string|max:50|unique:suppliers,code',

        'contact_person'  => 'nullable|string|max:255',

        'phone'           => 'required|string|max:20',
        'email'           => 'nullable|email|max:255',

        'trade_license'   => 'nullable|string|max:100',
        'tin'             => 'nullable|string|max:100',

        'address'         => 'nullable|string',

        'opening_balance' => 'nullable|numeric|min:0',

        'balance_type'    => 'required|in:Payable,Receivable',

        'status'          => 'required|boolean',

    ]);



    DB::beginTransaction();

    try {

        Supplier::create([

            'company_id'      => $request->company_id,
            'pump_id'         => $request->pump_id,

            'name'            => $request->name,
            'code'            => strtoupper($request->code),

            'contact_person'  => $request->contact_person,

            'phone'           => $request->phone,
            'email'           => $request->email,

            'trade_license'   => $request->trade_license,
            'tin'             => $request->tin,

            'address'         => $request->address,

            'opening_balance' => $request->opening_balance ?? 0,
            'balance_type'    => $request->balance_type,

            'status'          => $request->status,

            'created_by'      => Auth::id(),

        ]);

        DB::commit();

        return redirect()
            ->route('super-admin.settings.suppliers.index')
            ->with(
                'success',
                'Supplier created successfully.'
            );

    } catch (Exception $e) {

        DB::rollBack();

        return back()
            ->withInput()
            ->with(
                'error',
                $e->getMessage()
            );

    }
}
/**
 * Show Supplier
 */
/**
 * Show Supplier
 */
public function show(Supplier $supplier)
{

    $supplier->load([

        'company',
        'pump',
        'creator',
        'updater',

    ]);



    $purchases = $supplier->fuelPurchases()

        ->with([

            'items',
            'creator'

        ])

        ->latest()

        ->paginate(15);



    return view(

        'super-admin.settings.suppliers.show',

        compact(

            'supplier',

            'purchases'

        )

    );

}



/**
 * Edit Supplier
 */
public function edit(Supplier $supplier)
{
    $companies = Company::where('status', true)
        ->latest()
        ->get();

    $pumps = Pump::where('status', true)
        ->latest()
        ->get();

    return view(
        'super-admin.settings.suppliers.edit',
        compact(
            'supplier',
            'companies',
            'pumps'
        )
    );
}
/**
 * Update Supplier
 */
public function update(Request $request, Supplier $supplier)
{
    $request->validate([

        'company_id'      => 'required|exists:companies,id',
        'pump_id'         => 'required|exists:pumps,id',

        'name'            => 'required|string|max:255',
        'code'            => 'required|string|max:50|unique:suppliers,code,' . $supplier->id,

        'contact_person'  => 'nullable|string|max:255',

        'phone'           => 'required|string|max:20',
        'email'           => 'nullable|email|max:255',

        'trade_license'   => 'nullable|string|max:100',
        'tin'             => 'nullable|string|max:100',

        'address'         => 'nullable|string',

        'opening_balance' => 'nullable|numeric|min:0',

        'balance_type'    => 'required|in:Payable,Receivable',

        'status'          => 'required|boolean',

    ]);


    DB::beginTransaction();

    try {

        $supplier->update([

            'company_id'      => $request->company_id,
            'pump_id'         => $request->pump_id,

            'name'            => $request->name,
            'code'            => strtoupper($request->code),

            'contact_person'  => $request->contact_person,

            'phone'           => $request->phone,
            'email'           => $request->email,

            'trade_license'   => $request->trade_license,
            'tin'             => $request->tin,

            'address'         => $request->address,

            'opening_balance' => $request->opening_balance ?? 0,
            'balance_type'    => $request->balance_type,

            'status'          => $request->status,

            'updated_by'      => Auth::id(),

        ]);

        DB::commit();

        return redirect()
            ->route('super-admin.settings.suppliers.index')
            ->with(
                'success',
                'Supplier updated successfully.'
            );

    } catch (Exception $e) {

        DB::rollBack();

        return back()
            ->withInput()
            ->with(
                'error',
                $e->getMessage()
            );
    }
}
/**
 * Delete Supplier
 */
public function destroy(Supplier $supplier)
{
    try {

        $supplier->delete();

        return redirect()
            ->route('super-admin.settings.suppliers.index')
            ->with(
                'success',
                'Supplier deleted successfully.'
            );

    } catch (Exception $e) {

        return back()->with(
            'error',
            $e->getMessage()
        );
    }
}


}