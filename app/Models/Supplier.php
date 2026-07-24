<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Supplier extends Model
{
    use SoftDeletes;

    protected $fillable = [

        /*
        |--------------------------------------------------------------------------
        | Organization
        |--------------------------------------------------------------------------
        */

        'company_id',
        'pump_id',

        /*
        |--------------------------------------------------------------------------
        | Supplier Information
        |--------------------------------------------------------------------------
        */

        'name',
        'code',
        'contact_person',
        'phone',
        'email',
        'trade_license',
        'tin',
        'address',

        /*
        |--------------------------------------------------------------------------
        | Accounts
        |--------------------------------------------------------------------------
        */

        'opening_balance',
        'balance_type',

        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        'status',

        /*
        |--------------------------------------------------------------------------
        | Audit
        |--------------------------------------------------------------------------
        */

        'created_by',
        'updated_by',

    ];



    protected $casts = [

        'opening_balance' => 'decimal:2',

        'status' => 'boolean',

    ];



    /*
    |--------------------------------------------------------------------------
    | Company
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
    | Pump
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
    | Created By
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
    | Updated By
    |--------------------------------------------------------------------------
    */

    public function updater(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'updated_by'
        );
    }



    /*
|--------------------------------------------------------------------------
| Fuel Purchases
|--------------------------------------------------------------------------
*/

public function fuelPurchases(): HasMany
{
    return $this->hasMany(
        FuelPurchase::class
    );
}
}