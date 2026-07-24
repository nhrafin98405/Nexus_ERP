<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Branch;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $branch = Branch::with('company')->first();


        if (!$branch) {

            return;

        }


        Department::firstOrCreate(

            [
                'code' => 'DEP0001'
            ],

            [

                /*
                |--------------------------------------------------------------------------
                | Organization
                |--------------------------------------------------------------------------
                */

                'company_id' => $branch->company_id,

                'branch_id' => $branch->id,


                /*
                |--------------------------------------------------------------------------
                | Department
                |--------------------------------------------------------------------------
                */

                'name' => 'Human Resource',

                'email' => 'hr@nexuserp.com',

                'phone' => '01711111111',

                'description' => 'Handles employee management and HR operations.',



                /*
                |--------------------------------------------------------------------------
                | Settings
                |--------------------------------------------------------------------------
                */

                'sort_order' => 1,

                'is_system' => true,


                /*
                |--------------------------------------------------------------------------
                | Status
                |--------------------------------------------------------------------------
                */

                'status' => true,

            ]

        );





        Department::firstOrCreate(

            [
                'code' => 'DEP0002'
            ],

            [

                /*
                |--------------------------------------------------------------------------
                | Organization
                |--------------------------------------------------------------------------
                */

                'company_id' => $branch->company_id,

                'branch_id' => $branch->id,


                /*
                |--------------------------------------------------------------------------
                | Department
                |--------------------------------------------------------------------------
                */

                'name' => 'Accounts',

                'email' => 'accounts@nexuserp.com',

                'phone' => '01722222222',

                'description' => 'Handles finance and accounting.',



                /*
                |--------------------------------------------------------------------------
                | Settings
                |--------------------------------------------------------------------------
                */

                'sort_order' => 2,

                'is_system' => true,


                /*
                |--------------------------------------------------------------------------
                | Status
                |--------------------------------------------------------------------------
                */

                'status' => true,

            ]

        );

    }
}