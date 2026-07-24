@extends('layouts.super-admin')

@section('title', 'Edit Designation')

@section('content')

<div class="page-breadcrumb d-flex align-items-center mb-3">

    <div class="breadcrumb-title pe-3">

        Settings

    </div>

    <div class="ps-3">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb mb-0 p-0">

                <li class="breadcrumb-item">

                    <a href="{{ route('super-admin.dashboard') }}">

                        <i class="bx bx-home-alt"></i>

                    </a>

                </li>

                <li class="breadcrumb-item">

                    HR

                </li>

                <li class="breadcrumb-item">

                    <a href="{{ route('super-admin.settings.designations.index') }}">

                        Designations

                    </a>

                </li>

                <li class="breadcrumb-item active">

                    Edit

                </li>

            </ol>

        </nav>

    </div>

</div>





@if(session('error'))

    <div class="alert alert-danger alert-dismissible fade show">

        {{ session('error') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

@endif





@if($errors->any())

    <div class="alert alert-danger">

        <strong>

            Please fix the following errors:

        </strong>

        <ul class="mb-0 mt-2">

            @foreach($errors->all() as $error)

                <li>

                    {{ $error }}

                </li>

            @endforeach

        </ul>

    </div>

@endif





<div class="card">

    <div class="card-header">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-0">

                    <i class="bx bx-edit me-2"></i>

                    Edit Designation

                </h5>

            </div>

            <div>

                <a
                    href="{{ route('super-admin.settings.designations.index') }}"
                    class="btn btn-secondary">

                    <i class="bx bx-arrow-back"></i>

                    Back

                </a>

            </div>

        </div>

    </div>





    <div class="card-body">

        <form
            action="{{ route('super-admin.settings.designations.update', $designation) }}"
            method="POST">

            @csrf

            @method('PUT')

            @include(
                'super-admin.settings.designations._form'
            )

        </form>

    </div>

</div>

@endsection