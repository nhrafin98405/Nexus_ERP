<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Pump;
use Illuminate\Http\Request;

class PumpController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Pump List
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $pumps = Pump::latest()->paginate(10);

        return view('super-admin.pumps.index', compact('pumps'));
    }

    /*
    |--------------------------------------------------------------------------
    | Create Form
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('super-admin.pumps.create');
    }

    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|unique:pumps,code',
            'phone' => 'nullable|max:20',
            'email' => 'nullable|email',
        ]);

        Pump::create([
            'name' => $request->name,
            'code' => $request->code,
            'owner_name' => $request->owner_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'status' => $request->status ?? 1,
        ]);

        return redirect()
            ->route('pumps.index')
            ->with('success', 'Pump Created Successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Edit Form
    |--------------------------------------------------------------------------
    */

    /*
|--------------------------------------------------------------------------
| Pump Details
|--------------------------------------------------------------------------
*/

public function show(Pump $pump)
{
    // Future Ready Statistics
    $totalTank = $pump->tanks()->count();

    $totalEmployee = $pump->employees()->count();

    return view(
        'super-admin.pumps.show',
        compact(
            'pump',
            'totalTank',
            'totalEmployee'
        )
    );
}

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Pump $pump)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|unique:pumps,code,' . $pump->id,
            'phone' => 'nullable|max:20',
            'email' => 'nullable|email',
        ]);

        $pump->update($request->all());

        return redirect()
            ->route('pumps.index')
            ->with('success', 'Pump Updated Successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    public function destroy(Pump $pump)
    {
        $pump->delete();

        return back()->with('success', 'Pump Deleted Successfully.');
    }
}