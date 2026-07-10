@extends('layouts.super-admin')

@section('content')
    <div class="container">


        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Roles</h3>

            <a href="{{ route('super-admin.settings.roles.create') }}" class="btn btn-light">
                Add Role
            </a>
        </div>


        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


        <div class="card">

            <div class="card-body">

                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>System</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>

                        @forelse($roles as $key => $role)
                            @include('super-admin.settings.components.delete-modal', [
                                'id' => 'deleteRole' . $role->id,
                                'action' => route('super-admin.settings.roles.destroy', $role),
                                'message' => 'Are you sure you want to delete this role?',
                            ])

                            <tr>

                                <td>
                                    {{ $roles->firstItem() + $key }}
                                </td>

                                <td>
                                    {{ $role->name }}
                                </td>


                                <td>
                                    {{ $role->slug }}
                                </td>


                                <td>

                                    @if ($role->status)
                                        <span class="badge rounded-pill bg-light">
                                            Active
                                        </span>
                                    @else
                                        <span class="badge rounded-pill bg-light">
                                            Inactive
                                        </span>
                                    @endif

                                </td>


                                <td>

                                    @if ($role->is_system)
                                        <span class="badge rounded-pill  bg-danger">
                                            System
                                        </span>
                                    @else
                                        <span class="badge rounded-pill bg-light">
                                            Custom
                                        </span>
                                    @endif

                                </td>


                                <td>


                                    <a href="{{ route('super-admin.settings.roles.edit', $role->id) }}"
                                        class="btn btn-sm btn-light">
                                        Edit
                                    </a>


                                    <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                        data-bs-target="#deleteRole{{ $role->id }}">
                                        Delete
                                    </button>


                                </td>

                            </tr>


                        @empty

                            <tr>
                                <td colspan="6" class="text-center">
                                    No roles found
                                </td>
                            </tr>
                        @endforelse


                    </tbody>

                </table>


                {{ $roles->links() }}


            </div>

        </div>


    </div>
@endsection
