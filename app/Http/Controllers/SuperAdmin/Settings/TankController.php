<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Tank;
use App\Models\Company;
use App\Models\Pump;
use App\Models\FuelType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;


class TankController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Tank List
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        $tanks = Tank::with([

                'company',
                'pump',
                'fuelType',
                'creator'

            ])

            ->latest()

            ->paginate(15);



        return view(

            'super-admin.settings.tanks.index',

            compact('tanks')

        );

    }





    /*
    |--------------------------------------------------------------------------
    | Create Form
    |--------------------------------------------------------------------------
    */

    public function create()
    {


        $companies = Company::where('status',true)
            ->latest()
            ->get();



        $pumps = Pump::where('status',true)
            ->latest()
            ->get();



        $fuelTypes = FuelType::where('status',true)
            ->latest()
            ->get();



        return view(

            'super-admin.settings.tanks.create',

            compact(

                'companies',

                'pumps',

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


        $request->validate([


            'company_id'=>'nullable|exists:companies,id',


            'pump_id'=>'required|exists:pumps,id',


            'fuel_type_id'=>'required|exists:fuel_types,id',


            'name'=>'required|string|max:100',


            'code'=>'required|string|max:50|unique:tanks,code',


            'capacity'=>'required|numeric|min:0',


            'current_stock'=>'required|numeric|min:0',


            'status'=>'required|boolean',


        ]);




        DB::beginTransaction();



        try{


            Tank::create([


                'company_id'=>$request->company_id,


                'pump_id'=>$request->pump_id,


                'fuel_type_id'=>$request->fuel_type_id,


                'name'=>$request->name,


                'code'=>strtoupper($request->code),


                'capacity'=>$request->capacity,


                'current_stock'=>$request->current_stock,


                'status'=>$request->status,


                'created_by'=>Auth::id(),


            ]);



            DB::commit();



            return redirect()

                ->route('super-admin.settings.tanks.index')

                ->with(

                    'success',

                    'Tank created successfully.'

                );



        }

        catch(Exception $e){



            DB::rollBack();



            return back()

                ->withInput()

                ->with(

                    'error',

                    'Something went wrong.'

                );


        }


    }








    /*
    |--------------------------------------------------------------------------
    | Show
    |--------------------------------------------------------------------------
    */

    public function show(Tank $tank)
    {


        $tank->load([

            'company',

            'pump',

            'fuelType',

            'creator',

            'updater'

        ]);



        return view(

            'super-admin.settings.tanks.show',

            compact('tank')

        );

    }







    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */

    public function edit(Tank $tank)
    {


        $companies = Company::where('status',true)
            ->latest()
            ->get();



        $pumps = Pump::where('status',true)
            ->latest()
            ->get();



        $fuelTypes = FuelType::where('status',true)
            ->latest()
            ->get();



        return view(

            'super-admin.settings.tanks.edit',

            compact(

                'tank',

                'companies',

                'pumps',

                'fuelTypes'

            )

        );


    }







    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(Request $request,Tank $tank)
    {


        $request->validate([


            'company_id'=>'nullable|exists:companies,id',


            'pump_id'=>'required|exists:pumps,id',


            'fuel_type_id'=>'required|exists:fuel_types,id',


            'name'=>'required|string|max:100',


            'code'=>'required|string|max:50|unique:tanks,code,'.$tank->id,


            'capacity'=>'required|numeric|min:0',


            'current_stock'=>'required|numeric|min:0',


            'status'=>'required|boolean',


        ]);





        DB::beginTransaction();



        try{



            $tank->update([


                'company_id'=>$request->company_id,


                'pump_id'=>$request->pump_id,


                'fuel_type_id'=>$request->fuel_type_id,


                'name'=>$request->name,


                'code'=>strtoupper($request->code),


                'capacity'=>$request->capacity,


                'current_stock'=>$request->current_stock,


                'status'=>$request->status,


                'updated_by'=>Auth::id(),


            ]);



            DB::commit();



            return redirect()

                ->route('super-admin.settings.tanks.index')

                ->with(

                    'success',

                    'Tank updated successfully.'

                );



        }

        catch(Exception $e){


            DB::rollBack();


            return back()

                ->withInput()

                ->with(

                    'error',

                    'Update failed.'

                );

        }


    }







    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    public function destroy(Tank $tank)
    {


        try{


            $tank->delete();



            return redirect()

                ->route('super-admin.settings.tanks.index')

                ->with(

                    'success',

                    'Tank deleted successfully.'

                );


        }

        catch(Exception $e){



            return back()

                ->with(

                    'error',

                    'Delete failed.'

                );


        }


    }


}