@extends('layouts.super-admin')

@section('title', 'Assign Permissions')

@section('content')

    <div class="page-breadcrumb d-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">
            Settings
        </div>

        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('super-admin.dashboard') }}">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>

                    <li class="breadcrumb-item">
                        Roles
                    </li>

                    <li class="breadcrumb-item active">
                        Assign Permissions
                    </li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <div>

                <h5 class="mb-1">
                    Assign Permissions
                </h5>

                <small class="text-muted">
                    Role :
                    <strong>{{ $role->name }}</strong>
                </small>

            </div>

            <a href="{{ route('super-admin.settings.roles.index') }}" class="btn btn-secondary">

                <i class="bx bx-arrow-back"></i>

                Back

            </a>

        </div>


        <div class="card-body">

            <div id="permissionStepper" class="bs-stepper">

                <div class="card-header">

                    <div class="d-lg-flex flex-lg-row align-items-lg-center justify-content-lg-between" role="tablist">

                        @foreach ($modules as $module => $permissions)
                            <div class="step" data-target="#{{ $module }}-step">

                                <button type="button" class="step-trigger" role="tab" id="{{ $module }}-trigger">

                                    <span class="bs-stepper-circle">
                                        {{ $loop->iteration }}
                                    </span>

                                    <span>

                                        <span class="bs-stepper-label">
                                            {{ ucwords(str_replace('-', ' ', $module)) }}
                                        </span>

                                        <small
    class="text-muted d-block permission-counter"
    data-module="{{ $module }}">

    0 / {{ $permissions->count() }} Selected

</small>

                                    </span>

                                </button>

                            </div>

                            @unless ($loop->last)
                                <div class="bs-stepper-line"></div>
                            @endunless
                        @endforeach

                    </div>

                </div>

                <div class="card-body">

                    <form action="{{ route('super-admin.settings.roles.permissions.update', $role) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <!-- পুরো bs-stepper এখানে থাকবে -->



                        <div class="bs-stepper-content">

                            @foreach ($modules as $module => $permissions)
                                <div id="{{ $module }}-step" class="content" role="tabpanel"
                                    aria-labelledby="{{ $module }}-trigger">

                                    <h4 class="mb-2">
                                        {{ ucwords(str_replace('-', ' ', $module)) }}
                                    </h4>

                                    <p class="text-muted mb-4">
                                        Select permissions for
                                        <strong>{{ ucwords(str_replace('-', ' ', $module)) }}</strong>
                                        module.
                                    </p>

                                    <div class="row">

                                        <div class="col-12 mb-3">

                                            <div class="form-check">

                                                <input
            class="form-check-input select-all"
            type="checkbox"
            id="select-all-{{ $module }}"
            data-module="{{ $module }}">


                                                <label class="form-check-label fw-bold"
                                                    for="select-all-{{ $module }}">

                                                    Select All

                                                </label>

                                            </div>

                                        </div>

                                        @foreach ($permissions as $permission)
                                            <div class="col-md-4 mb-3">

                                                <div class="form-check">

                                                    <input
    class="form-check-input permission-checkbox module-{{ $module }}"
    type="checkbox"
    name="permissions[]"
    value="{{ $permission->name }}"
    id="{{ $permission->id }}"
    data-module="{{ $module }}"
    {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="{{ $permission->id }}">

                                                        @php
    $parts = explode('.', $permission->name);
    $action = end($parts);
@endphp

{{ ucwords(str_replace('-', ' ', $action)) }}

                                                    </label>

                                                </div>

                                            </div>
                                        @endforeach

                                    </div>

                                    <div class="d-flex justify-content-between mt-4">

                                        @if (!$loop->first)
                                            <button type="button" class="btn btn-secondary" onclick="stepper.previous()">
                                                <i class="bx bx-left-arrow-alt"></i>
                                                Previous
                                            </button>
                                        @else
                                            <span></span>
                                        @endif

                                        @if (!$loop->last)
                                            <button type="button" class="btn btn-primary" onclick="stepper.next()">
                                                Next
                                                <i class="bx bx-right-arrow-alt"></i>
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-success">
                                                <i class="bx bx-save"></i>
                                                Save Permissions
                                            </button>
                                        @endif

                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    window.stepper = new Stepper(
        document.querySelector('#permissionStepper'),
        {
            linear: false,
            animation: true
        }
    );

    function updateModule(module) {

        const checkboxes = document.querySelectorAll('.module-' + module);
        const checked = document.querySelectorAll('.module-' + module + ':checked');
        const selectAll = document.querySelector('#select-all-' + module);
        const counter = document.querySelector('.permission-counter[data-module="' + module + '"]');

        if (selectAll) {
            selectAll.checked = checkboxes.length > 0 && checkboxes.length === checked.length;
        }

        if (counter) {
            counter.innerText = checked.length + ' / ' + checkboxes.length + ' Selected';
        }
    }

    document.querySelectorAll('.select-all').forEach(function (selectAll) {

        const module = selectAll.dataset.module;

        selectAll.addEventListener('change', function () {

            document.querySelectorAll('.module-' + module).forEach(function (checkbox) {
                checkbox.checked = selectAll.checked;
            });

            updateModule(module);

        });

        updateModule(module);

    });

    document.querySelectorAll('.permission-checkbox').forEach(function (checkbox) {

        checkbox.addEventListener('change', function () {

            updateModule(this.dataset.module);

        });

    });

});
</script>
@endpush
