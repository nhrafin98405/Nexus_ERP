@extends('layouts.super-admin')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Create Role</h3>

        <a href="{{ route('super-admin.settings.roles.index') }}"
           class="btn btn-light">
            Back
        </a>

    </div>


    <div class="card">

        <div class="card-body">

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form action="{{ route('super-admin.settings.roles.store') }}"
                  method="POST">

                @csrf


                <div class="mb-3">

                    <label class="form-label">
                        Role Name
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}">

                </div>


                <div class="mb-3">

                    <label class="form-label">
                        Description
                    </label>

                    <textarea name="description"
                              class="form-control"
                              rows="4">{{ old('description') }}</textarea>

                </div>


                <button type="submit"
                        class="btn btn-light">
                    Save Role
                </button>


            </form>


        </div>

    </div>


</div>


@endsection