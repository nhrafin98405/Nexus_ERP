<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'parent_id' => 'nullable|exists:menus,id',

            'name' => 'required|string|max:255',

            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('menus', 'slug')->ignore($this->route('menu')),
            ],

            'icon' => 'nullable|string|max:255',

            'route_name' => 'nullable|string|max:255',

            'url' => 'nullable|string|max:255',

            'menu_type' => 'required|in:group,menu,submenu',

            'sort_order' => 'required|integer|min:0',

            'status' => 'required|boolean',
        ];
    }
}