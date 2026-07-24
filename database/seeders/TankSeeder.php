<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tank;
use App\Models\Company;
use App\Models\Pump;
use App\Models\FuelType;
use App\Models\User;


class TankSeeder extends Seeder
{

    public function run(): void
    {


        $company = Company::first();

        $pump = Pump::first();

        $user = User::first();



        /*
        |--------------------------------------------------------------------------
        | Fuel Types
        |--------------------------------------------------------------------------
        */

        $diesel = FuelType::where('name','Diesel')
            ->first();


        $petrol = FuelType::where('name','Petrol')
            ->first();


        $octane = FuelType::where('name','Octane')
            ->first();





        if(!$company || !$pump)
        {
            return;
        }



        if(!$diesel || !$petrol || !$octane)
        {
            return;
        }






        $tanks = [



            /*
            |--------------------------------------------------------------------------
            | Diesel Tank
            |--------------------------------------------------------------------------
            */

            [

                'company_id' => $company->id,

                'pump_id' => $pump->id,

                'fuel_type_id' => $diesel->id,


                'name' => 'Diesel Tank',

                'code' => 'DT001',


                'capacity' => 20000,

                'current_stock' => 15000,


                'status' => true,


                'created_by' => $user?->id,

            ],





            /*
            |--------------------------------------------------------------------------
            | Petrol Tank
            |--------------------------------------------------------------------------
            */

            [

                'company_id' => $company->id,

                'pump_id' => $pump->id,

                'fuel_type_id' => $petrol->id,


                'name' => 'Petrol Tank',

                'code' => 'PT001',


                'capacity' => 15000,

                'current_stock' => 10000,


                'status' => true,


                'created_by' => $user?->id,

            ],





            /*
            |--------------------------------------------------------------------------
            | Octane Tank
            |--------------------------------------------------------------------------
            */

            [

                'company_id' => $company->id,

                'pump_id' => $pump->id,

                'fuel_type_id' => $octane->id,


                'name' => 'Octane Tank',

                'code' => 'OT001',


                'capacity' => 15000,

                'current_stock' => 12000,


                'status' => true,


                'created_by' => $user?->id,

            ],



        ];






        foreach($tanks as $tank)
        {


            Tank::updateOrCreate(

                [

                    'code' => $tank['code']

                ],

                $tank

            );


        }



    }

}