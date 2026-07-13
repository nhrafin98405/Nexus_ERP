@extends('layouts.super-admin')

@section('title', 'Departments')

@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">

        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>
@endif

<h6 class="mb-0 text-uppercase">
    Department Management
</h6>

<hr>

<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h5 class="mb-0">
                Department List
            </h5>

            <a href="{{ route('super-admin.settings.departments.create') }}"
               class="btn btn-light">

                <i class="bx bx-plus"></i>

                Create Department

            </a>

        </div>

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Branch</th>

                        <th>Department</th>

                        <th>Code</th>

                        <th>Contact</th>

                        <th>Status</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                @foreach ($departments as $key => $department)

                    @include('super-admin.settings.components.delete-modal', [

                        'id' => 'deleteDepartment' . $department->id,

                        'action' => route('super-admin.settings.departments.destroy', $department),

                        'message' => 'Are you sure you want to delete this department?',

                    ])

                    <tr>

                        <td>

                            {{ $departments->firstItem() + $key }}

                        </td>

                        <td>

                            {{ $department->branch->name }}

                        </td>

                        <td>

                            <strong>

                                {{ $department->name }}

                            </strong>

                            <br>

                            <small>

                                {{ $department->description }}

                            </small>

                        </td>

                        <td>

                            <span class="badge bg-info">

                                {{ $department->code }}

                            </span>

                        </td>

                        <td>

                            {{ $department->phone }}

                            <br>

                            <small>

                                {{ $department->email }}

                            </small>

                        </td>

                        <td>

                            @if ($department->status)

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

                                <a href="{{ route('super-admin.settings.departments.show', $department) }}"
                                   class="btn btn-sm btn-light">

                                    View

                                </a>

                                <a href="{{ route('super-admin.settings.departments.edit', $department) }}"
                                   class="btn btn-sm btn-light">

                                    Edit

                                </a>

                                <button type="button"
                                        class="btn btn-sm btn-light"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteDepartment{{ $department->id }}">

                                    Delete

                                </button>

                            </div>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

        @if($departments->hasPages())

            <div class="mt-3">

                {{ $departments->links() }}

            </div>

        @endif

    </div>

</div>

@endsection