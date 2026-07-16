@extends('layouts.super-admin')

@section('title', 'Edit Pump')

@section('content')

{{-- ==========================================================
    Page Header
========================================================== --}}

<div class="page-breadcrumb d-flex align-items-center mb-3">

    <div class="breadcrumb-title pe-3">

        Edit Pump

    </div>

    <div class="ms-auto">

        <a href="{{ route('pumps.index') }}" class="btn btn-secondary">

            <i class="bx bx-arrow-back"></i>

            Back

        </a>

    </div>

</div>

{{-- ==========================================================
    Validation Errors
========================================================== --}}

@if ($errors->any())

<div class="alert alert-danger">

    <ul class="mb-0">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

{{-- ==========================================================
    Edit Pump Form
========================================================== --}}

<div class="card radius-10">

    <div class="card-header">

        <h5 class="mb-0">

            Edit Pump

        </h5>

    </div>

    <div class="card-body">

        <form action="{{ route('pumps.update',$pump->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                {{-- Pump Name --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Pump Name

                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name',$pump->name) }}"
                        class="form-control"
                        required>

                </div>

                {{-- Pump Code --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Pump Code

                    </label>

                    <input
                        type="text"
                        name="code"
                        value="{{ old('code',$pump->code) }}"
                        class="form-control"
                        required>

                </div>

                {{-- Owner --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Owner Name

                    </label>

                    <input
                        type="text"
                        name="owner_name"
                        value="{{ old('owner_name',$pump->owner_name) }}"
                        class="form-control">

                </div>

                {{-- Phone --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Phone

                    </label>

                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone',$pump->phone) }}"
                        class="form-control">

                </div>

                {{-- Email --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email',$pump->email) }}"
                        class="form-control">

                </div>

                {{-- Status --}}
                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        Status

                    </label>

                    <select
                        name="status"
                        class="form-select">

                        <option value="1" {{ $pump->status ? 'selected' : '' }}>

                            Active

                        </option>

                        <option value="0" {{ !$pump->status ? 'selected' : '' }}>

                            Inactive

                        </option>

                    </select>

                </div>

                {{-- Address --}}
                <div class="col-md-12 mb-3">

                    <label class="form-label">

                        Address

                    </label>

                    <textarea
                        name="address"
                        rows="4"
                        class="form-control">{{ old('address',$pump->address) }}</textarea>

                </div>

            </div>

            <div class="text-end">

                <a href="{{ route('pumps.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

                <button
                    type="submit"
                    class="btn btn-primary">

                    Update Pump

                </button>

            </div>

        </form>

    </div>

</div>

@endsection