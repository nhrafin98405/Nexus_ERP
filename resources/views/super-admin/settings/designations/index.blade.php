@extends('layouts.super-admin')

@section('title', 'Designations')

@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">

        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>
@endif

<h6 class="mb-0 text-uppercase">
    Designation Management
</h6>

<hr>

<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h5 class="mb-0">
                Designation List
            </h5>

            <a href="{{ route('super-admin.settings.designations.create') }}"
               class="btn btn-light">

                <i class="bx bx-plus"></i>

                Create Designation

            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Department</th>

                        <th>Designation</th>

                        <th>Code</th>

                        <th>Contact</th>

                        <th>Status</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                @foreach ($designations as $key => $designation)

                    @include('super-admin.settings.components.delete-modal', [

                        'id' => 'deleteDesignation' . $designation->id,

                        'action' => route('super-admin.settings.designations.destroy', $designation),

                        'message' => 'Are you sure you want to delete this designation?',

                    ])

                    <tr>

                        <td>

                            {{ $designations->firstItem() + $key }}

                        </td>

                        <td>

                            {{ $designation->department->name }}

                        </td>

                        <td>

                            <strong>

                                {{ $designation->name }}

                            </strong>

                            <br>

                            <small>

                                {{ $designation->description }}

                            </small>

                        </td>

                        <td>

                            <span class="badge bg-info">

                                {{ $designation->code }}

                            </span>

                        </td>

                        <td>

                            {{ $designation->phone }}

                            <br>

                            <small>

                                {{ $designation->email }}

                            </small>

                        </td>

                        <td>

                            @if ($designation->status)

                                <span class="badge bg-success">

                                    Active

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Inactive

                                </span>

                            @endif

                        </td>

                        <td>

                            <div class="d-flex gap-1">

                                <a href="{{ route('super-admin.settings.designations.show', $designation) }}"
                                   class="btn btn-sm btn-light">

                                    View

                                </a>

                                <a href="{{ route('super-admin.settings.designations.edit', $designation) }}"
                                   class="btn btn-sm btn-light">

                                    Edit

                                </a>

                                <button type="button"
                                        class="btn btn-sm btn-light"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteDesignation{{ $designation->id }}">

                                    Delete

                                </button>

                            </div>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

        @if($designations->hasPages())

            <div class="mt-3">

                {{ $designations->links() }}

            </div>

        @endif

    </div>

</div>

@endsection