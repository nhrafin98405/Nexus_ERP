<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FuelType;
use App\Models\Company;
use App\Models\Pump;

class FuelTypeSeeder extends Seeder
{

    public function run(): void
    {


        $company = Company::first();


        if(!$company)
        {
            return;
        }


        $pumps = Pump::where(
            'company_id',
            $company->id
        )->get();



        foreach($pumps as $pump)
        {


            $fuelTypes = [


                [
                    'company_id' => $company->id,

                    'pump_id' => $pump->id,

                    'name' => 'Diesel',

                    'code' => 'DSL-'.$pump->id,

                    'short_name' => 'Diesel',

                    'color' => '#000000',

                    'description' => 'Diesel Fuel',

                    'purchase_price' => 110,

                    'selling_price' => 120,

                    'status' => true,
                ],



                [
                    'company_id' => $company->id,

                    'pump_id' => $pump->id,

                    'name' => 'Petrol',

                    'code' => 'PET-'.$pump->id,

                    'short_name' => 'Petrol',

                    'color' => '#FF0000',

                    'description' => 'Petrol Fuel',

                    'purchase_price' => 115,

                    'selling_price' => 125,

                    'status' => true,
                ],



                [
                    'company_id' => $company->id,

                    'pump_id' => $pump->id,

                    'name' => 'Octane',

                    'code' => 'OCT-'.$pump->id,

                    'short_name' => 'Octane',

                    'color' => '#0000FF',

                    'description' => 'Octane Fuel',

                    'purchase_price' => 120,

                    'selling_price' => 130,

                    'status' => true,
                ],


            ];



            foreach($fuelTypes as $fuelType)
            {

                FuelType::updateOrCreate(

                    [
                        'code'=>$fuelType['code']
                    ],

                    $fuelType

                );

            }


        }


    }

}