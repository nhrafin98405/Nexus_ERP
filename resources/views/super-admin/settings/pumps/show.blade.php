@extends('layouts.app')

@section('title','Pump Details')

@section('content')

<div class="page-breadcrumb d-flex justify-content-between align-items-center mb-4">

    <h4 class="mb-0">

        Pump Details

    </h4>

    <a href="{{ route('pumps.index') }}"
       class="btn btn-secondary">

        <i class="bx bx-arrow-back"></i>

        Back

    </a>

</div>



<div class="row">

    {{-- =========================
        Pump Information
    ========================== --}}

    <div class="col-lg-8">

        <div class="card radius-10">

            <div class="card-header">

                <h5>

                    Pump Information

                </h5>

            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>

                        <th width="200">

                            Pump Name

                        </th>

                        <td>

                            {{ $pump->name }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Pump Code

                        </th>

                        <td>

                            {{ $pump->code }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Owner

                        </th>

                        <td>

                            {{ $pump->owner_name }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Phone

                        </th>

                        <td>

                            {{ $pump->phone }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Email

                        </th>

                        <td>

                            {{ $pump->email }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Address

                        </th>

                        <td>

                            {{ $pump->address }}

                        </td>

                    </tr>

                    <tr>

                        <th>

                            Status

                        </th>

                        <td>

                            @if($pump->status)

                                <span class="badge bg-success">

                                    Active

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Inactive

                                </span>

                            @endif

                        </td>

                    </tr>

                </table>

            </div>

        </div>

    </div>



    {{-- =========================
        Statistics
    ========================== --}}

    <div class="col-lg-4">

        <div class="card radius-10">

            <div class="card-header">

                <h5>

                    Statistics

                </h5>

            </div>

            <div class="card-body">

                <div class="mb-3">

                    <h3>

                        {{ $totalTank }}

                    </h3>

                    <small>

                        Total Tanks

                    </small>

                </div>

                <hr>

                <div>

                    <h3>

                        {{ $totalEmployee }}

                    </h3>

                    <small>

                        Employees

                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection