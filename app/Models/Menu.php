<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'icon',
        'route_name',
        'url',
        'menu_type',
        'sort_order',
        'status',
        'created_by',
        'updated_by',
        'permission_name',
    ];

    /**
     * Parent Menu
     */
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    /**
     * Child Menus
     */
   public function children()
{
    return $this->hasMany(Menu::class, 'parent_id')
                ->where('status', 1)
                ->orderBy('sort_order')
                ->with('children');
}

    /**
     * Created By
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Updated By
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
 * Check if this menu is active.
 */
public function isActive(): bool
{
    if (!$this->route_name) {

        return $this->hasActiveChildren();

    }

    return request()->routeIs($this->route_name);
}

/**
 * Check if any child menu is active.
 */
protected function hasActiveChildren(): bool
{
    foreach ($this->children as $child) {

        if ($child->isActive()) {

            return true;

        }

    }

    return false;
}

/**
 * Check if current user can access this menu.
 */
public function canAccess(): bool
{
    if (! auth()->check()) {
        return false;
    }

    if (empty($this->permission_name)) {
        return true;
    }

    return auth()->user()->can($this->permission_name);
}

/**
 * Check if this menu has any visible children.
 */
public function hasVisibleChildren(): bool
{
    foreach ($this->children as $child) {

        if ($child->canAccess()) {
            return true;
        }

        if ($child->hasVisibleChildren()) {
            return true;
        }
    }

    return false;
}


}