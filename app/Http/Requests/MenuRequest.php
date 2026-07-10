<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [

            'parent_id' => 'nullable|exists:menus,id',

            'name' => 'required|string|max:255',

            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('menus')->ignore($this->menu),
            ],

            'icon' => 'nullable|string|max:255',

            'route_name' => 'nullable|string|max:255',

            'permission_name' => 'nullable|string|max:255',

            'url' => 'nullable|string|max:255',

            'menu_type' => 'required|in:sidebar,topbar',

            'sort_order' => 'nullable|integer|min:0',

            'status' => 'required|boolean',
            'parent_id' => [
    'nullable',
    'exists:menus,id',
],

        ];
    }
}