@extends('layouts.super-admin')

@section('title', 'Departments')

@section('content')

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

    <i class="bx bx-check-circle me-2"></i>

    {{ session('success') }}

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"></button>

</div>

@endif

@if(session('error'))

<div class="alert alert-danger alert-dismissible fade show">

    <i class="bx bx-error-circle me-2"></i>

    {{ session('error') }}

    <button
        type="button"
        class="btn-close"
        data-bs-dismiss="alert"></button>

</div>

@endif



<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h4 class="fw-bold mb-1">

            <i class="bx bx-building-house me-2 text-primary"></i>

            Department Management

        </h4>

        <small class="text-muted">

            Manage all company departments.

        </small>

    </div>

    <a
        href="{{ route('super-admin.settings.departments.create') }}"
        class="btn btn-primary">

        <i class="bx bx-plus"></i>

        Create Department

    </a>

</div>



<div class="card shadow-sm border-0">

    <div class="card-body">

        <form
            method="GET"
            class="row g-3 mb-4">

            <div class="col-md-4">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control"
                    placeholder="Search Department...">

            </div>

            <div class="col-md-3">

                <select
                    name="status"
                    class="form-select">

                    <option value="">

                        All Status

                    </option>

                    <option
                        value="1"
                        {{ request('status')=='1' ? 'selected' : '' }}>

                        Active

                    </option>

                    <option
                        value="0"
                        {{ request('status')=='0' ? 'selected' : '' }}>

                        Inactive

                    </option>

                </select>

            </div>

            <div class="col-md-3">

                <button
                    class="btn btn-primary">

                    <i class="bx bx-search"></i>

                    Search

                </button>

                <a
                    href="{{ route('super-admin.settings.departments.index') }}"
                    class="btn btn-light">

                    Reset

                </a>

            </div>

        </form>



        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead class="table-light">

                    <tr>

                        <th width="60">

                            #

                        </th>

                        <th>

                            Department

                        </th>

                        <th>

                            Branch

                        </th>

                        <th>

                            Contact

                        </th>

                        <th>

                            Employees

                        </th>

                        <th>

                            Status

                        </th>

                        <th width="80" class="text-center">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>
                    @if($departments->count())

    @foreach($departments as $key => $department)

        @include('super-admin.settings.components.delete-modal', [

            'id' => 'deleteDepartment'.$department->id,

            'action' => route(
                'super-admin.settings.departments.destroy',
                $department
            ),

            'message' => 'Are you sure you want to delete this department?',

        ])

        <tr>

            <td>

                {{ $departments->firstItem() + $key }}

            </td>

            <td>

                <strong>

                    {{ $department->name }}

                </strong>

                <br>

                <small class="text-muted">

                    {{ $department->code }}

                </small>

            </td>

            <td>

                {{ $department->branch->name ?? '-' }}

            </td>

            <td>

                {{ $department->phone ?: '-' }}

                <br>

                <small class="text-muted">

                    {{ $department->email ?: '-' }}

                </small>

            </td>

            <td>

                <span class="badge bg-info">

                    {{ $department->employee_count }}

                </span>

            </td>

            <td>

                <span class="badge bg-{{ $department->status_badge }}">

                    {{ $department->status_text }}

                </span>

            </td>

            <td class="text-center">

                <div class="dropdown">

                    <button
                        class="btn btn-light btn-sm"
                        data-bs-toggle="dropdown">

                        <i class="bx bx-dots-vertical-rounded"></i>

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>

                            <a
                                class="dropdown-item"
                                href="{{ route('super-admin.settings.departments.show', $department) }}">

                                <i class="bx bx-show me-2"></i>

                                View

                            </a>

                        </li>

                        <li>

                            <a
                                class="dropdown-item"
                                href="{{ route('super-admin.settings.departments.edit', $department) }}">

                                <i class="bx bx-edit me-2"></i>

                                Edit

                            </a>

                        </li>

                        <li>

                            <button
                                type="button"
                                class="dropdown-item text-danger"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteDepartment{{ $department->id }}">

                                <i class="bx bx-trash me-2"></i>

                                Delete

                            </button>

                        </li>

                    </ul>

                </div>

            </td>

        </tr>

    @endforeach

@else

<tr>

    <td
        colspan="7"
        class="text-center py-5">

        <i class="bx bx-folder-open display-5 text-secondary"></i>

        <h6 class="mt-3">

            No Department Found

        </h6>

        <p class="text-muted">

            Click on "Create Department" to add your first department.

        </p>

    </td>

</tr>

@endif

</tbody>

</table>

</div>

@if($departments->hasPages())

<div class="mt-4">

    {{ $departments->links() }}

</div>

@endif

</div>

</div>

@endsection