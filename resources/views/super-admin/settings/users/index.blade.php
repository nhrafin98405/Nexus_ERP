@extends('layouts.super-admin')



@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
    <h6 class="mb-0 text-uppercase">User Management</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Users List</h5>

                <a href="{{ route('super-admin.settings.users.create') }}" class="btn btn-light">
                    <i class="bx bx-plus"></i> Create User
                </a>
            </div>
            <div class="table-responsive">
                <table id="usersTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if ($user->profile_image)
                                        <img src="{{ asset('uploads/users/' . $user->profile_image) }}" width="45"
                                            height="45" class="rounded-circle" style="object-fit: cover;">
                                    @else
                                        <img src="{{ asset('assets/images/avatars/avatar-1.png') }}" width="45"
                                            height="45" class="rounded-circle">
                                    @endif
                                </td>

                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                <td>

                                    @foreach ($user->roles as $role)
                                        <span class="badge bg-primary">
                                            {{ $role->name }}
                                        </span>
                                    @endforeach

                                </td>
                                </td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>{{ $user->created_at->format('d M Y') }}</td>

                                <td>
                                    <div class="d-flex gap-1">

                                        <a href="{{ route('super-admin.settings.users.show', $user->id) }}"
                                            class="btn btn-sm btn-light">View</a>

                                        <a href="{{ route('super-admin.settings.users.edit', $user->id) }}"
                                            class="btn btn-sm btn-light">Edit</a>

                                        <form action="{{ route('super-admin.settings.users.destroy', $user->id) }}"
                                            method="POST" onsubmit="return confirm('Warning! Deleting this user cannot be undone. Are you sure?')">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-light">Delete</button>

                                        </form>

                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
