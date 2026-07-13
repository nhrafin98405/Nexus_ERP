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
        $department = Department::first();

        if (!$department) {
            return;
        }

        Designation::firstOrCreate(
            ['code' => 'DES0001'],
            [
                'department_id' => $department->id,
                'name'          => 'HR Manager',
                'email'         => 'hrmanager@nexuserp.com',
                'phone'         => '01811111111',
                'description'   => 'Head of Human Resource Department.',
                'status'        => true,
            ]
        );

        Designation::firstOrCreate(
            ['code' => 'DES0002'],
            [
                'department_id' => $department->id,
                'name'          => 'HR Executive',
                'email'         => 'hrexecutive@nexuserp.com',
                'phone'         => '01822222222',
                'description'   => 'Responsible for HR operations.',
                'status'        => true,
            ]
        );
    }
}