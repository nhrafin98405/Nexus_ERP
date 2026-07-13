@extends('layouts.super-admin')

@section('title', 'Edit Department')

@section('content')

@if ($errors->any())

<div class="alert alert-danger">

    <ul class="mb-0">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="card">

    <div class="card-header">

        <h5>Edit Department</h5>

    </div>

    <div class="card-body">

        <form
            action="{{ route('super-admin.settings.departments.update', $department->id) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('super-admin.settings.departments._form')

        </form>

    </div>

</div>

@endsection