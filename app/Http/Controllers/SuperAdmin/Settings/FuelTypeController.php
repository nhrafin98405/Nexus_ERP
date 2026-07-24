<?php

namespace App\Http\Controllers\SuperAdmin\Settings;


use App\Http\Controllers\Controller;

use App\Http\Requests\SuperAdmin\Settings\StoreFuelTypeRequest;
use App\Http\Requests\SuperAdmin\Settings\UpdateFuelTypeRequest;

use App\Models\FuelType;
use App\Models\Company;
use App\Models\Pump;

use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\View\View;

use Exception;



class FuelTypeController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | Fuel Type List
    |--------------------------------------------------------------------------
    */

    public function index(): View
    {


        $fuelTypes = FuelType::with([

                'company',
                'pump',
                'creator',
                'updater'

            ])

            ->latest()

            ->paginate(15);



        return view(

            'super-admin.settings.fuel-types.index',

            compact('fuelTypes')

        );


    }




    /*
    |--------------------------------------------------------------------------
    | Create Page
    |--------------------------------------------------------------------------
    */


    public function create(): View
    {


        $companies = Company::where('status',true)

            ->latest()

            ->get();



        $pumps = Pump::where('status',true)

            ->latest()

            ->get();



        return view(

            'super-admin.settings.fuel-types.create',

            compact(

                'companies',

                'pumps'

            )

        );


    }





    /*
    |--------------------------------------------------------------------------
    | Store Fuel Type
    |--------------------------------------------------------------------------
    */


    public function store(
        StoreFuelTypeRequest $request
    ): RedirectResponse
    {


        DB::beginTransaction();


        try {


            FuelType::create([



                /*
                | Organization
                */

                'company_id' => $request->company_id,

                'pump_id' => $request->pump_id,



                /*
                | Basic
                */

                'name' => $request->name,


                'code' => strtoupper(
                    $request->code
                ),


                'short_name' => $request->short_name,


                'color' => $request->color,


                'description' => $request->description,




                /*
                | Pricing
                */

                'purchase_price' => $request->purchase_price,


                'selling_price' => $request->selling_price,




                /*
                | Status
                */

                'status' => $request->status,




                /*
                | Audit
                */

                'created_by' => Auth::id(),



            ]);




            DB::commit();




            return redirect()

                ->route(
                    'super-admin.settings.fuel-types.index'
                )

                ->with(
                    'success',
                    'Fuel Type created successfully.'
                );



        } catch(Exception $e) {



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
    | Show Fuel Type
    |--------------------------------------------------------------------------
    */


    public function show(
        FuelType $fuelType
    ): View
    {


        $fuelType->load([

            'company',

            'pump',

            'creator',

            'updater'

        ]);




        return view(

            'super-admin.settings.fuel-types.show',

            compact('fuelType')

        );


    }






    /*
    |--------------------------------------------------------------------------
    | Edit Page
    |--------------------------------------------------------------------------
    */


    public function edit(
        FuelType $fuelType
    ): View
    {



        $companies = Company::where('status',true)

            ->latest()

            ->get();



        $pumps = Pump::where('status',true)

            ->latest()

            ->get();




        return view(

            'super-admin.settings.fuel-types.edit',

            compact(

                'fuelType',

                'companies',

                'pumps'

            )

        );


    }







    /*
    |--------------------------------------------------------------------------
    | Update Fuel Type
    |--------------------------------------------------------------------------
    */


    public function update(

        UpdateFuelTypeRequest $request,

        FuelType $fuelType

    ): RedirectResponse
    {


        DB::beginTransaction();



        try {



            $fuelType->update([



                /*
                | Organization
                */

                'company_id' => $request->company_id,


                'pump_id' => $request->pump_id,




                /*
                | Basic
                */

                'name' => $request->name,


                'code' => strtoupper(
                    $request->code
                ),


                'short_name' => $request->short_name,


                'color' => $request->color,


                'description' => $request->description,




                /*
                | Pricing
                */

                'purchase_price' => $request->purchase_price,


                'selling_price' => $request->selling_price,




                /*
                | Status
                */

                'status' => $request->status,




                /*
                | Audit
                */

                'updated_by' => Auth::id(),



            ]);




            DB::commit();




            return redirect()

                ->route(
                    'super-admin.settings.fuel-types.index'
                )

                ->with(
                    'success',
                    'Fuel Type updated successfully.'
                );




        } catch(Exception $e) {



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
    | Delete Fuel Type
    |--------------------------------------------------------------------------
    */


    public function destroy(

        FuelType $fuelType

    ): RedirectResponse
    {


        try {


            $fuelType->delete();




            return redirect()

                ->route(
                    'super-admin.settings.fuel-types.index'
                )

                ->with(
                    'success',
                    'Fuel Type deleted successfully.'
                );



        } catch(Exception $e) {



            return back()

                ->with(
                    'error',
                    'Delete failed.'
                );


        }



    }




}