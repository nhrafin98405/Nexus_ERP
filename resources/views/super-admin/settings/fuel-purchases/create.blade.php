@extends('layouts.super-admin')

@section('title', 'Create Fuel Purchase')


@section('content')


    <div class="d-flex justify-content-between align-items-center mb-4">


        <div>

            <h4 class="fw-bold mb-1">

                <i class="bx bx-cart text-primary me-2"></i>

                Create Fuel Purchase

            </h4>


            <p class="text-muted mb-0">

                Add new fuel stock purchase

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
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>


    @endif







    <div class="card shadow-sm border-0">


        <div class="card-body">


            <form action="{{ route('super-admin.settings.fuel-purchases.store') }}" method="POST">


                @csrf



                <div class="row g-4">



                    {{-- Company --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">

                            Company

                        </label>


                        <select name="company_id" class="form-select">


                            <option value="">

                                Select Company

                            </option>


                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">

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


                            <option value="">

                                Select Pump

                            </option>


                            @foreach ($pumps as $pump)
                                <option value="{{ $pump->id }}">

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


                            <option value="">

                                Select Supplier

                            </option>


                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">

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


                        <input type="date" name="purchase_date" value="{{ date('Y-m-d') }}" class="form-control">


                    </div>






                </div>
                <!-- Purchase Items -->

                <hr class="my-4">


                <div class="d-flex justify-content-between align-items-center mb-3">


                    <h5 class="fw-bold mb-0">

                        <i class="bx bx-gas-pump text-primary me-2"></i>

                        Fuel Items

                    </h5>



                    <button type="button" class="btn btn-success btn-sm" id="addItem">


                        <i class="bx bx-plus"></i>

                        Add Item


                    </button>


                </div>





                <div class="table-responsive">


                    <table class="table table-bordered align-middle">


                        <thead class="table-light">


                            <tr>

                                <th width="25%">
                                    Fuel Type
                                </th>


                                <th width="25%">
                                    Tank
                                </th>


                                <th width="15%">
                                    Quantity
                                </th>


                                <th width="15%">
                                    Rate
                                </th>


                                <th width="15%">
                                    Total
                                </th>


                                <th width="5%">
                                    #
                                </th>


                            </tr>


                        </thead>



                        <tbody id="itemTable">


                            <tr>


                                <td>


                                    <select name="items[0][fuel_type_id]" class="form-select">


                                        <option value="">
                                            Select Fuel
                                        </option>


                                        @foreach ($fuelTypes as $fuel)
                                            <option value="{{ $fuel->id }}">

                                                {{ $fuel->name }}

                                            </option>
                                        @endforeach


                                    </select>


                                </td>





                                <td>


                                    <select name="items[0][tank_id]" class="form-select">


                                        <option value="">
                                            Select Tank
                                        </option>


                                        @foreach ($tanks as $tank)
                                            <option value="{{ $tank->id }}">

                                                {{ $tank->name }}

                                            </option>
                                        @endforeach


                                    </select>


                                </td>





                                <td>


                                    <input type="number" step="0.01" name="items[0][quantity]" class="form-control qty"
                                        value="0">


                                </td>






                                <td>


                                    <input type="number" step="0.01" name="items[0][rate]" class="form-control rate"
                                        value="0">


                                </td>






                                <td>


                                    <input type="number" step="0.01" name="items[0][total]" class="form-control total"
                                        readonly>


                                </td>







                                <td>


                                    <button type="button" class="btn btn-danger btn-sm removeItem">


                                        <i class="bx bx-trash"></i>

                                    </button>


                                </td>


                            </tr>



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


                            <input type="number" name="subtotal" id="subtotal" class="form-control" readonly>


                        </div>





                        <div class="mb-3">


                            <label class="form-label fw-semibold">

                                Discount

                            </label>


                            <input type="number" name="discount" id="discount" value="0" class="form-control">


                        </div>






                        <div class="mb-3">


                            <label class="form-label fw-semibold">

                                VAT

                            </label>


                            <input type="number" name="vat" id="vat" value="0" class="form-control">


                        </div>






                        <div class="mb-3">


                            <label class="form-label fw-bold">

                                Grand Total

                            </label>


                            <input type="number" name="grand_total" id="grand_total" class="form-control fw-bold"
                                readonly>


                        </div>



                    </div>


                </div>
                <hr class="my-4">


                <div class="row g-3">


                    <div class="col-lg-4">


                        <label class="form-label fw-semibold">

                            Paid Amount

                        </label>


                        <input type="number" name="paid_amount" value="0" class="form-control">


                    </div>




                    <div class="col-lg-4">


                        <label class="form-label fw-semibold">

                            Payment Method

                        </label>


                        <select name="payment_method" class="form-select">


                            <option value="Cash">

                                Cash

                            </option>


                            <option value="Bank">

                                Bank

                            </option>


                            <option value="Card">

                                Card

                            </option>


                        </select>


                    </div>





                    <div class="col-lg-4">


                        <label class="form-label fw-semibold">

                            Status

                        </label>


                        <select name="status" class="form-select">


                            <option value="1">

                                Active

                            </option>


                            <option value="0">

                                Inactive

                            </option>


                        </select>


                    </div>


                </div>




                <div class="text-end mt-4">


                    <button class="btn btn-primary px-5">


                        <i class="bx bx-save me-1"></i>

                        Save Purchase


                    </button>


                </div>



            </form>


        </div>

    </div>

    <script>
        let itemIndex = 1;



        /*
        |--------------------------------------------------------------------------
        | Add New Item Row
        |--------------------------------------------------------------------------
        */

        document.getElementById('addItem')
            .addEventListener('click', function() {


                let table = document.getElementById('itemTable');


                let row = `

<tr>


<td>

<select name="items[${itemIndex}][fuel_type_id]"
class="form-select">


<option value="">
Select Fuel
</option>


@foreach ($fuelTypes as $fuel)

<option value="{{ $fuel->id }}">

{{ $fuel->name }}

</option>

@endforeach


</select>

</td>





<td>

<select name="items[${itemIndex}][tank_id]"
class="form-select">


<option value="">
Select Tank
</option>


@foreach ($tanks as $tank)

<option value="{{ $tank->id }}">

{{ $tank->name }}

</option>

@endforeach


</select>

</td>






<td>

<input type="number"
step="0.01"
name="items[${itemIndex}][quantity]"
class="form-control qty"
value="0">

</td>





<td>

<input type="number"
step="0.01"
name="items[${itemIndex}][rate]"
class="form-control rate"
value="0">

</td>






<td>

<input type="number"
step="0.01"
name="items[${itemIndex}][total]"
class="form-control total"
readonly>

</td>






<td>


<button type="button"
class="btn btn-danger btn-sm removeItem">


<i class="bx bx-trash"></i>


</button>


</td>


</tr>


`;



                table.insertAdjacentHTML(
                    'beforeend',
                    row
                );



                itemIndex++;


            });






        /*
        |--------------------------------------------------------------------------
        | Remove Row
        |--------------------------------------------------------------------------
        */


        document.addEventListener(
            'click',
            function(e) {


                if (e.target.closest('.removeItem')) {


                    e.target
                        .closest('tr')
                        .remove();


                    calculateTotal();


                }



            });









        /*
        |--------------------------------------------------------------------------
        | Calculate Row Total
        |--------------------------------------------------------------------------
        */


        document.addEventListener(
            'input',
            function(e) {



                if (
                    e.target.classList.contains('qty') ||
                    e.target.classList.contains('rate')
                )

                {


                    let row = e.target.closest('tr');


                    let qty =
                        parseFloat(
                            row.querySelector('.qty').value
                        ) || 0;



                    let rate =
                        parseFloat(
                            row.querySelector('.rate').value
                        ) || 0;



                    row.querySelector('.total').value =
                        (qty * rate).toFixed(2);



                    calculateTotal();


                }



            });








        /*
        |--------------------------------------------------------------------------
        | Grand Total Calculation
        |--------------------------------------------------------------------------
        */


        document.addEventListener(
            'input',
            function(e) {


                if (
                    e.target.id === 'discount' ||
                    e.target.id === 'vat'
                )

                {

                    calculateTotal();

                }


            });







        function calculateTotal() {


            let subtotal = 0;



            document
                .querySelectorAll('.total')
                .forEach(function(item) {


                    subtotal +=
                        parseFloat(item.value) || 0;


                });





            document.getElementById('subtotal').value =
                subtotal.toFixed(2);





            let discount =
                parseFloat(
                    document.getElementById('discount').value
                ) || 0;



            let vat =
                parseFloat(
                    document.getElementById('vat').value
                ) || 0;





            let grand =
                subtotal - discount + vat;



            document.getElementById('grand_total').value =
                grand.toFixed(2);



        }
    </script>


@endsection
