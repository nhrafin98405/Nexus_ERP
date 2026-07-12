<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    protected $fillable = [
    'name',
    'code',
    'email',
    'phone',
    'website',
    'trade_license',
    'bin',
    'tin',
    'logo',
    'address',
    'status',
];
use SoftDeletes;
public function branches()
{
    return $this->hasMany(Branch::class);
}
}


