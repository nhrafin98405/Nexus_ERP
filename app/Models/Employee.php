<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
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
        'designation_id',

        /*
        |--------------------------------------------------------------------------
        | Employee Identity
        |--------------------------------------------------------------------------
        */

        'employee_code',

        'first_name',
        'last_name',
        'full_name',
        'photo',

        /*
        |--------------------------------------------------------------------------
        | Personal Information
        |--------------------------------------------------------------------------
        */

        'gender',
        'date_of_birth',
        'blood_group',
        'religion',
        'marital_status',
        'nationality',
        'national_id',
        'passport_no',
        'driving_license',

        /*
        |--------------------------------------------------------------------------
        | Contact
        |--------------------------------------------------------------------------
        */

        'email',
        'phone',
        'alternate_phone',

        /*
        |--------------------------------------------------------------------------
        | Address
        |--------------------------------------------------------------------------
        */

        'present_address',
        'permanent_address',
        'city',
        'state',
        'country',
        'postal_code',

        /*
        |--------------------------------------------------------------------------
        | Employment
        |--------------------------------------------------------------------------
        */

        'joining_date',
        'confirmation_date',
        'resignation_date',
        'leaving_date',

        'employment_type',
        'employment_status',

        'reporting_manager_id',
        'shift_id',

        /*
        |--------------------------------------------------------------------------
        | Salary
        |--------------------------------------------------------------------------
        */

        'basic_salary',
        'hourly_rate',
        'overtime_rate',

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

        /*
        |--------------------------------------------------------------------------
        | Dates
        |--------------------------------------------------------------------------
        */

        'date_of_birth'      => 'date',
        'joining_date'       => 'date',
        'confirmation_date'  => 'date',
        'resignation_date'   => 'date',
        'leaving_date'       => 'date',

        /*
        |--------------------------------------------------------------------------
        | Numbers
        |--------------------------------------------------------------------------
        */

        'basic_salary'  => 'decimal:2',
        'hourly_rate'   => 'decimal:2',
        'overtime_rate' => 'decimal:2',

        /*
        |--------------------------------------------------------------------------
        | Boolean
        |--------------------------------------------------------------------------
        */

        'status'    => 'boolean',
        'is_system' => 'boolean',

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
                ->orderBy('full_name');

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

    public function scopeDesignation($query, $designationId)
    {
        return $query->where(
            'designation_id',
            $designationId
        );
    }

    public function scopeEmploymentStatus($query, string $status)
    {
        return $query->where(
            'employment_status',
            $status
        );
    }

    public function scopeEmploymentType($query, string $type)
    {
        return $query->where(
            'employment_type',
            $type
        );
    }
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
    | Branch
    |--------------------------------------------------------------------------
    */

    public function branch(): BelongsTo
    {
        return $this->belongsTo(
            Branch::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Department
    |--------------------------------------------------------------------------
    */

    public function department(): BelongsTo
    {
        return $this->belongsTo(
            Department::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Designation
    |--------------------------------------------------------------------------
    */

    public function designation(): BelongsTo
    {
        return $this->belongsTo(
            Designation::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Reporting Manager
    |--------------------------------------------------------------------------
    */

    public function reportingManager(): BelongsTo
    {
        return $this->belongsTo(
            self::class,
            'reporting_manager_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Subordinates
    |--------------------------------------------------------------------------
    */

    public function subordinates(): HasMany
    {
        return $this->hasMany(
            self::class,
            'reporting_manager_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Creator
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
    | Updater
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

    public function getFullNameWithCodeAttribute(): string
    {
        return $this->employee_code . ' - ' . $this->full_name;
    }

    public function getEmployeePhotoAttribute(): string
    {
        return $this->photo
            ? asset('storage/' . $this->photo)
            : asset('assets/images/default-user.png');
    }

    public function getManagerNameAttribute(): string
    {
        return $this->reportingManager?->full_name ?? '-';
    }

    public function getDepartmentNameAttribute(): string
    {
        return $this->department?->name ?? '-';
    }

    public function getDesignationNameAttribute(): string
    {
        return $this->designation?->name ?? '-';
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function canDelete(): bool
    {
        return !$this->is_system;
    }
    
}