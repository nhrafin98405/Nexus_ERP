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
}