@extends('layouts.super-admin')

@section('content')
    


<div class="container">
    <div class="card">

        <div class="card-header">
            <h4>Create User</h4>
        </div>


        <div class="card-body">

            <form action="{{ route('super-admin.settings.users.store') }}" 
      method="POST"
      enctype="multipart/form-data">

                @csrf


                <div class="mb-3">
                    <label>Name</label>

                    <input type="text" 
                           name="name" 
                           class="form-control"
                           value="{{ old('name') }}">

                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>



                <div class="mb-3">
                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}">

                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>



                <div class="mb-3">
                    <label>Password</label>

                    <input type="password"
                           name="password"
                           class="form-control">

                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                <div class="mb-3">

    <label class="form-label">
        Profile Image
    </label>

    <input 
        type="file" 
        name="profile_image"
        class="form-control"
        accept="image/*"
    >

    @error('profile_image')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror

</div>



                <div class="mb-3">

                    <label>Role</label>

                    <select name="role" class="form-control">

                        <option value="">
                            Select Role
                        </option>


                        @foreach($roles as $role)

                            <option value="{{ $role->name }}">
                                {{ $role->name }}
                            </option>

                        @endforeach

                    </select>

                </div>



                <button class="btn btn-primary">
                    Save User
                </button>


            </form>

        </div>

    </div>
</div>


@endsection