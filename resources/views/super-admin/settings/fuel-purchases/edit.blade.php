@extends('layouts.super-admin')

@section('title', 'Edit Fuel Purchase')


@section('content')


    <div class="d-flex justify-content-between align-items-center mb-4">


        <div>

            <h4 class="fw-bold mb-1">

                <i class="bx bx-edit text-primary me-2"></i>

                Update Fuel Purchase

            </h4>


            <p class="text-muted mb-0">

                Modify purchase information

            </p>


        </div>




        <a href="{{ route('super-admin.settings.fuel-purchases.index') }}" class="btn btn-light shadow-sm">


            <i class="bx bx-arrow-back me-1"></i>

            Back


        </a>


    </div>







    @if ($errors->any())


        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)
                    <li>

                        {{ $error }}

                    </li>
                @endforeach

            </ul>

        </div>


    @endif







    <div class="card shadow-sm border-0">


        <div class="card-body">



            <form action="{{ route('super-admin.settings.fuel-purchases.update', $fuelPurchase) }}" method="POST">


                @csrf

                @method('PUT')





                <div class="row g-4">





                    {{-- Company --}}

                    <div class="col-lg-6">


                        <label class="form-label fw-semibold">

                            Company

                        </label>



                        <select name="company_id" class="form-select">



                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}"
                                    {{ $fuelPurchase->company_id == $company->id ? 'selected' : '' }}>


                                    {{ $company->name }}


                                </option>
                            @endforeach



                        </select>


                    </div>








                    {{-- Pump --}}

                    <div class="col-lg-6">


                        <label class="form-label fw-semibold">

                            Pump

                        </label>


                        <select name="pump_id" class="form-select">


                            @foreach ($pumps as $pump)
                                <option value="{{ $pump->id }}"
                                    {{ $fuelPurchase->pump_id == $pump->id ? 'selected' : '' }}>


                                    {{ $pump->name }}


                                </option>
                            @endforeach



                        </select>


                    </div>








                    {{-- Supplier --}}

                    <div class="col-lg-6">


                        <label class="form-label fw-semibold">

                            Supplier

                        </label>



                        <select name="supplier_id" class="form-select">



                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}"
                                    {{ $fuelPurchase->supplier_id == $supplier->id ? 'selected' : '' }}>


                                    {{ $supplier->name }}


                                </option>
                            @endforeach



                        </select>


                    </div>








                    {{-- Date --}}

                    <div class="col-lg-6">


                        <label class="form-label fw-semibold">

                            Purchase Date

                        </label>



                        <input type="date" name="purchase_date" class="form-control"
                            value="{{ $fuelPurchase->purchase_date?->format('Y-m-d') }}">



                    </div>






                </div>
                <!-- Existing Fuel Items -->

                <hr class="my-4">


                <div class="d-flex justify-content-between align-items-center mb-3">


                    <h5 class="fw-bold mb-0">

                        <i class="bx bx-gas-pump text-primary me-2"></i>

                        Fuel Items

                    </h5>



                </div>





                <div class="table-responsive">


                    <table class="table table-bordered align-middle">


                        <thead class="table-light">


                            <tr>


                                <th>
                                    Fuel Type
                                </th>


                                <th>
                                    Tank
                                </th>


                                <th>
                                    Quantity
                                </th>


                                <th>
                                    Rate
                                </th>


                                <th>
                                    Total
                                </th>


                            </tr>


                        </thead>




                        <tbody>



                            @foreach ($fuelPurchase->items as $key => $item)
                                <tr>



                                    <td>


                                        <select name="items[{{ $key }}][fuel_type_id]" class="form-select">



                                            @foreach ($fuelTypes as $fuel)
                                                <option value="{{ $fuel->id }}"
                                                    {{ $item->fuel_type_id == $fuel->id ? 'selected' : '' }}>


                                                    {{ $fuel->name }}


                                                </option>
                                            @endforeach



                                        </select>


                                    </td>








                                    <td>


                                        <select name="items[{{ $key }}][tank_id]" class="form-select">



                                            @foreach ($tanks as $tank)
                                                <option value="{{ $tank->id }}"
                                                    {{ $item->tank_id == $tank->id ? 'selected' : '' }}>


                                                    {{ $tank->name }}


                                                </option>
                                            @endforeach



                                        </select>


                                    </td>







                                    <td>


                                        <input type="number" step="0.01" name="items[{{ $key }}][quantity]"
                                            class="form-control qty" value="{{ $item->quantity }}">


                                    </td>







                                    <td>


                                        <input type="number" step="0.01" name="items[{{ $key }}][rate]"
                                            class="form-control rate" value="{{ $item->rate }}">


                                    </td>







                                    <td>


                                        <input type="number" step="0.01" name="items[{{ $key }}][total]"
                                            class="form-control total" value="{{ $item->total }}" readonly>


                                    </td>





                                </tr>
                            @endforeach




                        </tbody>


                    </table>


                </div>







                <hr class="my-4">



                <div class="row justify-content-end">


                    <div class="col-lg-4">





                        <div class="mb-3">


                            <label class="form-label fw-semibold">

                                Subtotal

                            </label>


                            <input type="number" name="subtotal" id="subtotal" class="form-control"
                                value="{{ $fuelPurchase->subtotal }}" readonly>


                        </div>







                        <div class="mb-3">


                            <label class="form-label fw-semibold">

                                Discount

                            </label>


                            <input type="number" name="discount" id="discount" class="form-control"
                                value="{{ $fuelPurchase->discount }}">


                        </div>








                        <div class="mb-3">


                            <label class="form-label fw-semibold">

                                VAT

                            </label>


                            <input type="number" name="vat" id="vat" class="form-control"
                                value="{{ $fuelPurchase->vat }}">


                        </div>








                        <div class="mb-3">


                            <label class="form-label fw-bold">

                                Grand Total

                            </label>


                            <input type="number" name="grand_total" id="grand_total" class="form-control fw-bold"
                                value="{{ $fuelPurchase->grand_total }}" readonly>


                        </div>




                    </div>


                </div>






                <div class="text-end mt-4">


                    <button class="btn btn-primary px-5">


                        <i class="bx bx-save me-1"></i>

                        Update Purchase


                    </button>


                </div>



            </form>


        </div>


    </div>



@endsection
