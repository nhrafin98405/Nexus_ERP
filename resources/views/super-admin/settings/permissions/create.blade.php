@extends('layouts.super-admin')

@section('content')

<div class="page-wrapper">
    <div class="page-content">

        <div class="card radius-10">

            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">
                        Create Permission
                    </h5>

                    <a href="{{ route('super-admin.settings.permissions.index') }}"
                       class="btn btn-secondary">
                        Back
                    </a>

                </div>
            </div>


            <div class="card-body">

                <form action="{{ route('super-admin.settings.permissions.store') }}"
                      method="POST">

                    @csrf


                    <div class="mb-3">

                        <label class="form-label">
                            Permission Name
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="Example: user.create"
                               value="{{ old('name') }}">


                        @error('name')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <button type="submit"
                            class="btn btn-primary">

                        Save Permission

                    </button>


                </form>

            </div>

        </div>

    </div>
</div>

@endsection