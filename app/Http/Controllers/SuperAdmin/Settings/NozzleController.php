<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;

use App\Models\Nozzle;
use App\Models\Company;
use App\Models\Pump;
use App\Models\Tank;
use App\Models\FuelType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;


class NozzleController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Index
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        $nozzles = Nozzle::with([
                'company',
                'pump',
                'tank',
                'fuelType',
                'creator'
            ])
            ->latest()
            ->paginate(15);


        return view(
            'super-admin.settings.nozzles.index',
            compact('nozzles')
        );

    }






    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */

    public function create()
    {


        $companies = Company::where('status',1)
            ->get();


        $pumps = Pump::where('status',1)
            ->get();


        $tanks = Tank::where('status',1)
            ->get();


        $fuelTypes = FuelType::where('status',1)
            ->get();



        return view(
            'super-admin.settings.nozzles.create',
            compact(
                'companies',
                'pumps',
                'tanks',
                'fuelTypes'
            )
        );


    }







    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {


        $data = $request->validate([


            'company_id'=>'required|exists:companies,id',

            'pump_id'=>'required|exists:pumps,id',

            'tank_id'=>'required|exists:tanks,id',

            'fuel_type_id'=>'required|exists:fuel_types,id',


            'name'=>'required|string|max:255',

            'code'=>'required|string|max:50|unique:nozzles,code',


            'meter_start'=>'nullable|numeric',

            'meter_current'=>'nullable|numeric',


            'status'=>'required|boolean',


        ]);



        DB::beginTransaction();


        try{


            $data['code'] = strtoupper($data['code']);

            $data['meter_start'] = $data['meter_start'] ?? 0;

            $data['meter_current'] = $data['meter_current'] ?? 0;

            $data['created_by'] = Auth::id();



            Nozzle::create($data);



            DB::commit();



            return redirect()

                ->route('super-admin.settings.nozzles.index')

                ->with(
                    'success',
                    'Nozzle created successfully.'
                );


        }
        catch(Exception $e)
        {

            DB::rollBack();


            return back()

                ->withInput()

                ->with(
                    'error',
                    $e->getMessage()
                );

        }



    }









    /*
    |--------------------------------------------------------------------------
    | Show
    |--------------------------------------------------------------------------
    */

    public function show(Nozzle $nozzle)
    {


        $nozzle->load([

            'company',
            'pump',
            'tank',
            'fuelType',
            'creator',
            'updater'

        ]);



        return view(

            'super-admin.settings.nozzles.show',

            compact('nozzle')

        );


    }









    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */

    public function edit(Nozzle $nozzle)
    {


        $companies = Company::where('status',1)
            ->get();


        $pumps = Pump::where('status',1)
            ->get();


        $tanks = Tank::where('status',1)
            ->get();


        $fuelTypes = FuelType::where('status',1)
            ->get();




        return view(

            'super-admin.settings.nozzles.edit',

            compact(

                'nozzle',

                'companies',

                'pumps',

                'tanks',

                'fuelTypes'

            )

        );


    }









    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Nozzle $nozzle)
    {



        $data = $request->validate([


            'company_id'=>'required|exists:companies,id',

            'pump_id'=>'required|exists:pumps,id',

            'tank_id'=>'required|exists:tanks,id',

            'fuel_type_id'=>'required|exists:fuel_types,id',


            'name'=>'required|string|max:255',


            'code'=>'required|string|max:50|unique:nozzles,code,'.$nozzle->id,


            'meter_start'=>'nullable|numeric',

            'meter_current'=>'nullable|numeric',


            'status'=>'required|boolean',


        ]);




        DB::beginTransaction();


        try{


            $data['code'] = strtoupper($data['code']);

            $data['meter_start'] = $data['meter_start'] ?? 0;

            $data['meter_current'] = $data['meter_current'] ?? 0;

            $data['updated_by'] = Auth::id();




            $nozzle->update($data);



            DB::commit();




            return redirect()

                ->route('super-admin.settings.nozzles.index')

                ->with(
                    'success',
                    'Nozzle updated successfully.'
                );


        }
        catch(Exception $e)
        {


            DB::rollBack();


            return back()

                ->withInput()

                ->with(
                    'error',
                    $e->getMessage()
                );


        }


    }









    /*
    |--------------------------------------------------------------------------
    | Destroy
    |--------------------------------------------------------------------------
    */

    public function destroy(Nozzle $nozzle)
    {


        try{


            $nozzle->delete();



            return redirect()

                ->route('super-admin.settings.nozzles.index')

                ->with(
                    'success',
                    'Nozzle deleted successfully.'
                );


        }
        catch(Exception $e)
        {


            return back()

                ->with(
                    'error',
                    'Unable to delete nozzle.'
                );


        }


    }




}