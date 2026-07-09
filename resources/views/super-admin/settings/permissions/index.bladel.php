@extends('layouts.super-admin')

@section('content')

<div class="page-wrapper">
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Permission List</h4>

            <a href="{{ route('permissions.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i> Add Permission
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th width="60">#</th>
                                <th>Permission Name</th>
                                <th>Guard</th>
                                <th width="220">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        @forelse($permissions as $key => $permission)

                            <tr>

                                <td>{{ $permissions->firstItem() + $key }}</td>

                                <td>{{ $permission->name }}</td>

                                <td>{{ $permission->guard_name }}</td>

                                <td>

                                    <a href="{{ route('permissions.show',$permission->id) }}"
                                        class="btn btn-info btn-sm">
                                        Show
                                    </a>

                                    <a href="{{ route('permissions.edit',$permission->id) }}"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('permissions.destroy',$permission->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Are you sure?')"
                                            class="btn btn-danger btn-sm">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="text-center">
                                    No Permission Found
                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>
                </div>

                <div class="mt-3">
                    {{ $permissions->links() }}
                </div>

            </div>
        </div>

    </div>
</div>

@endsection