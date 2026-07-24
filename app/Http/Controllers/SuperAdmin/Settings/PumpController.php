<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Models\FuelType;
use App\Models\Pump;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Exception;


class PumpController extends Controller
{


    public function index()
    {
        $pumps = Pump::latest()->paginate(10);

        return view(
            'super-admin.settings.pumps.index',
            compact('pumps')
        );
    }



    public function create()
    {
        return view(
            'super-admin.settings.pumps.create'
        );
    }




    public function store(Request $request)
    {


        $request->validate([

            'name'=>'required|string|max:255',

            'code'=>'required|string|max:50|unique:pumps,code',

            'owner_name'=>'nullable|string|max:255',

            'phone'=>'nullable|string|max:20',

            'email'=>'nullable|email',

            'address'=>'nullable|string',

            'status'=>'required|boolean',

        ]);



        DB::beginTransaction();


        try {


            Pump::create([


                'name'=>$request->name,

                'code'=>strtoupper($request->code),

                'owner_name'=>$request->owner_name,

                'phone'=>$request->phone,

                'email'=>$request->email,

                'address'=>$request->address,

                'status'=>$request->status,


                'created_by'=>Auth::id(),

            ]);



            DB::commit();



            return redirect()

            ->route('super-admin.settings.pumps.index')

            ->with(
                'success',
                'Pump created successfully.'
            );



        }
        catch(Exception $e)
        {

            DB::rollBack();


            return back()

            ->withInput()

            ->with(
                'error',
                'Something went wrong.'
            );

        }


    }





public function show(Pump $pump)
{

    $totalTank = $pump
        ->tanks()
        ->count();


    $totalEmployee = $pump
        ->employees()
        ->count();


    $totalFuelType = $pump
        ->fuelTypes()
        ->count();


    $todaySale = $pump
        ->fuelSales()
        ->whereDate('created_at', today())
        ->sum('grand_total');



    return view(
        'super-admin.settings.pumps.show',
        compact(
            'pump',
            'totalTank',
            'totalEmployee',
            'totalFuelType',
            'todaySale'
        )
    );

}




    public function edit(Pump $pump)
    {

        return view(
            'super-admin.settings.pumps.edit',
            compact('pump')
        );

    }





    public function update(Request $request, Pump $pump)
    {


        $request->validate([


            'name'=>'required|string|max:255',

            'code'=>'required|string|max:50|unique:pumps,code,'.$pump->id,

            'owner_name'=>'nullable|string|max:255',

            'phone'=>'nullable|string|max:20',

            'email'=>'nullable|email',

            'address'=>'nullable|string',

            'status'=>'required|boolean',

        ]);




        DB::beginTransaction();


        try {


            $pump->update([


                'name'=>$request->name,

                'code'=>strtoupper($request->code),

                'owner_name'=>$request->owner_name,

                'phone'=>$request->phone,

                'email'=>$request->email,

                'address'=>$request->address,

                'status'=>$request->status,


                'updated_by'=>Auth::id(),


            ]);



            DB::commit();



            return redirect()

            ->route('super-admin.settings.pumps.index')

            ->with(
                'success',
                'Pump updated successfully.'
            );



        }
        catch(Exception $e)
        {

            DB::rollBack();


            return back()

            ->withInput()

            ->with(
                'error',
                'Update failed.'
            );

        }

    }





    public function destroy(Pump $pump)
    {


        try {


            $pump->delete();


            return redirect()

            ->route('super-admin.settings.pumps.index')

            ->with(
                'success',
                'Pump deleted successfully.'
            );


        }
        catch(Exception $e)
        {

            return back()

            ->with(
                'error',
                'Delete failed.'
            );

        }

    }



}