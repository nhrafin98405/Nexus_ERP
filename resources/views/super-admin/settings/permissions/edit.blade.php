@extends('layouts.super-admin')

@section('content')

<div class="card">

    <div class="card-header">
        <h4>Edit Permission</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('super-admin.settings.permissions.update', $permission->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">Permission Name</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name', $permission->name) }}">

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>

            <button type="submit" class="btn btn-light">
                Update Permission
            </button>

            <a href="{{ route('super-admin.settings.permissions.index') }}"
               class="btn btn-light">
                Back
            </a>

        </form>

    </div>

</div>

@endsection