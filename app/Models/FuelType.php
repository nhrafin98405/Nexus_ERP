<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Company;
use App\Models\Pump;
use App\Models\User;


class FuelType extends Model
{

    use SoftDeletes;



    protected $fillable = [


        // Organization

        'company_id',

        'pump_id',



        // Basic Information

        'name',

        'code',

        'short_name',

        'color',

        'description',



        // Pricing

        'purchase_price',

        'selling_price',



        // Status

        'status',



        // Audit

        'created_by',

        'updated_by',

    ];




    protected $casts = [


        'purchase_price' => 'decimal:2',

        'selling_price' => 'decimal:2',

        'status' => 'boolean',


    ];




    /*
    |--------------------------------------------------------------------------
    | Company Relation
    |--------------------------------------------------------------------------
    */

    public function company(): BelongsTo
    {

        return $this->belongsTo(
            Company::class
        );
    }





    /*
    |--------------------------------------------------------------------------
    | Pump Relation
    |--------------------------------------------------------------------------
    */

    public function pump(): BelongsTo
    {

        return $this->belongsTo(
            Pump::class
        );
    }

    /*
|--------------------------------------------------------------------------
| Fuel Type Has Many Nozzles
|--------------------------------------------------------------------------
*/

    public function nozzles()
    {
        return $this->hasMany(
            Nozzle::class
        );
    }





    /*
    |--------------------------------------------------------------------------
    | Created By User
    |--------------------------------------------------------------------------
    */

    public function creator(): BelongsTo
    {

        return $this->belongsTo(
            User::class,
            'created_by'
        );
    }





    /*
    |--------------------------------------------------------------------------
    | Updated By User
    |--------------------------------------------------------------------------
    */

    public function updater(): BelongsTo
    {

        return $this->belongsTo(
            User::class,
            'updated_by'
        );
    }
    public function fuelSales()
    {
        return $this->hasMany(FuelSale::class);
    }
}
