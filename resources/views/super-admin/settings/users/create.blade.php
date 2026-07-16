@extends('layouts.super-admin')

@section('content')
    <div class="container">
        <div class="card">

            <div class="card-header">
                <h4>Create User</h4>
            </div>


            <div class="card-body">

                <form action="{{ route('super-admin.settings.users.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf


                    <div class="mb-3">
                        <label>Name</label>

                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>



                    <div class="mb-3">
                        <label>Email</label>

                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">

                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>



                    <div class="mb-3">
                        <label>Password</label>

                        <input type="password" name="password" class="form-control">

                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="mb-3">
    <label>Phone</label>

    <input type="text"
           name="phone"
           class="form-control"
           value="{{ old('phone') }}">
</div>


<div class="mb-3">
    <label>Employee Code</label>

    <input type="text"
           name="employee_code"
           class="form-control"
           value="{{ old('employee_code') }}">
</div>


<div class="mb-3">

    <label>Company</label>

    <select name="company_id" class="form-control">

        <option value="">
            Select Company
        </option>

        @foreach($companies as $company)

            <option value="{{ $company->id }}">
                {{ $company->name }}
            </option>

        @endforeach

    </select>

</div>


<div class="mb-3">

    <label>Branch</label>

    <select name="branch_id" class="form-control">

        <option value="">
            Select Branch
        </option>

        @foreach($branches as $branch)

            <option value="{{ $branch->id }}">
                {{ $branch->name }}
            </option>

        @endforeach

    </select>

</div>


<div class="mb-3">

    <label>Department</label>

    <select name="department_id" class="form-control">

        <option value="">
            Select Department
        </option>

        @foreach($departments as $department)

            <option value="{{ $department->id }}">
                {{ $department->name }}
            </option>

        @endforeach

    </select>

</div>


<div class="mb-3">

    <label>Designation</label>

    <select name="designation_id" class="form-control">

        <option value="">
            Select Designation
        </option>

        @foreach($designations as $designation)

            <option value="{{ $designation->id }}">
                {{ $designation->name }}
            </option>

        @endforeach

    </select>

</div>


<div class="mb-3">

    <label>User Type</label>

    <select name="user_type" class="form-control">

        <option value="employee">
            Employee
        </option>

        <option value="manager">
            Manager
        </option>

        <option value="company_admin">
            Company Admin
        </option>

    </select>

</div>

                    <div class="mb-3">

                        <label class="form-label">
                            Profile Image
                        </label>

                        <input type="file" name="profile_image" class="form-control" accept="image/*">

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


                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">
                                    {{ $role->name }}
                                </option>
                            @endforeach

                        </select>

                    </div>



                    <button class="btn btn-light">
                        Save User
                    </button>
                    <a href="{{ route('super-admin.settings.users.index') }}" class="btn btn-light">
                        Back
                    </a>


                </form>

            </div>

        </div>
    </div>
@endsection
