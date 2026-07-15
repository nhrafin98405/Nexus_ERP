@extends('layouts.super-admin')

@section('content')
<div class="container">

    <h3>Employee Attendance Scan</h3>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <form action="{{ route('super-admin.settings.attendances.storeScan') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label>
                Employee Code
            </label>

            <input
                type="text"
                name="employee_code"
                class="form-control"
                placeholder="EMP-00001"
                autofocus
                required
            >

        </div>


        <button class="btn btn-light">
            Scan
        </button>


        <a href="{{ route('super-admin.settings.attendances.index') }}"
           class="btn btn-secondary ms-2">
            Back
        </a>


    </form>

</div>
@endsection