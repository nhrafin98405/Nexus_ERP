<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
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

            'branch_id' => [
                'required',
                'exists:branches,id',
            ],

            'department_id' => [
                'required',
                'exists:departments,id',
            ],

            'designation_id' => [
                'required',
                'exists:designations,id',
            ],

            /*
            |--------------------------------------------------------------------------
            | Employee
            |--------------------------------------------------------------------------
            */

            'first_name' => [
                'required',
                'string',
                'max:100',
            ],

            'last_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'full_name' => [
                'required',
                'string',
                'max:255',
            ],

            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            /*
            |--------------------------------------------------------------------------
            | Personal
            |--------------------------------------------------------------------------
            */

            'gender' => [
                'required',
                Rule::in([
                    'Male',
                    'Female',
                    'Other',
                ]),
            ],

            'date_of_birth' => [
                'nullable',
                'date',
            ],

            'blood_group' => [
                'nullable',
                'string',
                'max:10',
            ],

            'religion' => [
                'nullable',
                'string',
                'max:100',
            ],

            'marital_status' => [
                'nullable',
                'string',
                'max:50',
            ],

            'nationality' => [
                'nullable',
                'string',
                'max:100',
            ],

            'national_id' => [
                'nullable',
                'string',
                'max:100',
            ],

            'passport_no' => [
                'nullable',
                'string',
                'max:100',
            ],

            'driving_license' => [
                'nullable',
                'string',
                'max:100',
            ],

            /*
            |--------------------------------------------------------------------------
            | Contact
            |--------------------------------------------------------------------------
            */

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'phone' => [
                'required',
                'string',
                'max:20',
            ],

            'alternate_phone' => [
                'nullable',
                'string',
                'max:20',
            ],

            /*
            |--------------------------------------------------------------------------
            | Address
            |--------------------------------------------------------------------------
            */

            'present_address' => [
                'nullable',
                'string',
            ],

            'permanent_address' => [
                'nullable',
                'string',
            ],

            'city' => [
                'nullable',
                'string',
                'max:100',
            ],

            'state' => [
                'nullable',
                'string',
                'max:100',
            ],

            'country' => [
                'nullable',
                'string',
                'max:100',
            ],

            'postal_code' => [
                'nullable',
                'string',
                'max:20',
            ],

            /*
            |--------------------------------------------------------------------------
            | Employment
            |--------------------------------------------------------------------------
            */

            'joining_date' => [
                'required',
                'date',
            ],

            'confirmation_date' => [
                'nullable',
                'date',
            ],

            'resignation_date' => [
                'nullable',
                'date',
            ],

            'leaving_date' => [
                'nullable',
                'date',
            ],

            'employment_type' => [
                'required',
                Rule::in([
                    'Permanent',
                    'Probation',
                    'Contract',
                    'Part Time',
                    'Intern',
                ]),
            ],

            'employment_status' => [
                'required',
                Rule::in([
                    'Active',
                    'Inactive',
                    'Resigned',
                    'Terminated',
                ]),
            ],

            'reporting_manager_id' => [
                'nullable',
                'exists:employees,id',
            ],

            'shift_id' => [
                'nullable',
                'integer',
            ],

            /*
            |--------------------------------------------------------------------------
            | Salary
            |--------------------------------------------------------------------------
            */

            'basic_salary' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'hourly_rate' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'overtime_rate' => [
                'nullable',
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
}