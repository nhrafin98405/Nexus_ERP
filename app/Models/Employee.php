<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;


protected $fillable = [

    'user_id',

    'company_id',
    'branch_id',
    'department_id',
    'designation_id',

    'employee_code',

    'name',
    'email',
    'phone',
    'photo',

    'gender',
    'date_of_birth',
    'joining_date',

    'address',

    'status',

];



    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */


    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }


    public function department()
    {
        return $this->belongsTo(Department::class);
    }


    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function salary()
{
    return $this->hasOne(EmployeeSalary::class);
}

public function salaries()
{
    return $this->hasMany(EmployeeSalary::class);
}


public function payrolls()
{
    return $this->hasMany(Payroll::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}

}