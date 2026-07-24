<?php

namespace App\Services\Department;

use App\Models\Department;

class DepartmentCodeGenerator
{
    /**
     * Generate Unique Department Code
     */
    public static function generate(): string
    {
        $prefix = 'DEP';

        $lastDepartment = Department::withoutGlobalScopes()
            ->latest('id')
            ->first();

        if (!$lastDepartment) {
            return $prefix . '0001';
        }

        $lastCode = $lastDepartment->code;

        $number = (int) str_replace($prefix, '', $lastCode);

        return $prefix . str_pad(
            $number + 1,
            4,
            '0',
            STR_PAD_LEFT
        );
    }
}