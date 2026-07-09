@extends('layouts.super-admin')

@section('content')
    <h6 class="mb-0 text-uppercase">Permissions</h6>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Permission List</h5>

                <a href="{{ route('super-admin.settings.permissions.create') }}" class="btn btn-light">
                    <i class="bx bx-plus"></i> Create Permission
                </a>
            </div>
            <div class="table-responsive">
                <table id="usersTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="60">#</th>
                            <th>Permission Name</th>
                            <th>Guard</th>
                            <th width="220">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $key => $permission)
                            <tr>
                                <td>{{ $permissions->firstItem() + $key }}</td>


                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>

                                <td>
                                    <div class="d-flex gap-1">

                                        <a href="{{ route('super-admin.settings.permissions.show', $permissions->id) }}"
                                            class="btn btn-sm btn-light">View</a>

                                        <a href="{{ route('super-admin.settings.permissions.edit', $permissions->id) }}"
                                            class="btn btn-sm btn-light">Edit</a>

                                        <form
                                            action="{{ route('super-admin.settings.permissions.destroy', $permissions->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Warning! Deleting this permissions cannot be undone. Are you sure?')">

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
                            <th width="60">#</th>
                            <th>Permission Name</th>
                            <th>Guard</th>
                            <th width="220">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
