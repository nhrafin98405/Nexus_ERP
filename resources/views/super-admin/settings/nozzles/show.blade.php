@extends('layouts.super-admin')

@section('title','Nozzle Details')


@section('content')


{{-- ================= HEADER ================= --}}

<div class="d-flex justify-content-between align-items-center mb-4">


    <div>

        <h4 class="fw-bold mb-1">

            <i class="bx bx-target-lock text-primary me-2"></i>

            Nozzle Details

        </h4>


        <p class="text-muted mb-0">

            View nozzle information, meter reading and connection details

        </p>

    </div>



    <div class="d-flex gap-2">


        <a href="{{ route('super-admin.settings.nozzles.edit',$nozzle) }}"
           class="btn btn-warning shadow-sm">

            <i class="bx bx-edit me-1"></i>

            Edit

        </a>



        <a href="{{ route('super-admin.settings.nozzles.index') }}"
           class="btn btn-light shadow-sm">

            <i class="bx bx-arrow-back me-1"></i>

            Back

        </a>


    </div>


</div>






{{-- ================= BASIC INFORMATION ================= --}}


<div class="row g-4">



    {{-- Nozzle Card --}}

    <div class="col-lg-4">


        <div class="card shadow-sm border-0 h-100">


            <div class="card-body text-center">


                <div class="bg-primary bg-opacity-10 rounded-circle p-4 d-inline-block">


                    <i class="bx bx-target-lock text-primary display-5"></i>


                </div>



                <h4 class="fw-bold mt-3">

                    {{ $nozzle->name }}

                </h4>



                <span class="badge bg-secondary">

                    {{ $nozzle->code }}

                </span>



                <div class="mt-3">


                    @if($nozzle->status)


                        <span class="badge bg-success px-3 py-2">

                            Active

                        </span>


                    @else


                        <span class="badge bg-danger px-3 py-2">

                            Inactive

                        </span>


                    @endif


                </div>


            </div>


        </div>


    </div>







    {{-- Connection Information --}}


    <div class="col-lg-8">


        <div class="card shadow-sm border-0">


            <div class="card-header bg-white">


                <h5 class="mb-0 fw-bold">


                    <i class="bx bx-info-circle text-primary me-2"></i>

                    Connection Information


                </h5>


            </div>




            <div class="card-body">


                <div class="row g-3">



                    <div class="col-md-6">


                        <div class="border rounded p-3">


                            <small class="text-muted">

                                Company

                            </small>


                            <h6 class="mb-0">

                                {{ $nozzle->company->name ?? '-' }}

                            </h6>


                        </div>


                    </div>






                    <div class="col-md-6">


                        <div class="border rounded p-3">


                            <small class="text-muted">

                                Pump

                            </small>


                            <h6 class="mb-0">

                                {{ $nozzle->pump->name ?? '-' }}

                            </h6>


                        </div>


                    </div>







                    <div class="col-md-6">


                        <div class="border rounded p-3">


                            <small class="text-muted">

                                Tank

                            </small>


                            <h6 class="mb-0">

                                {{ $nozzle->tank->name ?? '-' }}

                            </h6>


                        </div>


                    </div>







                    <div class="col-md-6">


                        <div class="border rounded p-3">


                            <small class="text-muted">

                                Fuel Type

                            </small>



                            <h6 class="mb-0">


                                <span class="badge"
                                style="background:{{ $nozzle->fuelType->color ?? '#777' }}">


                                    {{ $nozzle->fuelType->name ?? '-' }}


                                </span>


                            </h6>


                        </div>


                    </div>



                </div>


            </div>


        </div>


    </div>


</div>









{{-- ================= METER SECTION ================= --}}



<div class="row g-4 mt-2">





    {{-- Start Meter --}}


    <div class="col-lg-4">


        <div class="card shadow-sm border-0">


            <div class="card-body">


                <div class="d-flex justify-content-between align-items-center">


                    <div>


                        <small class="text-muted">

                            Starting Meter

                        </small>


                        <h3 class="fw-bold mb-0">

                            {{ number_format($nozzle->meter_start,2) }}

                        </h3>


                    </div>



                    <i class="bx bx-reset text-primary display-6"></i>


                </div>


            </div>


        </div>


    </div>







    {{-- Current Meter --}}


    <div class="col-lg-4">


        <div class="card shadow-sm border-0">


            <div class="card-body">


                <div class="d-flex justify-content-between align-items-center">


                    <div>


                        <small class="text-muted">

                            Current Meter

                        </small>


                        <h3 class="fw-bold mb-0">

                            {{ number_format($nozzle->meter_current,2) }}

                        </h3>


                    </div>



                    <i class="bx bx-tachometer text-success display-6"></i>


                </div>


            </div>


        </div>


    </div>








    {{-- Total Dispensed --}}


    <div class="col-lg-4">


        <div class="card shadow-sm border-0">


            <div class="card-body">


                <div class="d-flex justify-content-between align-items-center">


                    <div>


                        <small class="text-muted">

                            Total Dispensed

                        </small>


                        <h3 class="fw-bold mb-0">


                            {{ number_format(
                                $nozzle->meter_current - $nozzle->meter_start,
                                2
                            ) }}


                        </h3>


                    </div>



                    <i class="bx bx-gas-pump text-warning display-6"></i>


                </div>


            </div>


        </div>


    </div>




</div>









{{-- ================= AUDIT INFORMATION ================= --}}



<div class="card shadow-sm border-0 mt-4">


    <div class="card-header bg-white">


        <h5 class="mb-0 fw-bold">


            <i class="bx bx-history text-primary me-2"></i>

            Audit Information


        </h5>


    </div>





    <div class="card-body">


        <div class="row">



            <div class="col-md-6 mb-3">


                <strong>

                    Created By

                </strong>


                <br>


                {{ $nozzle->creator->name ?? '-' }}


            </div>





            <div class="col-md-6 mb-3">


                <strong>

                    Created At

                </strong>


                <br>


                {{ $nozzle->created_at?->format('d M Y h:i A') }}


            </div>






            <div class="col-md-6 mb-3">


                <strong>

                    Updated By

                </strong>


                <br>


                {{ $nozzle->updater->name ?? '-' }}


            </div>






            <div class="col-md-6 mb-3">


                <strong>

                    Updated At

                </strong>


                <br>


                {{ $nozzle->updated_at?->format('d M Y h:i A') }}


            </div>



        </div>


    </div>


</div>





@endsection