<?php

namespace App\Services\Employee;

use App\Models\Employee;

class EmployeeCodeGenerator
{
    public static function generate(): string
    {
        $lastEmployee = Employee::latest('id')->first();


        if (!$lastEmployee) {

            return 'EMP0001';

        }


        $lastNumber = (int) substr(
            $lastEmployee->employee_code,
            3
        );


        return 'EMP' . str_pad(
            $lastNumber + 1,
            4,
            '0',
            STR_PAD_LEFT
        );
    }
}