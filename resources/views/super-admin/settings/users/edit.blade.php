@extends('layouts.super-admin')

@section('content')

<h6 class="mb-0 text-uppercase">Edit User</h6>
<hr />

<div class="card">

    <div class="card-body">

        <form action="{{ route('super-admin.settings.users.update', $user->id) }}" 
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')


            <div class="mb-3">
                <label class="form-label">
                    Name
                </label>

                <input 
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $user->name) }}"
                >

                @error('name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>



            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input 
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $user->email) }}"
                >

                @error('email')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror

            </div>



            <div class="mb-3">

                <label class="form-label">
                    Password
                </label>

                <input 
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Leave empty to keep old password"
                >

            </div>



            <div class="mb-3">

                <label class="form-label">
                    Profile Image
                </label>


                <br>


                @if($user->profile_image)

                    <img 
                        src="{{ asset('uploads/users/'.$user->profile_image) }}"
                        width="80"
                        height="80"
                        class="rounded-circle mb-2"
                        style="object-fit:cover;"
                    >

                @endif


                <input 
                    type="file"
                    name="profile_image"
                    class="form-control"
                    accept="image/*"
                >

            </div>




            <div class="mb-3">

                <label class="form-label">
                    Role
                </label>


                <select name="role" class="form-control">


                    @foreach($roles as $role)

                        <option value="{{ $role->name }}"
                        
                        @if($user->hasRole($role->name))
                            selected
                        @endif

                        >
                            {{ $role->name }}
                        </option>


                    @endforeach


                </select>

            </div>



            <button class="btn btn-primary">
                Update User
            </button>


            <a href="{{ route('super-admin.settings.users.index') }}"
               class="btn btn-secondary">

                Back

            </a>


        </form>


    </div>

</div>


@endsection