<?php

namespace App\Services\Department;

use App\Models\Department;

class DepartmentCodeGenerator
{
    public static function generate(): string
    {
        $lastDepartment = Department::latest('id')->first();

        if (!$lastDepartment) {
            return 'DEP0001';
        }

        $lastNumber = (int) substr($lastDepartment->code, 3);

        return 'DEP' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    }
}