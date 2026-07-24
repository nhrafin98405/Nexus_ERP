@extends('layouts.super-admin')

@section('title','Fuel Type Details')

@section('content')


<h6 class="mb-0 text-uppercase">
    Fuel Type Details
</h6>

<hr>



<div class="row">


    {{-- Left Side --}}

    <div class="col-lg-8">


        <div class="card">


            <div class="card-header d-flex justify-content-between align-items-center">


                <h5 class="mb-0">

                    Fuel Information

                </h5>



                <div>


                    <a href="{{ route('super-admin.settings.fuel-types.edit',$fuelType) }}"
                       class="btn btn-warning">


                        <i class="bx bx-edit"></i>

                        Edit


                    </a>



                    <a href="{{ route('super-admin.settings.fuel-types.index') }}"
                       class="btn btn-light">


                        <i class="bx bx-arrow-back"></i>

                        Back


                    </a>



                </div>


            </div>





            <div class="card-body">



                <div class="row">





                    <div class="col-md-6 mb-4">

                        <label class="text-muted">

                            Fuel Name

                        </label>


                        <h6>

                            {{ $fuelType->name }}

                        </h6>


                    </div>







                    <div class="col-md-6 mb-4">


                        <label class="text-muted">

                            Code

                        </label>


                        <h6>

                            {{ $fuelType->code }}

                        </h6>


                    </div>








                    <div class="col-md-6 mb-4">


                        <label class="text-muted">

                            Company

                        </label>


                        <h6>

                            {{ $fuelType->company->name ?? '-' }}

                        </h6>


                    </div>








                    <div class="col-md-6 mb-4">


                        <label class="text-muted">

                            Pump

                        </label>


                        <h6>

                            {{ $fuelType->pump->name ?? '-' }}

                        </h6>


                    </div>








                    <div class="col-md-6 mb-4">


                        <label class="text-muted">

                            Short Name

                        </label>


                        <h6>

                            {{ $fuelType->short_name ?? '-' }}

                        </h6>


                    </div>








                    <div class="col-md-6 mb-4">


                        <label class="text-muted">

                            Color

                        </label>


                        <h6>


                            @if($fuelType->color)

                                <span class="badge"
                                      style="background:{{ $fuelType->color }}">


                                    {{ $fuelType->color }}


                                </span>

                            @else

                                -

                            @endif


                        </h6>


                    </div>









                    <div class="col-md-6 mb-4">


                        <label class="text-muted">

                            Purchase Price

                        </label>


                        <h6>

                            ৳ {{ number_format($fuelType->purchase_price,2) }}

                        </h6>


                    </div>








                    <div class="col-md-6 mb-4">


                        <label class="text-muted">

                            Selling Price

                        </label>


                        <h6>

                            ৳ {{ number_format($fuelType->selling_price,2) }}

                        </h6>


                    </div>








                    <div class="col-md-6 mb-4">


                        <label class="text-muted">

                            Status

                        </label>


                        <br>


                        @if($fuelType->status)


                            <span class="badge bg-success">

                                Active

                            </span>


                        @else


                            <span class="badge bg-danger">

                                Inactive

                            </span>


                        @endif


                    </div>








                    <div class="col-12">


                        <label class="text-muted">

                            Description

                        </label>


                        <p class="mb-0">

                            {{ $fuelType->description ?? '-' }}

                        </p>


                    </div>



                </div>



            </div>



        </div>





        {{-- Activity --}}


        <div class="card mt-4">


            <div class="card-header">


                <h5 class="mb-0">

                    Recent Activity

                </h5>


            </div>



            <div class="card-body">


                <table class="table table-bordered mb-0">


                    <tbody>


                        <tr>

                            <th width="220">

                                Created At

                            </th>


                            <td>

                                {{ $fuelType->created_at?->format('d M Y h:i A') }}

                            </td>


                        </tr>




                        <tr>

                            <th>

                                Updated At

                            </th>


                            <td>

                                {{ $fuelType->updated_at?->format('d M Y h:i A') }}

                            </td>


                        </tr>





                        <tr>

                            <th>

                                Created By

                            </th>


                            <td>

                                {{ $fuelType->creator->name ?? '-' }}

                            </td>


                        </tr>





                        <tr>

                            <th>

                                Updated By

                            </th>


                            <td>

                                {{ $fuelType->updater->name ?? '-' }}

                            </td>


                        </tr>


                    </tbody>


                </table>


            </div>


        </div>



    </div>






    {{-- Right Side --}}


    <div class="col-lg-4">


        <div class="card border-start border-primary border-4">


            <div class="card-body text-center">


                <i class="bx bx-droplet fs-1 text-primary"></i>


                <h3 class="mt-2">

                    {{ $fuelType->name }}

                </h3>


                <small class="text-muted">

                    Fuel Type

                </small>


            </div>


        </div>





        <div class="card border-start border-success border-4">


            <div class="card-body text-center">


                <i class="bx bx-building fs-1 text-success"></i>


                <h5 class="mt-2">

                    {{ $fuelType->company->name ?? '-' }}

                </h5>


                <small class="text-muted">

                    Company

                </small>


            </div>


        </div>





        <div class="card border-start border-info border-4">


            <div class="card-body text-center">


                <i class="bx bx-gas-pump fs-1 text-info"></i>


                <h5 class="mt-2">

                    {{ $fuelType->pump->name ?? '-' }}

                </h5>


                <small class="text-muted">

                    Pump

                </small>


            </div>


        </div>



    </div>



</div>



@endsection