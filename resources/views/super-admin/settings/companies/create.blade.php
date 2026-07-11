@extends('layouts.super-admin')

@section('title', 'Create Company')

@section('content')

<div class="card">

    <div class="card-header">
        <h5>Create Company</h5>
    </div>

    <div class="card-body">

        <form action="{{ route('super-admin.settings.companies.store') }}" 
              method="POST"
              enctype="multipart/form-data">

            @csrf

            @include('super-admin.settings.companies._form')

        </form>

    </div>

</div>

@endsection