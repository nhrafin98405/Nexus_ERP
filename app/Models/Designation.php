<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Designation extends Model
{
    use SoftDeletes;


    protected $fillable = [

        /*
        |--------------------------------------------------------------------------
        | Organization
        |--------------------------------------------------------------------------
        */

        'company_id',
        'branch_id',
        'department_id',


        /*
        |--------------------------------------------------------------------------
        | Designation Information
        |--------------------------------------------------------------------------
        */

        'name',
        'code',
        'level',

        'email',
        'phone',

        'description',


        /*
        |--------------------------------------------------------------------------
        | Settings
        |--------------------------------------------------------------------------
        */

        'sort_order',

        'is_system',


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

        'status'     => 'boolean',

        'is_system'  => 'boolean',

    ];



    /*
    |--------------------------------------------------------------------------
    | Boot
    |--------------------------------------------------------------------------
    */


    protected static function booted(): void
    {

        static::addGlobalScope('ordered', function (Builder $builder) {

            $builder

                ->orderBy('sort_order')

                ->orderBy('level')

                ->orderBy('name');

        });


    }




    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */


    public function scopeActive($query)
    {

        return $query->where(
            'status',
            true
        );

    }



    public function scopeInactive($query)
    {

        return $query->where(
            'status',
            false
        );

    }



    public function scopeCompany($query, $companyId)
    {

        return $query->where(
            'company_id',
            $companyId
        );

    }



    public function scopeBranch($query, $branchId)
    {

        return $query->where(
            'branch_id',
            $branchId
        );

    }



    public function scopeDepartment($query, $departmentId)
    {

        return $query->where(
            'department_id',
            $departmentId
        );

    }




    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */


    public function company(): BelongsTo
    {

        return $this->belongsTo(
            Company::class
        );

    }




    public function branch(): BelongsTo
    {

        return $this->belongsTo(
            Branch::class
        );

    }




    public function department(): BelongsTo
    {

        return $this->belongsTo(
            Department::class
        );

    }





    public function employees(): HasMany
    {

        return $this->hasMany(
            Employee::class
        );

    }





    public function creator(): BelongsTo
    {

        return $this->belongsTo(
            User::class,
            'created_by'
        );

    }





    public function updater(): BelongsTo
    {

        return $this->belongsTo(
            User::class,
            'updated_by'
        );

    }







    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */


    public function getStatusBadgeAttribute(): string
    {

        return $this->status
            ? 'success'
            : 'danger';

    }





    public function getStatusTextAttribute(): string
    {

        return $this->status
            ? 'Active'
            : 'Inactive';

    }





    public function getEmployeeCountAttribute(): int
    {

        return $this
            ->employees()
            ->count();

    }






    public function getLevelNameAttribute(): string
    {

        return match($this->level)

        {

            1 => 'Owner',

            2 => 'Admin',

            3 => 'Manager',

            4 => 'Assistant Manager',

            5 => 'Supervisor',

            6 => 'Operator',

            7 => 'Staff',

            8 => 'Cleaner',

            9 => 'Security',

            10 => 'Driver',

            default => 'Unknown',

        };

    }





    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */


    public function canDelete(): bool
    {

        return

            !$this->is_system &&

            !$this->employees()->exists();

    }



}