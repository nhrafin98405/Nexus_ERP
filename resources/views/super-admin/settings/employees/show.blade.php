@extends('layouts.super-admin')

@section('title', 'Employee Details')

@section('content')

    


            {{-- Breadcrumb --}}

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="breadcrumb-title pe-3">
                    Employee Details
                </div>

                <div class="ps-3">

                    <nav aria-label="breadcrumb">

                        <ol class="breadcrumb mb-0 p-0">

                            <li class="breadcrumb-item">
                                <a href="{{ route('super-admin.dashboard') }}">
                                    <i class="bx bx-home-alt"></i>
                                </a>
                            </li>

                            <li class="breadcrumb-item active">
                                Employee Details
                            </li>

                        </ol>

                    </nav>

                </div>


                <div class="ms-auto">

                    <a href="{{ route('super-admin.settings.employees.index') }}" class="btn btn-light">

                        <i class="bx bx-arrow-back"></i>
                        Back

                    </a>


                    <a href="{{ route('super-admin.settings.employees.edit', $employee) }}" class="btn btn-light">

                        <i class="bx bx-edit"></i>
                        Edit

                    </a>


                </div>


            </div>



            <div class="container">

                <div class="main-body">


                    <div class="row">


                        {{-- Left Profile Card --}}

                        <div class="col-lg-4">


                            <div class="card">


                                <div class="card-body">


                                    <div class="d-flex flex-column align-items-center text-center">


                                        @if ($employee->photo)
                                            <img src="{{ asset('storage/' . $employee->photo) }}" width="120"
                                                height="120" class="rounded-circle shadow">
                                        @else
                                            <img src="{{ asset('assets/images/avatars/avatar-2.png') }}" width="120"
                                                class="rounded-circle shadow">
                                        @endif



                                        <div class="mt-3">


                                            <h4>
                                                {{ $employee->name }}
                                            </h4>


                                            <p class="mb-1">

                                                {{ $employee->designation->name }}

                                            </p>


                                            <p class="text-muted">

                                                {{ $employee->department->name }}

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


                                    </div>



                                    <hr>



                                    <ul class="list-group list-group-flush">


                                        <li class="list-group-item d-flex justify-content-between">

                                            <strong>
                                                Employee Code
                                            </strong>

                                            <span>
                                                {{ $employee->employee_code }}
                                            </span>

                                        </li>



                                        <li class="list-group-item d-flex justify-content-between">

                                            <strong>
                                                Email
                                            </strong>

                                            <span>
                                                {{ $employee->email ?? '-' }}
                                            </span>

                                        </li>



                                        <li class="list-group-item d-flex justify-content-between">

                                            <strong>
                                                Phone
                                            </strong>

                                            <span>
                                                {{ $employee->phone ?? '-' }}
                                            </span>

                                        </li>


                                    </ul>



                                </div>

                            </div>


                        </div>





                        {{-- Right Details --}}

                        <div class="col-lg-8">


                            <div class="card">


                                <div class="card-body">


                                    <h5 class="mb-4">

                                        <i class="bx bx-user me-2"></i>

                                        Personal Information

                                    </h5>



                                    <div class="row">


                                        <div class="col-md-6 mb-3">

                                            <strong>
                                                Full Name
                                            </strong>

                                            <br>

                                            {{ $employee->name }}

                                        </div>



                                        <div class="col-md-6 mb-3">

                                            <strong>
                                                Gender
                                            </strong>

                                            <br>

                                            {{ ucfirst($employee->gender ?? '-') }}

                                        </div>



                                        <div class="col-md-6 mb-3">

                                            <strong>
                                                Date Of Birth
                                            </strong>

                                            <br>

                                            {{ $employee->date_of_birth ? $employee->date_of_birth->format('d M Y') : '-' }}

                                        </div>



                                        <div class="col-md-6 mb-3">

                                            <strong>
                                                Address
                                            </strong>

                                            <br>

                                            {{ $employee->address ?? '-' }}

                                        </div>


                                    </div>



                                    <hr>



                                    <h5 class="mb-4">

                                        <i class="bx bx-briefcase me-2"></i>

                                        Employment Information

                                    </h5>



                                    <div class="row">


                                        <div class="col-md-6 mb-3">

                                            <strong>
                                                Company
                                            </strong>

                                            <br>

                                            {{ $employee->company->name }}

                                        </div>



                                        <div class="col-md-6 mb-3">

                                            <strong>
                                                Branch
                                            </strong>

                                            <br>

                                            {{ $employee->branch->name }}

                                        </div>



                                        <div class="col-md-6 mb-3">

                                            <strong>
                                                Department
                                            </strong>

                                            <br>

                                            {{ $employee->department->name }}

                                        </div>



                                        <div class="col-md-6 mb-3">

                                            <strong>
                                                Designation
                                            </strong>

                                            <br>

                                            {{ $employee->designation->name }}

                                        </div>



                                        <div class="col-md-6 mb-3">

                                            <strong>
                                                Joining Date
                                            </strong>

                                            <br>

                                            {{ $employee->joining_date ? $employee->joining_date->format('d M Y') : '-' }}

                                        </div>


                                    </div>



                                    <hr>



                                    <h5 class="mb-4">

                                        <i class="bx bx-info-circle me-2"></i>

                                        System Information

                                    </h5>



                                    <div class="row">


                                        <div class="col-md-6 mb-3">

                                            <strong>
                                                Created At
                                            </strong>

                                            <br>

                                            {{ $employee->created_at->format('d M Y, h:i A') }}

                                        </div>



                                        <div class="col-md-6 mb-3">

                                            <strong>
                                                Updated At
                                            </strong>

                                            <br>

                                            {{ $employee->updated_at->format('d M Y, h:i A') }}

                                        </div>


                                    </div>



                                </div>

                            </div>


                        </div>



                    </div>

                </div>


            </div>

       


    @endsection
