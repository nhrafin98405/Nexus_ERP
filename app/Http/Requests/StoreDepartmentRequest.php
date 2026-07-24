<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepartmentRequest extends FormRequest
{
    /**
     * Authorize Request
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules
     */
    public function rules(): array
    {
        return [

            /*
            |--------------------------------------------------------------------------
            | Organization
            |--------------------------------------------------------------------------
            */

            'branch_id' => [
                'required',
                'exists:branches,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | Department
            |--------------------------------------------------------------------------
            */

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:20',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            /*
            |--------------------------------------------------------------------------
            | Settings
            |--------------------------------------------------------------------------
            */

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'is_system' => [
                'nullable',
                'boolean',
            ],

            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */

            'status' => [
                'required',
                'boolean',
            ],

        ];
    }

    /**
     * Validation Messages
     */
    public function messages(): array
    {
        return [

            'branch_id.required' => 'Please select a branch.',
            'branch_id.exists'   => 'Selected branch is invalid.',

            'name.required'      => 'Department name is required.',
            'name.max'           => 'Department name may not exceed 255 characters.',

            'email.email'        => 'Please enter a valid email address.',

            'phone.max'          => 'Phone number may not exceed 20 characters.',

            'description.max'    => 'Description may not exceed 1000 characters.',

            'status.required'    => 'Please select department status.',

        ];
    }

    /**
     * Prepare Data
     */
    protected function prepareForValidation(): void
    {
        $this->merge([

            'name' => trim((string) $this->name),

            'email' => $this->email
                ? strtolower(trim($this->email))
                : null,

            'phone' => $this->phone
                ? trim($this->phone)
                : null,

        ]);
    }
}