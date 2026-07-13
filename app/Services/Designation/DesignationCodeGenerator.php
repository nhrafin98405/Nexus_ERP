<?php

namespace App\Services\Designation;

use App\Models\Designation;

class DesignationCodeGenerator
{
    public static function generate(): string
    {
        $lastDesignation = Designation::latest('id')->first();

        if (!$lastDesignation) {
            return 'DES0001';
        }

        $lastNumber = (int) substr($lastDesignation->code, 3);

        return 'DES' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    }
}