<?php

namespace App\Http\Controllers\SuperAdmin\Settings;


use App\Http\Controllers\Controller;

use App\Models\StockMovement;

use Illuminate\Http\Request;



class StockMovementController extends Controller
{


    /**
     * Display Stock Ledger
     */
    public function index(Request $request)
    {


        $query = StockMovement::with([

            'company',

            'pump',

            'tank',

            'fuelType',

            'creator'

        ]);




        /*
        |--------------------------------------------------------------------------
        | Filter By Movement Type
        |--------------------------------------------------------------------------
        */


        if($request->filled('type'))

        {

            $query->where(

                'type',

                $request->type

            );

        }







        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */


        if($request->filled('search'))

        {

            $search = $request->search;


            $query->whereHas('fuelType', function($q) use($search){

                $q->where(

                    'name',

                    'like',

                    "%{$search}%"

                );

            });


        }







        $movements = $query

            ->latest()

            ->paginate(20)

            ->withQueryString();







        return view(

            'super-admin.settings.stock-movements.index',

            compact('movements')

        );


    }



}