@extends('layouts.super-admin')

@section('title', 'Department Employees')


@section('content')





    {{-- Breadcrumb --}}

    <div class="page-breadcrumb d-flex align-items-center mb-3">

        <div class="breadcrumb-title pe-3">

            {{ $department->name }}

        </div>


        <div class="ps-3">

            <nav>

                <ol class="breadcrumb mb-0 p-0">

                    <li class="breadcrumb-item">

                        <a href="{{ route('super-admin.settings.employees.index') }}">

                            <i class="bx bx-home-alt"></i>

                        </a>

                    </li>


                    <li class="breadcrumb-item active">

                        Employees

                    </li>


                </ol>

            </nav>

        </div>


    </div>




    <div class="card">

        <div class="card-body">


            <div class="d-flex justify-content-between align-items-center">


                <div>

                    <h4 class="mb-1">

                        <i class="bx bx-building me-2"></i>

                        {{ $department->name }}

                    </h4>


                    <p class="mb-0">

                        Total Employee :

                        <span class="badge bg-light text-dark">

                            {{ $employees->count() }}

                        </span>

                    </p>


                </div>



                <a href="{{ route('super-admin.settings.employees.index') }}" class="btn btn-light">


                    <i class="bx bx-arrow-back"></i>

                    Back


                </a>



            </div>


        </div>

    </div>




    <hr>



    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">



        @foreach ($employees as $employee)
            <div class="col">


                <div class="card radius-15">


                    <div class="card-body text-center position-relative">



                        {{-- Action Dropdown --}}

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





                        <div class="p-4 border radius-15">



                            @if ($employee->photo)
                                <img src="{{ asset('storage/' . $employee->photo) }}" width="110" height="110"
                                    class="rounded-circle shadow">
                            @else
                                <img src="{{ asset('assets/images/avatars/avatar-2.png') }}" width="110" height="110"
                                    class="rounded-circle shadow">
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

                                    <strong>Code:</strong>

                                    {{ $employee->employee_code }}

                                </p>




                                <p class="mb-2">

                                    <i class="bx bx-building-house me-2"></i>

                                    <strong>Branch:</strong>

                                    {{ $employee->branch->name }}

                                </p>





                                <p class="mb-2">

                                    <i class="bx bx-phone me-2"></i>

                                    <strong>Phone:</strong>

                                    {{ $employee->phone ?? '-' }}

                                </p>





                                <p class="mb-2">

                                    <i class="bx bx-envelope me-2"></i>

                                    <strong>Email:</strong>

                                    {{ $employee->email ?? '-' }}

                                </p>





                                <p class="mb-0">


                                    @if ($employee->status)
                                        <span class="badge bg-success">

                                            Active

                                        </span>
                                    @else
                                        <span class="badge bg-danger">

                                            Inactive

                                        </span>
                                    @endif


                                </p>


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
    







@endsection
