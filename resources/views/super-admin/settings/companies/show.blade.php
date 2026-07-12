@extends('layouts.super-admin')

@section('title', 'Company Details')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            Company Details
        </h5>

        <a href="{{ route('super-admin.settings.companies.index') }}"
           class="btn btn-light">

            Back

        </a>

    </div>

    <div class="card-body">

        <h4>{{ $company->name }}</h4>

        <hr>

        <p><strong>Code:</strong> {{ $company->code }}</p>

        <p><strong>Email:</strong> {{ $company->email ?? '-' }}</p>

        <p><strong>Phone:</strong> {{ $company->phone ?? '-' }}</p>

        <p><strong>Website:</strong> {{ $company->website ?? '-' }}</p>

        <p><strong>Trade License:</strong> {{ $company->trade_license ?? '-' }}</p>

        <p><strong>BIN:</strong> {{ $company->bin ?? '-' }}</p>

        <p><strong>TIN:</strong> {{ $company->tin ?? '-' }}</p>

        <p><strong>Address:</strong> {{ $company->address ?? '-' }}</p>

        <p>
            <strong>Status:</strong>

            @if($company->status)
                <span class="badge bg-success">Active</span>
            @else
                <span class="badge bg-danger">Inactive</span>
            @endif
        </p>

    </div>

</div>

@endsection