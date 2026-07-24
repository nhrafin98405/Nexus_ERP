@extends('layouts.super-admin')

@section('title', 'Tank Management')


@section('content')


    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">

            <i class="bx bx-check-circle me-2"></i>

            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert">
            </button>

        </div>
    @endif







    {{-- Premium Header --}}

    <div class="card shadow-sm border-0 mb-4 overflow-hidden">


        <div class="card-body p-4">


            <div class="d-flex justify-content-between align-items-center">


                <div>


                    <h3 class="fw-bold mb-1">

                        <i class="bx bx-cylinder text-light me-2"></i>

                        Tank Management

                    </h3>


                    <p class=" mb-0">

                        Monitor fuel storage capacity and stock

                    </p>


                </div>



                <a href="{{ route('super-admin.settings.tanks.create') }}" class="btn btn-primary px-4">


                    <i class="bx bx-plus me-1"></i>

                    Add Tank


                </a>



            </div>


        </div>


    </div>










    {{-- Summary --}}

    <div class="row g-4 mb-4">





        <div class="col-xl-4 col-md-6">


            <div class="card border-0 shadow-sm">

                <div class="card-body">


                    <div class="d-flex justify-content-between">


                        <div>


                            <p class=" mb-1">

                                Total Tanks

                            </p>


                            <h2 class="fw-bold mb-0">

                                {{ $tanks->total() }}

                            </h2>


                        </div>


                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width:60px;height:60px;">

                            <i class="bx bx-cylinder text-white fs-3"></i>

                        </div>


                    </div>


                </div>

            </div>


        </div>









        <div class="col-xl-4 col-md-6">


            <div class="card border-0 shadow-sm">

                <div class="card-body">


                    <div class="d-flex justify-content-between">


                        <div>


                            <p class=" mb-1">

                                Active Tanks

                            </p>


                            <h2 class="fw-bold mb-0 text-light">

                                {{ $tanks->where('status', 1)->count() }}

                            </h2>


                        </div>


                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width:60px;height:60px;">


                            <i class="bx bx-check-circle text-white fs-3"></i>


                        </div>


                    </div>


                </div>

            </div>


        </div>









        <div class="col-xl-4 col-md-6">


            <div class="card border-0 shadow-sm">

                <div class="card-body">


                    <div class="d-flex justify-content-between">


                        <div>


                            <p class=" mb-1">

                                Inactive Tanks

                            </p>


                            <h2 class="fw-bold mb-0 text-danger">

                                {{ $tanks->where('status', 0)->count() }}

                            </h2>


                        </div>


                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center"
                            style="width:60px;height:60px;">


                            <i class="bx bx-x-circle text-white fs-3"></i>


                        </div>


                    </div>


                </div>

            </div>


        </div>





    </div>









    {{-- Search Filter --}}


    <div class="card shadow-sm border-0 mb-4">


        <div class="card-body">


            <div class="row g-3">


                <div class="col-md-6">


                    <div class="input-group">


                        <span class="input-group-text bg-light">

                            <i class="bx bx-search"></i>

                        </span>


                        <input type="text" class="form-control" placeholder="Search tank...">


                    </div>


                </div>





                <div class="col-md-3">


                    <select class="form-select">


                        <option>

                            All Status

                        </option>


                        <option>

                            Active

                        </option>


                        <option>

                            Inactive

                        </option>


                    </select>


                </div>






                <div class="col-md-3">


                    <button class="btn btn-light w-100">


                        <i class="bx bx-filter"></i>

                        Filter


                    </button>


                </div>


            </div>


        </div>


    </div>









    {{-- Table --}}


    <div class="card shadow-sm border-0">


        <div class="card-header bg-white">


            <h5 class="mb-0 fw-bold">

                <i class="bx bx-list-ul me-2"></i>

                Tank List

            </h5>


        </div>





        <div class="card-body">



            <div class="table-responsive">


                <table class="table table-hover align-middle">


                    <thead class="table-light">


                        <tr>


                            <th>#</th>

                            <th>Tank</th>

                            <th>Pump</th>

                            <th>Fuel</th>

                            <th>Capacity</th>

                            <th>Stock Level</th>

                            <th>Status</th>

                            <th width="100">

                                Action

                            </th>


                        </tr>


                    </thead>





                    <tbody>



                        @forelse($tanks as $tank)
                            <tr>


                                <td class="fw-bold">

                                    {{ $loop->iteration }}

                                </td>






                                <td>


                                    <div class="d-flex align-items-center">


                                        <div class=" p-2 me-2">


                                            <i class="bx bx-cylinder text-light fs-4"></i>


                                        </div>



                                        <div>


                                            <strong>

                                                {{ $tank->name }}

                                            </strong>


                                            <br>


                                            <small class="">

                                                {{ $tank->code }}

                                            </small>


                                        </div>



                                    </div>


                                </td>







                                <td>


                                    <span class="fw-semibold">

                                        {{ $tank->pump->name ?? '-' }}

                                    </span>


                                </td>







                                <td>


                                    <span class="badge rounded-pill bg-warning text-dark">


                                        <i class="bx bx-droplet me-1"></i>


                                        {{ $tank->fuelType->name ?? '-' }}


                                    </span>


                                </td>








                                <td>


                                    <strong>

                                        {{ number_format($tank->capacity) }}

                                    </strong>


                                    <br>

                                    <small class="">

                                        Liter

                                    </small>


                                </td>









                                <td width="180">


                                    @php

                                        $percent =
                                            $tank->capacity > 0 ? ($tank->current_stock / $tank->capacity) * 100 : 0;

                                    @endphp



                                    <div class="progress mb-1" style="height:8px;">


                                        <div class="progress-bar" style="width: {{ $percent }}%">


                                        </div>


                                    </div>



                                    <small>


                                        {{ number_format($tank->current_stock) }} L


                                        ({{ number_format($percent, 1) }}%)
                                    </small>



                                </td>









                                <td>


                                    @if ($tank->status)
                                        <span class="badge bg-success rounded-pill">

                                            Active

                                        </span>
                                    @else
                                        <span class="badge bg-danger rounded-pill">

                                            Inactive

                                        </span>
                                    @endif


                                </td>








                                <td>


                                    <div class="dropdown">


                                        <button class="btn btn-light btn-sm" data-bs-toggle="dropdown">


                                            <i class="bx bx-dots-horizontal-rounded"></i>


                                        </button>



                                        <ul class="dropdown-menu dropdown-menu-end">


                                            <li>

                                                <a class="dropdown-item"
                                                    href="{{ route('super-admin.settings.tanks.show', $tank) }}">


                                                    <i class="bx bx-show me-2"></i>

                                                    View


                                                </a>

                                            </li>



                                            <li>

                                                <a class="dropdown-item"
                                                    href="{{ route('super-admin.settings.tanks.edit', $tank) }}">


                                                    <i class="bx bx-edit me-2"></i>

                                                    Edit


                                                </a>

                                            </li>



                                            <li>

                                                <form method="POST"
                                                    action="{{ route('super-admin.settings.tanks.destroy', $tank) }}">


                                                    @csrf

                                                    @method('DELETE')


                                                    <button class="dropdown-item text-danger"
                                                        onclick="return confirm('Delete Tank?')">


                                                        <i class="bx bx-trash me-2"></i>

                                                        Delete


                                                    </button>


                                                </form>


                                            </li>


                                        </ul>


                                    </div>


                                </td>


                            </tr>



                        @empty



                            <tr>


                                <td colspan="8" class="text-center py-5">


                                    <i class="bx bx-cylinder display-3 "></i>


                                    <h5 class="mt-3">

                                        No Tank Available

                                    </h5>


                                    <p class="">

                                        Create your first fuel storage tank

                                    </p>


                                </td>


                            </tr>
                        @endforelse



                    </tbody>


                </table>


            </div>







            <div class="mt-3">


                {{ $tanks->links() }}


            </div>




        </div>


    </div>



@endsection
