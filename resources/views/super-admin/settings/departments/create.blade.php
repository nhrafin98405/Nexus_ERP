@extends('layouts.super-admin')

@section('title', 'Create Department')

@section('content')

@if ($errors->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<div class="card">

    <div class="card-header">

        <h5>Create Department</h5>

    </div>

    <div class="card-body">

        <form
            action="{{ route('super-admin.settings.departments.store') }}"
            method="POST">

            @csrf

            @include('super-admin.settings.departments._form')

        </form>

    </div>

</div>

@endsection