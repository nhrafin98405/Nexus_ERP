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
        $branch = Branch::first();

        if (!$branch) {
            return;
        }

        Department::firstOrCreate(
            ['code' => 'DEP0001'],
            [
                'branch_id'   => $branch->id,
                'name'        => 'Human Resource',
                'email'       => 'hr@nexuserp.com',
                'phone'       => '01711111111',
                'description' => 'Handles employee management and HR operations.',
                'status'      => true,
            ]
        );

        Department::firstOrCreate(
            ['code' => 'DEP0002'],
            [
                'branch_id'   => $branch->id,
                'name'        => 'Accounts',
                'email'       => 'accounts@nexuserp.com',
                'phone'       => '01722222222',
                'description' => 'Handles finance and accounting.',
                'status'      => true,
            ]
        );
    }
}