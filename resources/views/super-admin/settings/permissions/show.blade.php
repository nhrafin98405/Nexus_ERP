@extends('layouts.super-admin')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Permission Details</h5>

       
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="200">ID</th>
                <td>{{ $permission->id }}</td>
            </tr>

            <tr>
                <th>Permission Name</th>
                <td>{{ $permission->name }}</td>
            </tr>

            <tr>
                <th>Guard Name</th>
                <td>{{ $permission->guard_name }}</td>
            </tr>

            <tr>
                <th>Created At</th>
                <td>{{ $permission->created_at->format('d M Y, h:i A') }}</td>
            </tr>

            <tr>
                <th>Updated At</th>
                <td>{{ $permission->updated_at->format('d M Y, h:i A') }}</td>
            </tr>

        </table>

    </div>

    <div class="card-footer">

        <a href="{{ route('super-admin.settings.permissions.edit', $permission->id) }}"
            class="btn btn-light">

            Edit Permission

        </a>

        <a href="{{ route('super-admin.settings.permissions.index') }}"
            class="btn btn-light">

            Back

        </a>

    </div>

</div>

@endsection