<?php

namespace App\Http\Controllers\SuperAdmin\Settings;


use App\Http\Controllers\Controller;


use App\Models\FuelPurchase;
use App\Models\Company;
use App\Models\Pump;
use App\Models\Supplier;
use App\Models\FuelType;
use App\Models\Tank;
use App\Models\StockMovement;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Exception;



class FuelPurchaseController extends Controller
{


    /**
     * Display Purchase List
     */
    public function index()
    {

        $purchases = FuelPurchase::with([

            'company',
            'pump',
            'supplier',
            'creator'

        ])

        ->latest()

        ->paginate(15);



        return view(

            'super-admin.settings.fuel-purchases.index',

            compact('purchases')

        );


    }







    /**
     * Create Purchase
     */
    public function create()
    {


        $companies = Company::where('status',true)

            ->latest()

            ->get();



        $pumps = Pump::where('status',true)

            ->latest()

            ->get();




        $suppliers = Supplier::where('status',true)

            ->latest()

            ->get();




        $fuelTypes = FuelType::where('status',true)

            ->latest()

            ->get();




        $tanks = Tank::where('status',true)

            ->latest()

            ->get();





        return view(

            'super-admin.settings.fuel-purchases.create',

            compact(

                'companies',
                'pumps',
                'suppliers',
                'fuelTypes',
                'tanks'

            )

        );


    }








