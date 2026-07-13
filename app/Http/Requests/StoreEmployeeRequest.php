<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            'company_id' => [
                'required',
                'exists:companies,id'
            ],


            'branch_id' => [
                'required',
                'exists:branches,id'
            ],


            'department_id' => [
                'required',
                'exists:departments,id'
            ],


            'designation_id' => [
                'required',
                'exists:designations,id'
            ],


            'name' => [
                'required',
                'string',
                'max:255'
            ],


            'email' => [
                'nullable',
                'email',
                'max:255'
            ],


            'phone' => [
                'nullable',
                'string',
                'max:20'
            ],


            'photo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],


            'gender' => [
                'nullable',
                'in:male,female,other'
            ],


            'date_of_birth' => [
                'nullable',
                'date'
            ],


            'joining_date' => [
                'nullable',
                'date'
            ],


            'address' => [
                'nullable',
                'string'
            ],


            'status' => [
                'required',
                'boolean'
            ],

        ];
    }
}