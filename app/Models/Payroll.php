<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{

    protected $fillable = [

        'employee_id',

        'salary_id',

        'month',

        'year',

        'basic_salary',

        'allowance',

        'deduction',

        'net_salary',

        'status',

    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


    public function salary()
    {
        return $this->belongsTo(EmployeeSalary::class);
    }

}