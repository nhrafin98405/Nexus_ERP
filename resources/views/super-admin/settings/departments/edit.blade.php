@extends('layouts.super-admin')

@section('title', 'Edit Department')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h4 class="fw-bold mb-1">

            <i class="bx bx-edit text-warning me-2"></i>

            Edit Department

        </h4>

        <p class="text-muted mb-0">

            Update department information.

        </p>

    </div>

    <a
        href="{{ route('super-admin.settings.departments.index') }}"
        class="btn btn-light shadow-sm">

        <i class="bx bx-arrow-back me-1"></i>

        Back

    </a>

</div>



@if ($errors->any())

    <div class="alert alert-danger alert-dismissible fade show">

        <strong>

            Please fix the following errors:

        </strong>

        <ul class="mb-0 mt-2">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"></button>

    </div>

@endif



<div class="card shadow-sm border-0">

    <div class="card-header bg-white">

        <h5 class="mb-0 fw-bold">

            <i class="bx bx-building-house me-2 text-primary"></i>

            Department Information

        </h5>

    </div>

    <div class="card-body">

        <form
            action="{{ route('super-admin.settings.departments.update', $department) }}"
            method="POST">

            @csrf

            @method('PUT')

            @include('super-admin.settings.departments._form')

        </form>

    </div>

</div>

@endsection