<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;

    protected $fillable = [

        /*
        |--------------------------------------------------------------------------
        | Parent
        |--------------------------------------------------------------------------
        */

        'parent_id',

        /*
        |--------------------------------------------------------------------------
        | Basic
        |--------------------------------------------------------------------------
        */

        'name',
        'slug',
        'title',
        'description',

        /*
        |--------------------------------------------------------------------------
        | UI
        |--------------------------------------------------------------------------
        */

        'icon',
        'badge',
        'badge_color',

        /*
        |--------------------------------------------------------------------------
        | Navigation
        |--------------------------------------------------------------------------
        */

        'route_name',
        'url',
        'target',

        /*
        |--------------------------------------------------------------------------
        | ERP
        |--------------------------------------------------------------------------
        */

        'industry',
        'module',
        'menu_group',

        /*
        |--------------------------------------------------------------------------
        | Permission
        |--------------------------------------------------------------------------
        */

        'permission_name',
        'role_name',

        /*
        |--------------------------------------------------------------------------
        | Menu
        |--------------------------------------------------------------------------
        */

        'menu_type',
        'sort_order',

       /*
|--------------------------------------------------------------------------
| Status
|--------------------------------------------------------------------------
*/

'is_visible',
'is_system',
'is_default',
'is_external',
'coming_soon',
'status',
        /*
        |--------------------------------------------------------------------------
        | Audit
        |--------------------------------------------------------------------------
        */

        'created_by',
        'updated_by',

    ];



    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }


    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')
            ->where('status', 1)
            ->where('is_visible', 1)
            ->orderBy('sort_order')
            ->with('children');
    }


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }



    /*
    |--------------------------------------------------------------------------
    | Menu State
    |--------------------------------------------------------------------------
    */

    public function isActive(): bool
    {
        if (!empty($this->route_name)) {

            if (request()->routeIs($this->route_name)) {
                return true;
            }
        }

        return $this->hasActiveChildren();
    }


    protected function hasActiveChildren(): bool
    {
        foreach ($this->children as $child) {

            if ($child->isActive()) {
                return true;
            }
        }

        return false;
    }



    /*
    |--------------------------------------------------------------------------
    | Permission
    |--------------------------------------------------------------------------
    */

    public function canAccess(): bool
    {
        if (!auth()->check()) {
            return false;
        }

        // Super Admin sees everything
        if (auth()->user()->hasRole('Super Admin')) {
            return true;
        }

        // No permission required
        if (empty($this->permission_name)) {
            return true;
        }

        return auth()->user()->can($this->permission_name);
    }



    /*
    |--------------------------------------------------------------------------
    | Visibility
    |--------------------------------------------------------------------------
    */

    public function isVisible(): bool
    {
        return $this->status &&
               $this->is_visible;
    }


    public function hasVisibleChildren(): bool
    {
        foreach ($this->children as $child) {

            if (
                $child->isVisible() &&
                $child->canAccess()
            ) {
                return true;
            }

            if ($child->hasVisibleChildren()) {
                return true;
            }
        }

        return false;
    }



    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function isExternal(): bool
    {
        return (bool) $this->is_external;
    }


    public function hasRoute(): bool
    {
        return !empty($this->route_name);
    }


    public function getLink(): string
    {
        if ($this->is_external && $this->url) {
            return $this->url;
        }

        if ($this->route_name && \Route::has($this->route_name)) {
            return route($this->route_name);
        }

        return '#';
    }
    /*
|--------------------------------------------------------------------------
| Helpers
|--------------------------------------------------------------------------
*/

public function isExternal(): bool
{
    return (bool) $this->is_external;
}

public function hasRoute(): bool
{
    return ! empty($this->route_name);
}

public function getLink(): string
{
    if ($this->is_external && $this->url) {
        return $this->url;
    }

    if ($this->route_name && \Route::has($this->route_name)) {
        return route($this->route_name);
    }

    return '#';
}

public function isComingSoon()
{
    return (bool) $this->coming_soon;
}

public function canOpen(): bool
{
    return ! $this->coming_soon;
}

public function hasIcon(): bool
{
    return ! empty($this->icon);
}

public function showBadge(): bool
{
    return ! empty($this->badge);
}

public function getBadgeColor(): string
{
    return $this->badge_color ?: 'primary';
}
}