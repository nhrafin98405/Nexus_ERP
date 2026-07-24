<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Pump;
use App\Models\Company;
use App\Models\Branch;
use App\Models\User;



class PumpSeeder extends Seeder
{

    public function run(): void
    {


        $company = Company::first();


        $branch = Branch::first();


        $user = User::first();



        Pump::updateOrCreate(

            [

                'code'=>'PUMP001'

            ],


            [


                'company_id'=>$company?->id,


                'branch_id'=>$branch?->id,


                'name'=>'N.H Rafin Petrol Pump',


                'code'=>'PUMP001',


                'owner_name'=>'N.H Rafin',


                'phone'=>'01700000000',


                'email'=>'pump@nhr.com',


                'address'=>'Dhaka, Bangladesh',


                'status'=>true,


                'created_by'=>$user?->id,


            ]

        );

    }

}