    /**
     * Store Purchase
     */
public function store(Request $request)
{


    $request->validate([


        'company_id'=>'required|exists:companies,id',

        'pump_id'=>'required|exists:pumps,id',

        'supplier_id'=>'required|exists:suppliers,id',


        'purchase_date'=>'required|date',


        'items'=>'required|array',

        'items.*.fuel_type_id'=>'required|exists:fuel_types,id',

        'items.*.tank_id'=>'required|exists:tanks,id',

        'items.*.quantity'=>'required|numeric|min:0',

        'items.*.rate'=>'required|numeric|min:0',



        'grand_total'=>'required|numeric',


        'status'=>'required|boolean',


    ]);





    DB::beginTransaction();


    try{


        /*
        |--------------------------------------------------------------------------
        | Create Purchase
        |--------------------------------------------------------------------------
        */


        $purchase = FuelPurchase::create([



            'company_id'=>$request->company_id,


            'pump_id'=>$request->pump_id,


            'supplier_id'=>$request->supplier_id,



            'purchase_no'=>
                'FP-'.date('YmdHis'),



            'purchase_date'=>
                $request->purchase_date,



            'subtotal'=>
                $request->subtotal ?? 0,



            'discount'=>
                $request->discount ?? 0,



            'vat'=>
                $request->vat ?? 0,



            'grand_total'=>
                $request->grand_total,



            'paid_amount'=>
                $request->paid_amount ?? 0,



            'due_amount'=>
                ($request->grand_total - ($request->paid_amount ?? 0)),



            'payment_status'=>

                (($request->paid_amount ?? 0) >= $request->grand_total)

                ? 'Paid'

                : 'Due',



            'payment_method'=>
                $request->payment_method ?? 'Cash',



            'remarks'=>
                $request->remarks,



            'status'=>
                $request->status,



            'created_by'=>
                Auth::id(),



        ]);









        /*
        |--------------------------------------------------------------------------
        | Save Purchase Items
        |--------------------------------------------------------------------------
        */


        foreach($request->items as $item)

        {


            $purchase->items()->create([



                'fuel_type_id'=>
                    $item['fuel_type_id'],



                'tank_id'=>
                    $item['tank_id'],



                'quantity'=>
                    $item['quantity'],



                'rate'=>
                    $item['rate'],



                'total'=>
                    $item['quantity'] * $item['rate'],



            ]);



            /*
            |--------------------------------------------------------------------------
            | Update Tank Stock
            |--------------------------------------------------------------------------
            */


            $tank = Tank::find(
                $item['tank_id']
            );



            if($tank)

            {


                $tank->increment(

                    'current_stock',

                    $item['quantity']

                );


            }



        }
        /*
|--------------------------------------------------------------------------
| Create Stock Movement
|--------------------------------------------------------------------------
*/


StockMovement::create([


    'company_id' => $request->company_id,


    'pump_id' => $request->pump_id,


    'tank_id' => $item['tank_id'],


    'fuel_type_id' => $item['fuel_type_id'],


    'type' => 'Purchase',


    'quantity' => $item['quantity'],


    'reference_type' => FuelPurchase::class,


    'reference_id' => $purchase->id,


    'created_by' => Auth::id(),


]);







        DB::commit();





        return redirect()

            ->route(
                'super-admin.settings.fuel-purchases.index'
            )

            ->with(
                'success',
                'Fuel Purchase created successfully.'
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







    /**
     * Show Purchase
     */
  public function show(FuelPurchase $fuelPurchase)
{

    $fuelPurchase->load([

        'company',
        'pump',
        'supplier',
        'creator',
        'items.fuelType',
        'items.tank'

    ]);


    return view(

        'super-admin.settings.fuel-purchases.show',

        compact('fuelPurchase')

    );

}








    /**
     * Edit Purchase
     */
    public function edit(FuelPurchase $fuelPurchase)
    {


        $companies = Company::where('status',true)->get();


        $pumps = Pump::where('status',true)->get();


        $suppliers = Supplier::where('status',true)->get();


        $fuelTypes = FuelType::where('status',true)->get();


        $tanks = Tank::where('status',true)->get();




        return view(

            'super-admin.settings.fuel-purchases.edit',

            compact(

                'fuelPurchase',

                'companies',

                'pumps',

                'suppliers',

                'fuelTypes',

                'tanks'

            )

        );


    }







    /**
     * Update Purchase
     */
public function update(Request $request, FuelPurchase $fuelPurchase)
{


    $request->validate([


        'company_id'=>'required|exists:companies,id',

        'pump_id'=>'required|exists:pumps,id',

        'supplier_id'=>'required|exists:suppliers,id',


        'purchase_date'=>'required|date',


        'items'=>'required|array',


        'items.*.fuel_type_id'=>'required|exists:fuel_types,id',


        'items.*.tank_id'=>'required|exists:tanks,id',


        'items.*.quantity'=>'required|numeric|min:0',


        'items.*.rate'=>'required|numeric|min:0',



        'grand_total'=>'required|numeric',


    ]);





    DB::beginTransaction();


    try{


        /*
        |--------------------------------------------------------------------------
        | Update Purchase Header
        |--------------------------------------------------------------------------
        */


        $fuelPurchase->update([



            'company_id'=>$request->company_id,


            'pump_id'=>$request->pump_id,


            'supplier_id'=>$request->supplier_id,



            'purchase_date'=>$request->purchase_date,



            'subtotal'=>$request->subtotal ?? 0,



            'discount'=>$request->discount ?? 0,



            'vat'=>$request->vat ?? 0,



            'grand_total'=>$request->grand_total,



            'paid_amount'=>$request->paid_amount ?? 0,



            'due_amount'=>

            (
                $request->grand_total 
                -
                ($request->paid_amount ?? 0)
            ),



            'updated_by'=>Auth::id(),


        ]);








        /*
        |--------------------------------------------------------------------------
        | Remove Old Items
        |--------------------------------------------------------------------------
        */


        $fuelPurchase->items()->delete();








        /*
        |--------------------------------------------------------------------------
        | Insert New Items
        |--------------------------------------------------------------------------
        */


        foreach($request->items as $item)

        {


            $fuelPurchase->items()->create([



                'fuel_type_id'=>
                    $item['fuel_type_id'],



                'tank_id'=>
                    $item['tank_id'],



                'quantity'=>
                    $item['quantity'],



                'rate'=>
                    $item['rate'],



                'total'=>

                (
                    $item['quantity']
                    *
                    $item['rate']
                ),



            ]);



        }







        DB::commit();





        return redirect()

        ->route(
            'super-admin.settings.fuel-purchases.index'
        )

        ->with(

            'success',

            'Fuel Purchase updated successfully.'

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







    /**
     * Delete Purchase
     */
    public function destroy(FuelPurchase $fuelPurchase)
    {


        $fuelPurchase->delete();



        return redirect()

            ->route(
                'super-admin.settings.fuel-purchases.index'
            )

            ->with(
                'success',
                'Fuel Purchase deleted successfully.'
            );


    }



}