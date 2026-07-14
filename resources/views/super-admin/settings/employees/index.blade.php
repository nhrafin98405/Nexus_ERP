@extends('layouts.super-admin')

@section('title', 'Employees')


@section('content')


    {{-- Breadcrumb --}}

    <div class="page-breadcrumb d-flex align-items-center mb-3">

        <div class="breadcrumb-title pe-3">
            Employees
        </div>


        <div class="ps-3">

            <nav>

                <ol class="breadcrumb mb-0 p-0">

                    <li class="breadcrumb-item">

                        <a href="{{ route('super-admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>

                    </li>


                    <li class="breadcrumb-item active">
                        Employee List
                    </li>

                </ol>

            </nav>

        </div>

    </div>



    <h6 class="mb-0 text-uppercase">
        Employee Department List
    </h6>

    <hr>



    @foreach ($employees as $departmentId => $departmentEmployees)
        @php

            $department = $departmentEmployees->first()->department;

        @endphp



        <div class="card mb-4">


            <div class="card-body">



                <div class="d-flex justify-content-between align-items-center mb-4">


                    <div>

                        <h4 class="mb-1">

                            <i class="bx bx-building me-2"></i>

                            {{ $department->name }}

                        </h4>


                        <p class="mb-0">

                            Total Employee :

                            <span class="badge bg-light text-dark">

                                {{ $departmentEmployees->count() }}

                            </span>


                        </p>


                    </div>



                    <a href="{{ route('super-admin.settings.employees.department', $department) }}" class="btn btn-light">


                        <i class="bx bx-right-arrow-alt"></i>

                        See More


                    </a>



                </div>





                <div class="row g-3">



                    @foreach ($departmentEmployees->take(4) as $employee)
                        <div class="col-md-6 col-xl-3">



                            <div class="card radius-15 h-100">



                                <div class="card-body text-center position-relative">



                                    {{-- Dropdown --}}

                                    <div class="dropdown position-absolute top-0 end-0 m-3">


                                        <button class="btn btn-light btn-sm" data-bs-toggle="dropdown">

                                            <i class="bx bx-dots-vertical-rounded"></i>

                                        </button>



                                        <ul class="dropdown-menu">


                                            <li>

                                                <a class="dropdown-item"
                                                    href="{{ route('super-admin.settings.employees.show', $employee) }}">

                                                    <i class="bx bx-show me-2"></i>

                                                    View

                                                </a>

                                            </li>



                                            <li>

                                                <a class="dropdown-item"
                                                    href="{{ route('super-admin.settings.employees.edit', $employee) }}">

                                                    <i class="bx bx-edit me-2"></i>

                                                    Edit

                                                </a>

                                            </li>



                                            <li>

                                                <form method="POST"
                                                    action="{{ route('super-admin.settings.employees.destroy', $employee) }}">

                                                    @csrf

                                                    @method('DELETE')


                                                    <button class="dropdown-item text-danger"
                                                        onclick="return confirm('Delete Employee?')">


                                                        <i class="bx bx-trash me-2"></i>

                                                        Delete


                                                    </button>


                                                </form>

                                            </li>


                                        </ul>


                                    </div>





                                    <div class="p-3 border radius-15">



                                        @if ($employee->photo)
                                            <img src="{{ asset('storage/' . $employee->photo) }}" width="100"
                                                height="100" class="rounded-circle shadow">
                                        @else
                                            <img src="{{ asset('assets/images/avatars/avatar-2.png') }}" width="100"
                                                height="100" class="rounded-circle shadow">
                                        @endif




                                        <h5 class="mt-4 mb-1">

                                            {{ $employee->name }}

                                        </h5>



                                        <span class="badge bg-light text-dark">


                                            <i class="bx bx-briefcase me-1"></i>


                                            {{ $employee->designation->name }}


                                        </span>




                                        <div class="text-start mt-4">


                                            <p class="mb-2">

                                                <i class="bx bx-id-card me-2"></i>

                                                <strong>
                                                    {{ $employee->employee_code }}
                                                </strong>

                                            </p>



                                            <p class="mb-2">

                                                <i class="bx bx-phone me-2"></i>

                                                {{ $employee->phone ?? '-' }}

                                            </p>




                                            <p class="mb-2">

                                                <i class="bx bx-envelope me-2"></i>

                                                {{ $employee->email ?? '-' }}

                                            </p>




                                            @if ($employee->status)
                                                <span class="badge bg-success">

                                                    Active

                                                </span>
                                            @else
                                                <span class="badge bg-danger">

                                                    Inactive

                                                </span>
                                            @endif



                                        </div>




                                        <div class="d-grid mt-4">


                                            <a href="{{ route('super-admin.settings.employees.show', $employee) }}"
                                                class="btn btn-light radius-15">


                                                <i class="bx bx-user"></i>

                                                View Profile


                                            </a>


                                        </div>




                                    </div>



                                </div>


                            </div>



                        </div>
                    @endforeach



                </div>



            </div>


        </div>
    @endforeach



@endsection
