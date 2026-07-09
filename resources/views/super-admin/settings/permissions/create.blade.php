@extends('layouts.super-admin')

@section('content')

    <div class="container">
        <div class="card">

            <div class="card-header">
                <h4>Create Permission</h4>
            </div>


            <div class="card-body">

                <form action="{{ route('super-admin.settings.permissions.store') }}" method="POST">

                    @csrf


                    <div class="mb-3">
                        <label>Permission Name</label>

                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>




                    <button class="btn btn-light">
                        Save Permission
                    </button>
                    <a href="{{ route('super-admin.settings.permissions.index') }}" class="btn btn-light">
                        Back
                    </a>


                </form>

            </div>

        </div>
    </div>

@endsection




