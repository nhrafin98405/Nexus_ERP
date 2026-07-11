<?php

namespace App\Services\Company;

use App\Models\Company;

class CompanyCodeGenerator
{
    public static function generate(): string
    {
        $lastCompany = Company::latest('id')->first();

        $nextId = $lastCompany ? $lastCompany->id + 1 : 1;

        return 'CMP-' . str_pad($nextId, 5, '0', STR_PAD_LEFT);
    }
}