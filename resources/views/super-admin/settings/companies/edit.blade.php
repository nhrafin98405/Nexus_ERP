@extends('layouts.super-admin')

@section('title', 'Edit Company')

@section('content')

<div class="card">

    <div class="card-header">
        <h5>Edit Company</h5>
    </div>

    <div class="card-body">

        <form action="{{ route('super-admin.settings.companies.update', $company->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            @include('super-admin.settings.companies._form')

        </form>

    </div>

</div>

@endsection