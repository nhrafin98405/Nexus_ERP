<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;
use App\Models\Company;
use App\Models\Pump;
use App\Models\User;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::first();
        $pump    = Pump::first();
        $user    = User::first();

        $suppliers = [

            [

                'company_id'      => $company?->id,
                'pump_id'         => $pump?->id,

                'name'            => 'Padma Oil Company Ltd.',
                'code'            => 'SUP-001',

                'contact_person'  => 'Abdul Karim',

                'phone'           => '01711000001',
                'email'           => 'padma@example.com',

                'trade_license'   => 'TL-100001',
                'tin'             => 'TIN-100001',

                'address'         => 'Chattogram, Bangladesh',

                'opening_balance' => 500000,
                'balance_type'    => 'Payable',

                'status'          => true,

                'created_by'      => $user?->id,

            ],

            [

                'company_id'      => $company?->id,
                'pump_id'         => $pump?->id,

                'name'            => 'Jamuna Oil Company Ltd.',
                'code'            => 'SUP-002',

                'contact_person'  => 'Rahim Uddin',

                'phone'           => '01711000002',
                'email'           => 'jamuna@example.com',

                'trade_license'   => 'TL-100002',
                'tin'             => 'TIN-100002',

                'address'         => 'Dhaka, Bangladesh',

                'opening_balance' => 0,
                'balance_type'    => 'Receivable',

                'status'          => true,

                'created_by'      => $user?->id,

            ],

            [

                'company_id'      => $company?->id,
                'pump_id'         => $pump?->id,

                'name'            => 'Meghna Petroleum Ltd.',
                'code'            => 'SUP-003',

                'contact_person'  => 'Nazmul Hasan',

                'phone'           => '01711000003',
                'email'           => 'meghna@example.com',

                'trade_license'   => 'TL-100003',
                'tin'             => 'TIN-100003',

                'address'         => 'Khulna, Bangladesh',

                'opening_balance' => 125000,
                'balance_type'    => 'Payable',

                'status'          => true,

                'created_by'      => $user?->id,

            ],

            [

                'company_id'      => $company?->id,
                'pump_id'         => $pump?->id,

                'name'            => 'Bashundhara Petroleum',
                'code'            => 'SUP-004',

                'contact_person'  => 'Mahmud Alam',

                'phone'           => '01711000004',
                'email'           => 'bashundhara@example.com',

                'trade_license'   => 'TL-100004',
                'tin'             => 'TIN-100004',

                'address'         => 'Rajshahi, Bangladesh',

                'opening_balance' => 25000,
                'balance_type'    => 'Payable',

                'status'          => true,

                'created_by'      => $user?->id,

            ],

            [

                'company_id'      => $company?->id,
                'pump_id'         => $pump?->id,

                'name'            => 'Orion Petroleum',
                'code'            => 'SUP-005',

                'contact_person'  => 'Mizanur Rahman',

                'phone'           => '01711000005',
                'email'           => 'orion@example.com',

                'trade_license'   => 'TL-100005',
                'tin'             => 'TIN-100005',

                'address'         => 'Sylhet, Bangladesh',

                'opening_balance' => 0,
                'balance_type'    => 'Receivable',

                'status'          => true,

                'created_by'      => $user?->id,

            ],

        ];

        foreach ($suppliers as $supplier) {

            Supplier::updateOrCreate(

                [
                    'code' => $supplier['code']
                ],

                $supplier

            );
        }
    }
}