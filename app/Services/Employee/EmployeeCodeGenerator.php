<?php

namespace App\Services\Employee;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeCodeGenerator
{

    /**
     * Generate Employee Code
     *
     * Format:
     * EMP0001
     * EMP0002
     */

    public static function generate(): string
    {

        return DB::transaction(function () {


            $lastEmployee = Employee::withTrashed()

                ->lockForUpdate()

                ->orderByDesc('id')

                ->first();


            if (!$lastEmployee) {

                return 'EMP0001';

            }


            $lastNumber = (int) str_replace(

                'EMP',

                '',

                $lastEmployee->employee_code

            );


            return 'EMP' . str_pad(

                $lastNumber + 1,

                4,

                '0',

                STR_PAD_LEFT

            );


        });

    }

}