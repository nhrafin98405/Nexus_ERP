<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nozzle;
use App\Models\Pump;
use App\Models\Tank;
use App\Models\FuelType;
use App\Models\Company;
use App\Models\User;


class NozzleSeeder extends Seeder
{

    public function run(): void
    {


        $company = Company::first();

        $pump = Pump::first();

        $user = User::first();



        $diesel = FuelType::where('name','Diesel')->first();

        $petrol = FuelType::where('name','Petrol')->first();

        $octane = FuelType::where('name','Octane')->first();



        $dieselTank = Tank::where('fuel_type_id',$diesel?->id)
            ->first();


        $petrolTank = Tank::where('fuel_type_id',$petrol?->id)
            ->first();


        $octaneTank = Tank::where('fuel_type_id',$octane?->id)
            ->first();





        $nozzles = [


            [

                'code'=>'DSL-N01',

                'company_id'=>$company?->id,

                'pump_id'=>$pump?->id,

                'tank_id'=>$dieselTank?->id,

                'fuel_type_id'=>$diesel?->id,

                'name'=>'Diesel Nozzle 01',

                'meter_start'=>0,

                'meter_current'=>0,

                'status'=>true,

                'created_by'=>$user?->id,

            ],



            [

                'code'=>'PET-N01',

                'company_id'=>$company?->id,

                'pump_id'=>$pump?->id,

                'tank_id'=>$petrolTank?->id,

                'fuel_type_id'=>$petrol?->id,

                'name'=>'Petrol Nozzle 01',

                'meter_start'=>0,

                'meter_current'=>0,

                'status'=>true,

                'created_by'=>$user?->id,

            ],




            [

                'code'=>'OCT-N01',

                'company_id'=>$company?->id,

                'pump_id'=>$pump?->id,

                'tank_id'=>$octaneTank?->id,

                'fuel_type_id'=>$octane?->id,

                'name'=>'Octane Nozzle 01',

                'meter_start'=>0,

                'meter_current'=>0,

                'status'=>true,

                'created_by'=>$user?->id,

            ],


        ];





        foreach($nozzles as $nozzle)
        {

            Nozzle::updateOrCreate(

                [
                    'code'=>$nozzle['code']
                ],

                $nozzle

            );

        }



    }

}