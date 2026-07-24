@extends('layouts.super-admin')

@section('title','Create Fuel Type')

@section('content')


<h6 class="mb-0 text-uppercase">
    Create Fuel Type
</h6>

<hr>



<div class="card">


    <div class="card-header d-flex justify-content-between align-items-center">


        <h5 class="mb-0">

            Add New Fuel Type

        </h5>



        <a href="{{ route('super-admin.settings.fuel-types.index') }}"
           class="btn btn-light">


            <i class="bx bx-arrow-back"></i>

            Back


        </a>



    </div>





    <div class="card-body">



        <form action="{{ route('super-admin.settings.fuel-types.store') }}"
              method="POST">


            @csrf




            <div class="row">



                {{-- Company --}}

                <div class="col-md-6 mb-3">


                    <label class="form-label">

                        Company

                    </label>


                    <select name="company_id"
                            class="form-select">


                        <option value="">

                            Select Company

                        </option>



                        @foreach($companies as $company)


                            <option value="{{ $company->id }}"
                                {{ old('company_id')==$company->id ? 'selected':'' }}>


                                {{ $company->name }}


                            </option>


                        @endforeach



                    </select>


                </div>





                {{-- Pump --}}

                <div class="col-md-6 mb-3">


                    <label class="form-label">

                        Pump

                    </label>


                    <select name="pump_id"
                            class="form-select">


                        <option value="">

                            Select Pump

                        </option>



                        @foreach($pumps as $pump)


                            <option value="{{ $pump->id }}"
                                {{ old('pump_id')==$pump->id ? 'selected':'' }}>


                                {{ $pump->name }}


                            </option>


                        @endforeach



                    </select>


                </div>







                {{-- Name --}}

                <div class="col-md-6 mb-3">


                    <label class="form-label">

                        Fuel Name

                    </label>


                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}"
                           placeholder="Diesel">


                </div>







                {{-- Code --}}

                <div class="col-md-6 mb-3">


                    <label class="form-label">

                        Fuel Code

                    </label>


                    <input type="text"
                           name="code"
                           class="form-control"
                           value="{{ old('code') }}"
                           placeholder="DSL">


                </div>







                {{-- Short Name --}}

                <div class="col-md-6 mb-3">


                    <label class="form-label">

                        Short Name

                    </label>


                    <input type="text"
                           name="short_name"
                           class="form-control"
                           value="{{ old('short_name') }}">


                </div>







                {{-- Color --}}

                <div class="col-md-6 mb-3">


                    <label class="form-label">

                        Color

                    </label>


                    <input type="text"
                           name="color"
                           class="form-control"
                           value="{{ old('color') }}"
                           placeholder="#000000">


                </div>








                {{-- Purchase Price --}}

                <div class="col-md-6 mb-3">


                    <label class="form-label">

                        Purchase Price

                    </label>


                    <input type="number"
                           step="0.01"
                           name="purchase_price"
                           class="form-control"
                           value="{{ old('purchase_price',0) }}">


                </div>








                {{-- Selling Price --}}

                <div class="col-md-6 mb-3">


                    <label class="form-label">

                        Selling Price

                    </label>


                    <input type="number"
                           step="0.01"
                           name="selling_price"
                           class="form-control"
                           value="{{ old('selling_price',0) }}">


                </div>







                {{-- Description --}}

                <div class="col-12 mb-3">


                    <label class="form-label">

                        Description

                    </label>


                    <textarea name="description"
                              class="form-control"
                              rows="3">{{ old('description') }}</textarea>


                </div>







                {{-- Status --}}

                <div class="col-md-6 mb-3">


                    <label class="form-label">

                        Status

                    </label>


                    <select name="status"
                            class="form-select">


                        <option value="1">

                            Active

                        </option>


                        <option value="0">

                            Inactive

                        </option>


                    </select>


                </div>



            </div>





            <div class="text-end">


                <button type="submit"
                        class="btn btn-primary">


                    <i class="bx bx-save"></i>

                    Save Fuel Type


                </button>



            </div>




        </form>



    </div>


</div>



@endsection