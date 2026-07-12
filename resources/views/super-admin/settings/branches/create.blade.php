@extends('layouts.super-admin')

@section('title','Create Branch')

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

        <h5>Create Branch</h5>

    </div>

    <div class="card-body">

        <form
            action="{{ route('super-admin.settings.branches.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            @include('super-admin.settings.branches._form')

        </form>

    </div>

</div>

@endsection