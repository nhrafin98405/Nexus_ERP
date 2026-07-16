<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuelSale extends Model
{

    protected $guarded = [];


    public function pump()
    {
        return $this->belongsTo(Pump::class);
    }

}