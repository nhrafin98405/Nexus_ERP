@extends('layouts.super-admin')

@section('title','Fuel Types')

@section('content')


<h6 class="mb-0 text-uppercase">
    Fuel Type Management
</h6>

<hr>



<div class="card">


    <div class="card-header d-flex justify-content-between align-items-center">


        <h5 class="mb-0">

            Fuel Types

        </h5>



        <a href="{{ route('super-admin.settings.fuel-types.create') }}"
           class="btn btn-primary">


            <i class="bx bx-plus"></i>

            Add Fuel Type


        </a>



    </div>





    <div class="card-body">


        <div class="table-responsive">


            <table class="table table-bordered align-middle mb-0">


                <thead class="table-light">


                    <tr>


                        <th>
                            #
                        </th>


                        <th>
                            Fuel Name
                        </th>


                        <th>
                            Code
                        </th>


                        <th>
                            Company
                        </th>


                        <th>
                            Pump
                        </th>


                        <th>
                            Purchase Price
                        </th>


                        <th>
                            Selling Price
                        </th>


                        <th>
                            Status
                        </th>


                        <th width="180">
                            Action
                        </th>


                    </tr>


                </thead>





                <tbody>



                @forelse($fuelTypes as $key=>$fuel)



                    <tr>


                        <td>

                            {{ $fuelTypes->firstItem()+$key }}

                        </td>



                        <td>


                            <strong>

                                {{ $fuel->name }}

                            </strong>


                            <br>


                            <small class="text-muted">

                                {{ $fuel->short_name }}

                            </small>


                        </td>





                        <td>


                            <span class="badge bg-info">


                                {{ $fuel->code }}


                            </span>


                        </td>






                        <td>

                            {{ $fuel->company->name ?? '-' }}

                        </td>





                        <td>

                            {{ $fuel->pump->name ?? '-' }}

                        </td>






                        <td>


                            ৳ {{ number_format($fuel->purchase_price,2) }}


                        </td>





                        <td>


                            ৳ {{ number_format($fuel->selling_price,2) }}


                        </td>





                        <td>



                            @if($fuel->status)


                                <span class="badge bg-success">

                                    Active

                                </span>


                            @else


                                <span class="badge bg-danger">

                                    Inactive

                                </span>


                            @endif



                        </td>






                        <td>



                            <a href="{{ route('super-admin.settings.fuel-types.show',$fuel) }}"
                               class="btn btn-light btn-sm">


                                <i class="bx bx-show"></i>


                            </a>





                            <a href="{{ route('super-admin.settings.fuel-types.edit',$fuel) }}"
                               class="btn btn-warning btn-sm">


                                <i class="bx bx-edit"></i>


                            </a>






                            <form action="{{ route('super-admin.settings.fuel-types.destroy',$fuel) }}"
                                  method="POST"
                                  class="d-inline">


                                @csrf

                                @method('DELETE')



                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Delete this fuel type?')">


                                    <i class="bx bx-trash"></i>


                                </button>


                            </form>



                        </td>




                    </tr>




                @empty



                    <tr>


                        <td colspan="9"
                            class="text-center">


                            No Fuel Type Found


                        </td>


                    </tr>



                @endforelse



                </tbody>



            </table>



        </div>



        <div class="mt-3">

            {{ $fuelTypes->links() }}

        </div>



    </div>


</div>



@endsection