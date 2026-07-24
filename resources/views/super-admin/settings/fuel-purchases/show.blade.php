@extends('layouts.super-admin')

@section('title', 'Fuel Purchase Details')


@section('content')


    <div class="d-flex justify-content-between align-items-center mb-4">


        <div>

            <h4 class="fw-bold mb-1">

                <i class="bx bx-receipt text-primary me-2"></i>

                Fuel Purchase Details

            </h4>


            <p class="text-muted mb-0">

                View purchase invoice information

            </p>


        </div>




        <div class="d-flex gap-2">


            <a href="{{ route('super-admin.settings.fuel-purchases.edit', $fuelPurchase) }}" class="btn btn-warning shadow-sm">


                <i class="bx bx-edit me-1"></i>

                Edit


            </a>




            <a href="{{ route('super-admin.settings.fuel-purchases.index') }}" class="btn btn-light shadow-sm">


                <i class="bx bx-arrow-back me-1"></i>

                Back


            </a>


        </div>


    </div>







    {{-- Header Card --}}


    <div class="row g-4 mb-4">



        <div class="col-lg-4">


            <div class="card shadow-sm border-0 h-100">


                <div class="card-body text-center">


                    <div class="bg-primary bg-opacity-10 rounded-circle p-4 d-inline-block">


                        <i class="bx bx-receipt text-primary display-5"></i>


                    </div>



                    <h4 class="fw-bold mt-3">

                        {{ $fuelPurchase->purchase_no }}

                    </h4>



                    <span class="badge bg-secondary">

                        {{ $fuelPurchase->purchase_date?->format('d M Y') }}

                    </span>



                </div>


            </div>


        </div>







        <div class="col-lg-8">


            <div class="card shadow-sm border-0">


                <div class="card-body">



                    <h5 class="fw-bold mb-4">

                        <i class="bx bx-info-circle text-primary me-2"></i>

                        Purchase Information

                    </h5>



                    <div class="row g-3">



                        <div class="col-md-6">


                            <div class="border rounded p-3">


                                <small class="text-muted">

                                    Company

                                </small>


                                <h6 class="mb-0">

                                    {{ $fuelPurchase->company->name ?? '-' }}

                                </h6>


                            </div>


                        </div>





                        <div class="col-md-6">


                            <div class="border rounded p-3">


                                <small class="text-muted">

                                    Pump

                                </small>


                                <h6 class="mb-0">

                                    {{ $fuelPurchase->pump->name ?? '-' }}

                                </h6>


                            </div>


                        </div>





                        <div class="col-md-6">


                            <div class="border rounded p-3">


                                <small class="text-muted">

                                    Supplier

                                </small>


                                <h6 class="mb-0">

                                    {{ $fuelPurchase->supplier->name ?? '-' }}

                                </h6>


                            </div>


                        </div>





                        <div class="col-md-6">


                            <div class="border rounded p-3">


                                <small class="text-muted">

                                    Payment Status

                                </small>


                                <br>


                                @if ($fuelPurchase->payment_status == 'Paid')
                                    <span class="badge bg-success">

                                        Paid

                                    </span>
                                @elseif($fuelPurchase->payment_status == 'Partial')
                                    <span class="badge bg-warning text-dark">

                                        Partial

                                    </span>
                                @else
                                    <span class="badge bg-danger">

                                        Due

                                    </span>
                                @endif


                            </div>


                        </div>



                    </div>


                </div>


            </div>


        </div>



    </div>









    {{-- Items --}}


    <div class="card shadow-sm border-0">


        <div class="card-body">


            <h5 class="fw-bold mb-4">


                <i class="bx bx-gas-pump text-primary me-2"></i>

                Fuel Items


            </h5>



            <div class="table-responsive">


                <table class="table table-hover align-middle">


                    <thead class="table-light">


                        <tr>


                            <th>#</th>

                            <th>Fuel</th>

                            <th>Tank</th>

                            <th>Quantity</th>

                            <th>Rate</th>

                            <th>Total</th>


                        </tr>


                    </thead>



                    <tbody>



                        @foreach ($fuelPurchase->items as $item)
                            <tr>


                                <td>

                                    {{ $loop->iteration }}

                                </td>




                                <td>

                                    {{ $item->fuelType->name ?? '-' }}

                                </td>




                                <td>

                                    {{ $item->tank->name ?? '-' }}

                                </td>




                                <td>

                                    {{ number_format($item->quantity, 2) }}

                                </td>




                                <td>

                                    ৳ {{ number_format($item->rate, 2) }}

                                </td>




                                <td>

                                    <strong>

                                        ৳ {{ number_format($item->total, 2) }}

                                    </strong>

                                </td>



                            </tr>
                        @endforeach



                    </tbody>


                </table>


            </div>


        </div>


    </div>









    {{-- Summary --}}


    <div class="row justify-content-end mt-4">


        <div class="col-lg-4">


            <div class="card shadow-sm border-0">


                <div class="card-body">


                    <p class="mb-2 d-flex justify-content-between">


                        <span>

                            Subtotal

                        </span>


                        <strong>

                            ৳ {{ number_format($fuelPurchase->subtotal, 2) }}

                        </strong>


                    </p>





                    <p class="mb-2 d-flex justify-content-between">


                        <span>

                            Discount

                        </span>


                        <strong>

                            ৳ {{ number_format($fuelPurchase->discount, 2) }}

                        </strong>


                    </p>





                    <p class="mb-2 d-flex justify-content-between">


                        <span>

                            VAT

                        </span>


                        <strong>

                            ৳ {{ number_format($fuelPurchase->vat, 2) }}

                        </strong>


                    </p>






                    <hr>



                    <h5 class="fw-bold d-flex justify-content-between">


                        <span>

                            Grand Total

                        </span>


                        <span>

                            ৳ {{ number_format($fuelPurchase->grand_total, 2) }}

                        </span>


                    </h5>
                    <hr>


                    <p class="mb-2 d-flex justify-content-between">

                        <span>
                            Paid Amount
                        </span>


                        <strong class="text-success">

                            ৳ {{ number_format($fuelPurchase->paid_amount, 2) }}

                        </strong>


                    </p>




                    <p class="mb-2 d-flex justify-content-between">


                        <span>
                            Due Amount
                        </span>


                        <strong class="text-danger">

                            ৳ {{ number_format($fuelPurchase->due_amount, 2) }}

                        </strong>


                    </p>



                </div>


            </div>


        </div>


    </div>









    {{-- Audit --}}


    <div class="card shadow-sm border-0 mt-4">


        <div class="card-body">


            <h5 class="fw-bold">

                <i class="bx bx-history text-primary me-2"></i>

                Audit Information

            </h5>



            <p class="mb-1">

                <strong>Created By:</strong>

                {{ $fuelPurchase->creator->name ?? '-' }}

            </p>



            <p class="mb-0">

                <strong>Created At:</strong>

                {{ $fuelPurchase->created_at?->format('d M Y h:i A') }}

            </p>



        </div>


    </div>



@endsection
