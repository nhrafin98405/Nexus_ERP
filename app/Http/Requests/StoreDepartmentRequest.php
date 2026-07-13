<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
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

            'branch_id' => 'required|exists:branches,id',

            'name' => 'required|string|max:255',

            'email' => 'nullable|email|max:255',

            'phone' => 'nullable|string|max:20',

            'description' => 'nullable|string',

            'status' => 'required|boolean',

        ];
    }
}