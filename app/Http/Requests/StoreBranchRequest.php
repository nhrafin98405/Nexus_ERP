<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'company_id' => 'required|exists:companies,id',

            'name' => 'required|string|max:255',

            'email' => 'nullable|email|max:255',

            'phone' => 'nullable|string|max:20',

            'website' => 'nullable|string|max:255',

            'logo' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'address' => 'nullable|string',

            'status' => 'required|boolean',

        ];
    }
}