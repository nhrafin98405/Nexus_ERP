@extends('layouts.super-admin')

@section('title', 'Designation Details')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">

            <i class="bx bx-id-card me-2"></i>

            Designation Details

        </h5>

        <div>

            <a href="{{ route('super-admin.settings.designations.index') }}"
               class="btn btn-light">

                <i class="bx bx-arrow-back"></i>

                Back

            </a>

            <a href="{{ route('super-admin.settings.designations.edit', $designation) }}"
               class="btn btn-light">

                <i class="bx bx-edit"></i>

                Edit

            </a>

        </div>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-12">

                <h4 class="mb-3">

                    {{ $designation->name }}

                </h4>

                <hr>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <strong>Designation Code</strong>

                        <br>

                        {{ $designation->code }}

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Status</strong>

                        <br>

                        @if ($designation->status)

                            <span class="badge bg-success">

                                Active

                            </span>

                        @else

                            <span class="badge bg-danger">

                                Inactive

                            </span>

                        @endif

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Department</strong>

                        <br>

                        {{ $designation->department->name }}

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Branch</strong>

                        <br>

                        {{ $designation->department->branch->name }}

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Company</strong>

                        <br>

                        {{ $designation->department->branch->company->name }}

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Email</strong>

                        <br>

                        {{ $designation->email ?? '-' }}

                    </div>

                    <div class="col-md-6 mb-3">

                        <strong>Phone</strong>

                        <br>

                        {{ $designation->phone ?? '-' }}

                    </div>

                </div>

            </div>

        </div>

        <hr class="my-5">

        <h5 class="mb-3">

            <i class="bx bx-detail me-2"></i>

            Description

        </h5>

        <div class="border rounded p-3">

            {{ $designation->description ?? '-' }}

        </div>

        <hr class="my-5">

        <h5 class="mb-3">

            <i class="bx bx-info-circle me-2"></i>

            System Information

        </h5>

        <div class="row">

            <div class="col-md-6 mb-3">

                <strong>Created At</strong>

                <br>

                {{ $designation->created_at->format('d M Y, h:i A') }}

            </div>

            <div class="col-md-6 mb-3">

                <strong>Last Updated</strong>

                <br>

                {{ $designation->updated_at->format('d M Y, h:i A') }}

            </div>

        </div>

    </div>

</div>

@endsection