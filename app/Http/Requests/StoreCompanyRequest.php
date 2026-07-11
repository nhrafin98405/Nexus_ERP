<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'name'            => 'required|string|max:255',
            'email'           => 'nullable|email|max:255',
            'phone'           => 'nullable|string|max:20',
            'website'         => 'nullable|string|max:255',
            'trade_license'   => 'nullable|string|max:100',
            'bin'             => 'nullable|string|max:100',
            'tin'             => 'nullable|string|max:100',
            'logo'            => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'address'         => 'nullable|string',
            'status'          => 'required|boolean',
        ];
    }
}
