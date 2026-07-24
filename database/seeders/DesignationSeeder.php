<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Designation;
use App\Models\Department;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $department = Department::with([
            'company',
            'branch'
        ])->first();


        if (!$department) {

            return;

        }




        Designation::firstOrCreate(

            [
                'code' => 'DES0001'
            ],

            [

                /*
                |--------------------------------------------------------------------------
                | Organization
                |--------------------------------------------------------------------------
                */

                'company_id' => $department->company_id,

                'branch_id' => $department->branch_id,

                'department_id' => $department->id,


                /*
                |--------------------------------------------------------------------------
                | Designation
                |--------------------------------------------------------------------------
                */

                'name' => 'HR Manager',

                'level' => 3,


                'email' => 'hrmanager@nexuserp.com',

                'phone' => '01811111111',

                'description' => 'Head of Human Resource Department.',



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






        Designation::firstOrCreate(

            [
                'code' => 'DES0002'
            ],

            [

                /*
                |--------------------------------------------------------------------------
                | Organization
                |--------------------------------------------------------------------------
                */

                'company_id' => $department->company_id,

                'branch_id' => $department->branch_id,

                'department_id' => $department->id,



                /*
                |--------------------------------------------------------------------------
                | Designation
                |--------------------------------------------------------------------------
                */

                'name' => 'HR Executive',

                'level' => 5,


                'email' => 'hrexecutive@nexuserp.com',

                'phone' => '01822222222',

                'description' => 'Responsible for HR operations.',



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