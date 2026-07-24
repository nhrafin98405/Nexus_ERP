<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDesignationRequest extends FormRequest
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
        $designationId = $this->route('designation')?->id;

        return [

            /*
            |--------------------------------------------------------------------------
            | Organization
            |--------------------------------------------------------------------------
            */

            'department_id' => [
                'required',
                'exists:departments,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | Designation
            |--------------------------------------------------------------------------
            */

            'name' => [

                'required',

                'string',

                'max:255',

                Rule::unique('designations')
                    ->where(function ($query) {

                        return $query->where(
                            'department_id',
                            $this->department_id
                        );

                    })
                    ->ignore($designationId),

            ],

            'level' => [
                'required',
                'integer',
                'min:1',
                'max:10',
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
     * Custom Messages
     */
    public function messages(): array
    {
        return [

            'department_id.required' =>
                'Please select a department.',

            'department_id.exists' =>
                'Selected department is invalid.',

            'name.required' =>
                'Designation name is required.',

            'name.unique' =>
                'This designation already exists in the selected department.',

            'level.required' =>
                'Please enter designation level.',

            'level.min' =>
                'Level must be at least 1.',

            'level.max' =>
                'Level cannot be greater than 10.',

        ];
    }
}