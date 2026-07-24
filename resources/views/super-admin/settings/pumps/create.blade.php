@extends('layouts.super-admin')

@section('title', 'Create Pump')

@section('content')

@if ($errors->any())

    <div class="alert alert-danger alert-dismissible fade show">

        <ul class="mb-0">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

@endif

<h6 class="mb-0 text-uppercase">
    Pump Management
</h6>

<hr>

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            Create Pump
        </h5>

        <a
            href="{{ route('super-admin.settings.pumps.index') }}"
            class="btn btn-light">

            <i class="bx bx-arrow-back"></i>

            Back

        </a>

    </div>

    <div class="card-body">

        <form
            action="{{ route('super-admin.settings.pumps.store') }}"
            method="POST">

            @csrf

            @include('super-admin.settings.pumps._form')

        </form>

    </div>

</div>

@endsection