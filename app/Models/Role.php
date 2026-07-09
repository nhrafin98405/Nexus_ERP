<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $fillable = [
        'name',
        'guard_name',
        'slug',
        'description',
        'status',
        'is_system',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'status' => 'boolean',
        'is_system' => 'boolean',
    ];


    /**
     * Created By User
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    /**
     * Updated By User
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }


    /**
     * Active Roles
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', true);
    }


    /**
     * System Roles
     */
    public function scopeSystem(Builder $query): Builder
    {
        return $query->where('is_system', true);
    }


    /**
     * Custom Roles
     */
    public function scopeCustom(Builder $query): Builder
    {
        return $query->where('is_system', false);
    }


    /**
     * Check System Role
     */
    public function isSystem(): bool
    {
        return $this->is_system === true;
    }
}