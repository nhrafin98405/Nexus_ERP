<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;
use App\Models\Company;
use App\Services\Branch\BranchCodeGenerator;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $nexus = Company::where('name', 'Nexus Technologies Ltd')->first();

        $abc = Company::where('name', 'ABC Trading Ltd')->first();



        if ($nexus) {

            Branch::create([

                'company_id' => $nexus->id,

                'name' => 'Dhaka Head Office',

                'code' => BranchCodeGenerator::generate(),

                'email' => 'dhaka@nexustechnologies.com',

                'phone' => '01710000001',

                'website' => 'https://nexustechnologies.com',

                'address' => 'Motijheel, Dhaka, Bangladesh',

                'status' => true,

            ]);



            Branch::create([

                'company_id' => $nexus->id,

                'name' => 'Chittagong Branch',

                'code' => BranchCodeGenerator::generate(),

                'email' => 'ctg@nexustechnologies.com',

                'phone' => '01710000002',

                'website' => 'https://nexustechnologies.com',

                'address' => 'Agrabad, Chittagong, Bangladesh',

                'status' => true,

            ]);

        }



        if ($abc) {

            Branch::create([

                'company_id' => $abc->id,

                'name' => 'Rajshahi Branch',

                'code' => BranchCodeGenerator::generate(),

                'email' => 'rajshahi@abctrading.com',

                'phone' => '01710000003',

                'website' => 'https://abctrading.com',

                'address' => 'Rajshahi, Bangladesh',

                'status' => true,

            ]);

        }
    }
}