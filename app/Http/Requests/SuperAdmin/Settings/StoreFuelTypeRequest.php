<?php

namespace App\Http\Requests\SuperAdmin\Settings;

use Illuminate\Foundation\Http\FormRequest;

class StoreFuelTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
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

            'company_id' => [
                'nullable',
                'exists:companies,id',
            ],

            'pump_id' => [
                'nullable',
                'exists:pumps,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | Basic Information
            |--------------------------------------------------------------------------
            */

            'name' => [
                'required',
                'string',
                'max:100',
                'unique:fuel_types,name',
            ],

            'code' => [
                'required',
                'string',
                'max:10',
                'unique:fuel_types,code',
            ],

            'short_name' => [
                'nullable',
                'string',
                'max:10',
            ],

            'color' => [
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
            | Pricing
            |--------------------------------------------------------------------------
            */

            'purchase_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'selling_price' => [
                'required',
                'numeric',
                'min:0',
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
     * Custom Validation Messages
     */
    public function messages(): array
    {
        return [

            'company_id.exists' => 'Selected company is invalid.',

            'pump_id.exists' => 'Selected pump is invalid.',

            'name.required' => 'Fuel Type Name is required.',
            'name.unique' => 'Fuel Type already exists.',

            'code.required' => 'Fuel Code is required.',
            'code.unique' => 'Fuel Code already exists.',

            'purchase_price.required' => 'Purchase Price is required.',
            'purchase_price.numeric' => 'Purchase Price must be numeric.',

            'selling_price.required' => 'Selling Price is required.',
            'selling_price.numeric' => 'Selling Price must be numeric.',

        ];
    }
}