<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Employee;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Designation;


class EmployeeSeeder extends Seeder
{

    /**
     * Run Database Seeder
     */
    public function run(): void
    {


        /*
        |--------------------------------------------------------------------------
        | Get Organization Data
        |--------------------------------------------------------------------------
        */


        $company = Company::first();


        $branch = Branch::first();


        $department = Department::first();


        $designation = Designation::first();



        if (
            !$company ||
            !$branch ||
            !$department ||
            !$designation
        ) {

            return;

        }



        /*
        |--------------------------------------------------------------------------
        | Manager
        |--------------------------------------------------------------------------
        */


        $manager = Employee::firstOrCreate(

            [
                'employee_code' => 'EMP0001'
            ],


            [

                'company_id' =>
                    $company->id,


                'branch_id' =>
                    $branch->id,


                'department_id' =>
                    $department->id,


                'designation_id' =>
                    $designation->id,


                'first_name' =>
                    'Rahim',


                'last_name' =>
                    'Ahmed',


                'full_name' =>
                    'Rahim Ahmed',


                'gender' =>
                    'Male',


                'date_of_birth' =>
                    '1990-01-10',


                'email' =>
                    'rahim@nexuserp.com',


                'phone' =>
                    '01710000001',


                'present_address' =>
                    'Dhaka Bangladesh',


                'joining_date' =>
                    now(),


                'employment_type' =>
                    'Permanent',


                'employment_status' =>
                    'Active',


                'basic_salary' =>
                    50000,


                'status' =>
                    true,


                'is_system' =>
                    true,

            ]

        );





        /*
        |--------------------------------------------------------------------------
        | Employee
        |--------------------------------------------------------------------------
        */


        Employee::firstOrCreate(

            [

                'employee_code' =>
                    'EMP0002'

            ],


            [

                'company_id' =>
                    $company->id,


                'branch_id' =>
                    $branch->id,


                'department_id' =>
                    $department->id,


                'designation_id' =>
                    $designation->id,


                'first_name' =>
                    'Karim',


                'last_name' =>
                    'Hasan',


                'full_name' =>
                    'Karim Hasan',


                'gender' =>
                    'Male',


                'date_of_birth' =>
                    '1995-05-15',


                'email' =>
                    'karim@nexuserp.com',


                'phone' =>
                    '01710000002',


                'present_address' =>
                    'Dhaka Bangladesh',


                'joining_date' =>
                    now(),


                'employment_type' =>
                    'Permanent',


                'employment_status' =>
                    'Active',


                'reporting_manager_id' =>
                    $manager->id,


                'basic_salary' =>
                    30000,


                'status' =>
                    true,


                'is_system' =>
                    false,

            ]

        );



    }

}