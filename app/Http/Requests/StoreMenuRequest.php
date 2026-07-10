<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'parent_id'  => 'nullable|exists:menus,id',
            'name'       => 'required|string|max:255',
            'slug'       => 'nullable|string|max:255|unique:menus,slug',
            'icon'       => 'nullable|string|max:255',
            'route_name' => 'nullable|string|max:255',
            'url'        => 'nullable|string|max:255',
            'menu_type'  => 'required|in:group,menu,submenu',
            'sort_order' => 'required|integer|min:0',
            'status'     => 'required|boolean',
        ];
    }
}