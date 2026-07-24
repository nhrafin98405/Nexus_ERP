<?php

namespace App\Http\Requests\SuperAdmin\Settings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFuelTypeRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }



    public function rules(): array
    {


        $fuelType = $this->route('fuel_type');

        $fuelTypeId = $fuelType ? $fuelType->id : null;



        return [


            /*
            |--------------------------------------------------------------------------
            | Organization
            |--------------------------------------------------------------------------
            */

            'company_id' => [

                'nullable',
                'exists:companies,id'

            ],


            'pump_id' => [

                'nullable',
                'exists:pumps,id'

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

                Rule::unique('fuel_types','name')
                    ->ignore($fuelTypeId),

            ],



            'code' => [

                'required',

                'string',

                'max:20',

                Rule::unique('fuel_types','code')
                    ->ignore($fuelTypeId),

            ],



            'short_name' => [

                'nullable',

                'string',

                'max:20',

            ],



            'color' => [

                'nullable',

                'string',

                'max:20',

            ],



            'description' => [

                'nullable',

                'string',

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





    public function messages(): array
    {

        return [


            'name.required'
                => 'Fuel Type Name is required.',


            'name.unique'
                => 'Fuel Type already exists.',



            'code.required'
                => 'Fuel Code is required.',


            'code.unique'
                => 'Fuel Code already exists.',



            'purchase_price.required'
                => 'Purchase Price is required.',



            'selling_price.required'
                => 'Selling Price is required.',



        ];

    }

}