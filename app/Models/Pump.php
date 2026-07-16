<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pump extends Model
{
    protected $fillable = [
        'name',
        'code',
        'owner_name',
        'phone',
        'email',
        'address',
        'status',
    ];


    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */


    // One Pump has many Tanks
    public function tanks()
    {
        return $this->hasMany(Tank::class);
    }



    // One Pump has many Employees
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }



    // One Pump has many Fuel Sales
    public function fuelSales()
    {
        return $this->hasMany(FuelSale::class);
    }

}