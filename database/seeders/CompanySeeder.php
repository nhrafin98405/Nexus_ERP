<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Services\Company\CompanyCodeGenerator;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::create([
            'name' => 'Nexus Technologies Ltd',
            'code' => CompanyCodeGenerator::generate(),

            'email' => 'info@nexustechnologies.com',
            'phone' => '01700000001',
            'website' => 'https://nexustechnologies.com',

            'trade_license' => 'TL-10001',
            'bin' => '000123456-001',
            'tin' => '123456789',

            'address' => 'Dhaka, Bangladesh',

            'status' => true,
        ]);


        Company::create([
            'name' => 'ABC Trading Ltd',
            'code' => CompanyCodeGenerator::generate(),

            'email' => 'info@abctrading.com',
            'phone' => '01700000002',
            'website' => 'https://abctrading.com',

            'trade_license' => 'TL-10002',
            'bin' => '000123456-002',
            'tin' => '987654321',

            'address' => 'Chittagong, Bangladesh',

            'status' => true,
        ]);


        Company::create([
            'name' => 'Demo Company Ltd',
            'code' => CompanyCodeGenerator::generate(),

            'email' => 'demo@company.com',
            'phone' => '01700000003',

            'trade_license' => 'TL-10003',
            'bin' => null,
            'tin' => null,

            'address' => 'Rajshahi, Bangladesh',

            'status' => false,
        ]);
    }
}