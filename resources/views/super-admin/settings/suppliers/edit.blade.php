@extends('layouts.super-admin')

@section('title', 'Edit Supplier')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">

                <i class="bx bx-edit text-warning me-2"></i>

                Update Supplier

            </h4>

            <p class="text-muted mb-0">

                Update supplier information.

            </p>

        </div>

        <a href="{{ route('super-admin.settings.suppliers.index') }}" class="btn btn-light shadow-sm">

            <i class="bx bx-arrow-back me-1"></i>

            Back

        </a>

    </div>



    @if ($errors->any())

        <div class="alert alert-danger shadow-sm border-0">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif



    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">

            <h5 class="mb-0 fw-bold">

                <i class="bx bx-user me-2 text-primary"></i>

                Supplier Information

            </h5>

        </div>

        <div class="card-body">

            <form action="{{ route('super-admin.settings.suppliers.update', $supplier) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="row g-4">
                    {{-- ========================================= --}}
                    {{-- Organization --}}
                    {{-- ========================================= --}}

                    <div class="col-12">

                        <h6 class="fw-bold text-primary border-bottom pb-2">

                            Organization

                        </h6>

                    </div>



                    {{-- Company --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">

                            Company <span class="text-danger">*</span>

                        </label>

                        <select name="company_id" class="form-select @error('company_id') is-invalid @enderror">

                            <option value="">

                                Select Company

                            </option>

                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}"
                                    {{ old('company_id', $supplier->company_id) == $company->id ? 'selected' : '' }}>

                                    {{ $company->name }}

                                </option>
                            @endforeach

                        </select>

                        @error('company_id')
                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>
                        @enderror

                    </div>



                    {{-- Pump --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">

                            Pump <span class="text-danger">*</span>

                        </label>

                        <select name="pump_id" class="form-select @error('pump_id') is-invalid @enderror">

                            <option value="">

                                Select Pump

                            </option>

                            @foreach ($pumps as $pump)
                                <option value="{{ $pump->id }}"
                                    {{ old('pump_id', $supplier->pump_id) == $pump->id ? 'selected' : '' }}>

                                    {{ $pump->name }}

                                </option>
                            @endforeach

                        </select>

                        @error('pump_id')
                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>
                        @enderror

                    </div>
                    {{-- ========================================= --}}
                    {{-- Supplier Information --}}
                    {{-- ========================================= --}}

                    <div class="col-12 mt-2">

                        <h6 class="fw-bold text-primary border-bottom pb-2">

                            Supplier Information

                        </h6>

                    </div>



                    {{-- Supplier Name --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">

                            Supplier Name <span class="text-danger">*</span>

                        </label>

                        <input type="text" name="name" value="{{ old('name', $supplier->name) }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Enter supplier name">

                        @error('name')
                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>
                        @enderror

                    </div>



                    {{-- Supplier Code --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">

                            Supplier Code <span class="text-danger">*</span>

                        </label>

                        <input type="text" name="code" value="{{ old('code', $supplier->code) }}"
                            class="form-control @error('code') is-invalid @enderror" placeholder="SUP-001">

                        @error('code')
                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>
                        @enderror

                    </div>



                    {{-- Contact Person --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">

                            Contact Person

                        </label>

                        <input type="text" name="contact_person"
                            value="{{ old('contact_person', $supplier->contact_person) }}"
                            class="form-control @error('contact_person') is-invalid @enderror"
                            placeholder="Enter contact person">

                        @error('contact_person')
                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>
                        @enderror

                    </div>



                    {{-- Phone --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">

                            Mobile Number

                        </label>

                        <input type="text" name="phone" value="{{ old('phone', $supplier->phone) }}"
                            class="form-control @error('phone') is-invalid @enderror" placeholder="01XXXXXXXXX">

                        @error('phone')
                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>
                        @enderror

                    </div>



                    {{-- Email --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">

                            Email Address

                        </label>

                        <input type="email" name="email" value="{{ old('email', $supplier->email) }}"
                            class="form-control @error('email') is-invalid @enderror" placeholder="supplier@example.com">

                        @error('email')
                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>
                        @enderror

                    </div>
                    {{-- ========================================= --}}
                    {{-- Business Information --}}
                    {{-- ========================================= --}}

                    <div class="col-12 mt-2">

                        <h6 class="fw-bold text-primary border-bottom pb-2">

                            Business Information

                        </h6>

                    </div>



                    {{-- Trade License --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">

                            Trade License

                        </label>

                        <input type="text" name="trade_license"
                            value="{{ old('trade_license', $supplier->trade_license) }}"
                            class="form-control @error('trade_license') is-invalid @enderror"
                            placeholder="Trade License Number">

                        @error('trade_license')
                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>
                        @enderror

                    </div>



                    {{-- TIN Number --}}

                    <div class="col-lg-6">

                        <label class="form-label fw-semibold">

                            TIN Number

                        </label>

                        <input type="text" name="tin" value="{{ old('tin', $supplier->tin) }}"
                            class="form-control @error('tin') is-invalid @enderror" placeholder="TIN Number">

                        @error('tin')
                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>
                        @enderror

                    </div>



                    {{-- Address --}}

                    <div class="col-12">

                        <label class="form-label fw-semibold">

                            Address

                        </label>

                        <textarea name="address" rows="4" class="form-control @error('address') is-invalid @enderror"
                            placeholder="Supplier address...">{{ old('address', $supplier->address) }}</textarea>

                        @error('address')
                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>
                        @enderror

                    </div>
                    {{-- ========================================= --}}
                    {{-- Accounts & Status --}}
                    {{-- ========================================= --}}

                    <div class="col-12 mt-2">

                        <h6 class="fw-bold text-primary border-bottom pb-2">

                            Accounts & Status

                        </h6>

                    </div>



                    {{-- Opening Balance --}}

                    <div class="col-lg-4">

                        <label class="form-label fw-semibold">

                            Opening Balance

                        </label>

                        <input type="number" step="0.01" min="0" name="opening_balance"
                            value="{{ old('opening_balance', $supplier->opening_balance) }}"
                            class="form-control @error('opening_balance') is-invalid @enderror" placeholder="0.00">

                        @error('opening_balance')
                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>
                        @enderror

                    </div>



                    {{-- Balance Type --}}

                    <div class="col-lg-4">

                        <label class="form-label fw-semibold">

                            Balance Type

                        </label>

                        <select name="balance_type" class="form-select @error('balance_type') is-invalid @enderror">

                            <option value="Payable"
                                {{ old('balance_type', $supplier->balance_type) == 'Payable' ? 'selected' : '' }}>

                                Payable

                            </option>

                            <option value="Receivable"
                                {{ old('balance_type', $supplier->balance_type) == 'Receivable' ? 'selected' : '' }}>

                                Receivable

                            </option>

                        </select>

                        @error('balance_type')
                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>
                        @enderror

                    </div>



                    {{-- Status --}}

                    <div class="col-lg-4">

                        <label class="form-label fw-semibold">

                            Status

                        </label>

                        <select name="status" class="form-select @error('status') is-invalid @enderror">

                            <option value="1" {{ old('status', $supplier->status) == 1 ? 'selected' : '' }}>

                                Active

                            </option>

                            <option value="0" {{ old('status', $supplier->status) == 0 ? 'selected' : '' }}>

                                Inactive

                            </option>

                        </select>

                        @error('status')
                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>
                        @enderror

                    </div>



                </div>

                <hr class="my-4">

                <div class="d-flex justify-content-end gap-2">

                    <a href="{{ route('super-admin.settings.suppliers.index') }}" class="btn btn-light px-4">

                        <i class="bx bx-arrow-back me-1"></i>

                        Cancel

                    </a>

                    <button type="submit" class="btn btn-warning px-4">

                        <i class="bx bx-save me-1"></i>

                        Update Supplier

                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection
