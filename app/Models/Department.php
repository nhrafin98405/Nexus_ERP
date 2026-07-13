<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'branch_id',

        'name',

        'code',

        'email',

        'phone',

        'description',

        'status',

    ];


    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function departments()
{
    return $this->hasMany(Department::class);
}
}