@extends('layouts.super-admin')

@section('content')

<div class="row">

    <div class="col-xl-8 mx-auto">

        <div class="card">

            <div class="card-header">
                <h4>User Details</h4>
            </div>


            <div class="card-body">

                <table class="table">
                    <tr>
    <th>Profile Image</th>

    <td>

        @if($user->profile_image)

            <img 
                src="{{ asset('uploads/users/'.$user->profile_image) }}"
                width="100"
                height="100"
                class="rounded-circle"
                style="object-fit: cover;"
            >

        @else

            <span class="text-muted">
                No Image
            </span>

        @endif

    </td>

</tr>

                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>


                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>


                    <tr>
                        <th>Role</th>
                        <td>
                            @foreach($user->roles as $role)

                                <span class="badge bg-primary">
                                    {{ $role->name }}
                                </span>

                            @endforeach
                        </td>
                    </tr>


                    <tr>
                        <th>Created</th>
                        <td>
                            {{ $user->created_at }}
                        </td>
                    </tr>


                </table>


    <div class="card-footer">

        <a href="{{ route('super-admin.settings.users.edit', $user->id) }}"
            class="btn btn-light">

            Edit User

        </a>

        <a href="{{ route('super-admin.settings.users.index') }}"
            class="btn btn-light">

            Back

        </a>

    </div>


            </div>

        </div>

    </div>

</div>


@endsection