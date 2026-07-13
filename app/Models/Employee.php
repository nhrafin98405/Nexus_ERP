<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;


    protected $fillable = [

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

}