@extends('layouts.super-admin')

@section('title','Supplier Details')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h4 class="fw-bold mb-1">

            <i class="bx bx-user text-primary me-2"></i>

            Supplier Details

        </h4>

        <p class="text-muted mb-0">

            View supplier profile and account information.

        </p>

    </div>

    <div class="d-flex gap-2">

        <a href="{{ route('super-admin.settings.suppliers.edit',$supplier) }}"
           class="btn btn-warning shadow-sm">

            <i class="bx bx-edit me-1"></i>

            Edit

        </a>

        <a href="{{ route('super-admin.settings.suppliers.index') }}"
           class="btn btn-light shadow-sm">

            <i class="bx bx-arrow-back me-1"></i>

            Back

        </a>

    </div>

</div>



<div class="row g-4">
    {{-- ========================================= --}}
{{-- Supplier Profile --}}
{{-- ========================================= --}}

<div class="col-lg-4">

    <div class="card shadow-sm border-0 h-100">

        <div class="card-body text-center">

            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                 style="width:100px;height:100px;">

                <i class="bx bx-user text-primary display-4"></i>

            </div>

            <h4 class="fw-bold mb-1">

                {{ $supplier->name }}

            </h4>

            <span class="badge bg-secondary px-3 py-2">

                {{ $supplier->code }}

            </span>

            <div class="mt-3">

                @if($supplier->status)

                    <span class="badge bg-success px-3 py-2">

                        Active

                    </span>

                @else

                    <span class="badge bg-danger px-3 py-2">

                        Inactive

                    </span>

                @endif

            </div>

            <hr>

            <div class="text-start">

                <div class="mb-3">

                    <small class="text-muted d-block">

                        Contact Person

                    </small>

                    <strong>

                        {{ $supplier->contact_person ?: '-' }}

                    </strong>

                </div>

                <div class="mb-3">

                    <small class="text-muted d-block">

                        Mobile Number

                    </small>

                    <strong>

                        {{ $supplier->phone ?: '-' }}

                    </strong>

                </div>

                <div>

                    <small class="text-muted d-block">

                        Email Address

                    </small>

                    <strong>

                        {{ $supplier->email ?: '-' }}

                    </strong>

                </div>

            </div>

        </div>

    </div>

</div>
{{-- ========================================= --}}
{{-- Supplier Information --}}
{{-- ========================================= --}}

<div class="col-lg-8">

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <h5 class="fw-bold mb-4">

                <i class="bx bx-info-circle text-primary me-2"></i>

                Supplier Information

            </h5>

            <div class="row g-3">

                {{-- Company --}}

                <div class="col-md-6">

                    <div class="border rounded p-3 h-100">

                        <small class="text-muted d-block">

                            Company

                        </small>

                        <h6 class="mb-0">

                            {{ $supplier->company->name ?? '-' }}

                        </h6>

                    </div>

                </div>



                {{-- Pump --}}

                <div class="col-md-6">

                    <div class="border rounded p-3 h-100">

                        <small class="text-muted d-block">

                            Pump

                        </small>

                        <h6 class="mb-0">

                            {{ $supplier->pump->name ?? '-' }}

                        </h6>

                    </div>

                </div>



                {{-- Trade License --}}

                <div class="col-md-6">

                    <div class="border rounded p-3 h-100">

                        <small class="text-muted d-block">

                            Trade License

                        </small>

                        <h6 class="mb-0">

                            {{ $supplier->trade_license ?: '-' }}

                        </h6>

                    </div>

                </div>



                {{-- TIN --}}

                <div class="col-md-6">

                    <div class="border rounded p-3 h-100">

                        <small class="text-muted d-block">

                            TIN Number

                        </small>

                        <h6 class="mb-0">

                            {{ $supplier->tin ?: '-' }}

                        </h6>

                    </div>

                </div>



                {{-- Address --}}

                <div class="col-12">

                    <div class="border rounded p-3">

                        <small class="text-muted d-block mb-2">

                            Address

                        </small>

                        {{ $supplier->address ?: '-' }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>
{{-- ========================================= --}}
{{-- Account Summary --}}
{{-- ========================================= --}}

<div class="row g-4 mt-2">

    {{-- Opening Balance --}}

    <div class="col-lg-4">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Opening Balance

                        </small>

                        <h3 class="fw-bold mb-0">

                            ৳ {{ number_format($supplier->opening_balance,2) }}

                        </h3>

                    </div>

                    <div class="bg-primary bg-opacity-10 rounded-circle p-3">

                        <i class="bx bx-wallet text-primary fs-2"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- Balance Type --}}

    <div class="col-lg-4">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Balance Type

                        </small>

                        <h4 class="fw-bold mb-0">

                            @if($supplier->balance_type == 'Payable')

                                <span class="badge bg-danger px-3 py-2">

                                    Payable

                                </span>

                            @else

                                <span class="badge bg-success px-3 py-2">

                                    Receivable

                                </span>

                            @endif

                        </h4>

                    </div>

                    <div class="bg-warning bg-opacity-10 rounded-circle p-3">

                        <i class="bx bx-transfer text-warning fs-2"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>



    {{-- Status --}}

    <div class="col-lg-4">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">

                            Current Status

                        </small>

                        <h4 class="fw-bold mb-0">

                            @if($supplier->status)

                                <span class="badge bg-success px-3 py-2">

                                    Active

                                </span>

                            @else

                                <span class="badge bg-danger px-3 py-2">

                                    Inactive

                                </span>

                            @endif

                        </h4>

                    </div>

                    <div class="bg-success bg-opacity-10 rounded-circle p-3">

                        <i class="bx bx-check-circle text-success fs-2"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
{{-- ========================================= --}}
{{-- Audit Information --}}
{{-- ========================================= --}}

<div class="card shadow-sm border-0 mt-4">

    <div class="card-body">

        <h5 class="fw-bold mb-4">

            <i class="bx bx-history text-primary me-2"></i>

            Audit Information

        </h5>

        <div class="row g-4">

            <div class="col-md-3">

                <small class="text-muted d-block">

                    Created By

                </small>

                <strong>

                    {{ optional($supplier->creator)->name ?? '-' }}

                </strong>

            </div>

            <div class="col-md-3">

                <small class="text-muted d-block">

                    Updated By

                </small>

                <strong>

                    {{ optional($supplier->updater)->name ?? '-' }}

                </strong>

            </div>

            <div class="col-md-3">

                <small class="text-muted d-block">

                    Created At

                </small>

                <strong>

                    {{ $supplier->created_at?->format('d M Y h:i A') }}

                </strong>

            </div>

            <div class="col-md-3">

                <small class="text-muted d-block">

                    Updated At

                </small>

                <strong>

                    {{ $supplier->updated_at?->format('d M Y h:i A') }}

                </strong>

            </div>

        </div>

    </div>

</div>

@endsection