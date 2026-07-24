@extends('layouts.super-admin')

@section('title', 'Department Details')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h4 class="fw-bold mb-1">

            <i class="bx bx-building-house text-primary me-2"></i>

            Department Details

        </h4>

        <small class="text-muted">

            View complete department information.

        </small>

    </div>

    <div class="d-flex gap-2">

        <a
            href="{{ route('super-admin.settings.departments.index') }}"
            class="btn btn-light">

            <i class="bx bx-arrow-back"></i>

            Back

        </a>

        <a
            href="{{ route('super-admin.settings.departments.edit', $department) }}"
            class="btn btn-primary">

            <i class="bx bx-edit"></i>

            Edit

        </a>

    </div>

</div>



<div class="row">

    <div class="col-lg-8">

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="bx bx-building me-2 text-primary"></i>

                    Department Information

                </h5>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <strong>Name</strong>

                        <p class="mb-0">

                            {{ $department->name }}

                        </p>

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Department Code</strong>

                        <p class="mb-0">

                            <span class="badge bg-primary">

                                {{ $department->code }}

                            </span>

                        </p>

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Status</strong>

                        <p class="mb-0">

                            <span class="badge bg-{{ $department->status_badge }}">

                                {{ $department->status_text }}

                            </span>

                        </p>

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Sort Order</strong>

                        <p class="mb-0">

                            {{ $department->sort_order }}

                        </p>

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>System Department</strong>

                        <p class="mb-0">

                            @if($department->is_system)

                                <span class="badge bg-dark">

                                    Yes

                                </span>

                            @else

                                <span class="badge bg-secondary">

                                    No

                                </span>

                            @endif

                        </p>

                    </div>

                </div>

            </div>

        </div>



        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="bx bx-buildings me-2 text-success"></i>

                    Organization Information

                </h5>

            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <strong>Company</strong>

                        <p class="mb-0">

                            {{ $department->company->name ?? '-' }}

                        </p>

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Branch</strong>

                        <p class="mb-0">

                            {{ $department->branch->name ?? '-' }}

                        </p>

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Email</strong>

                        <p class="mb-0">

                            {{ $department->email ?: '-' }}

                        </p>

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Phone</strong>

                        <p class="mb-0">

                            {{ $department->phone ?: '-' }}

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <div class="col-lg-4">

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="bx bx-bar-chart-alt-2 me-2 text-warning"></i>

                    Statistics

                </h5>

            </div>

            <div class="card-body">

                <div class="d-flex justify-content-between mb-3">

                    <span>

                        Employees

                    </span>

                    <span class="badge bg-primary">

                        {{ $department->employee_count }}

                    </span>

                </div>

                <hr>

                <div class="d-flex justify-content-between">

                    <span>

                        Designations

                    </span>

                    <span class="badge bg-success">

                        {{ $department->designation_count }}

                    </span>

                </div>

            </div>

        </div>
                <div class="card shadow-sm border-0 mb-4">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="bx bx-detail me-2 text-info"></i>

                    Description

                </h5>

            </div>

            <div class="card-body">

                @if($department->description)

                    {!! nl2br(e($department->description)) !!}

                @else

                    <span class="text-muted">

                        No description available.

                    </span>

                @endif

            </div>

        </div>



        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="bx bx-history me-2 text-secondary"></i>

                    Audit Information

                </h5>

            </div>

            <div class="card-body">

                <div class="mb-3">

                    <strong>

                        Created By

                    </strong>

                    <p class="mb-0">

                        {{ $department->creator->name ?? '-' }}

                    </p>

                </div>

                <hr>

                <div class="mb-3">

                    <strong>

                        Updated By

                    </strong>

                    <p class="mb-0">

                        {{ $department->updater->name ?? '-' }}

                    </p>

                </div>

                <hr>

                <div class="mb-3">

                    <strong>

                        Created At

                    </strong>

                    <p class="mb-0">

                        {{ $department->created_at?->format('d M Y, h:i A') }}

                    </p>

                </div>

                <hr>

                <div>

                    <strong>

                        Last Updated

                    </strong>

                    <p class="mb-0">

                        {{ $department->updated_at?->format('d M Y, h:i A') }}

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection