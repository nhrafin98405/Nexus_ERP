<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{

    protected $fillable = [

        'employee_id',

        'basic_salary',
        'house_rent',
        'medical_allowance',
        'transport_allowance',
        'other_allowance',

        'deduction',

        'net_salary',

        'effective_date',

        'status',

    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}