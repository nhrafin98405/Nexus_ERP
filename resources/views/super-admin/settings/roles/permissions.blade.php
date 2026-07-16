@extends('layouts.super-admin')

@section('title', 'Assign Permissions')

@section('content')

    <div class="page-content">

        {{-- Breadcrumb --}}
        <div class="card border-0 shadow-sm mb-4 header-card">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center flex-wrap">

                    <div>

                        <nav aria-label="breadcrumb">

                            <ol class="breadcrumb mb-2">

                                <li class="breadcrumb-item">
                                    <a href="{{ route('super-admin.dashboard') }}">
                                        <i class="bx bx-home-alt"></i>
                                        Dashboard
                                    </a>
                                </li>

                                <li class="breadcrumb-item">
                                    Settings
                                </li>

                                <li class="breadcrumb-item">
                                    Roles
                                </li>

                                <li class="breadcrumb-item active">
                                    Permissions
                                </li>

                            </ol>

                        </nav>

                        <h3 class="fw-bold mb-1">

                            <i class="bx bx-shield-quarter text-primary me-2"></i>

                            Assign Permissions

                        </h3>

                        <p class="text-muted mb-0">

                            Configure module access and permissions for this role.

                        </p>

                    </div>


                    <div class="mt-3 mt-lg-0">

                        <a href="{{ route('super-admin.settings.roles.index') }}" class="btn btn-light border">

                            <i class="bx bx-arrow-back me-1"></i>

                            Back

                        </a>

                    </div>

                </div>

            </div>

        </div>



        {{-- Role Info --}}

        {{-- Role Summary --}}
        <div class="card border-0 shadow-sm mb-4 role-summary">

            <div class="card-body">

                <div class="row align-items-center">

                    <div class="col-lg-7">

                        <div class="d-flex align-items-center">

                            <div class="role-avatar">
                                <i class="bx bx-shield-quarter"></i>
                            </div>


                            <div class="ms-3">

                                <h4 class="fw-bold mb-1">
                                    {{ $role->name }}
                                </h4>


                                <p class="text-muted mb-0">
                                    Manage access level and permissions for this role.
                                </p>

                            </div>

                        </div>

                    </div>



                    <div class="col-lg-5">

                        <div class="row text-center mt-4 mt-lg-0">


                            <div class="col-4">

                                <h4 class="fw-bold text-primary mb-0">
                                    {{ count($modules) }}
                                </h4>

                                <small class="text-muted">
                                    Modules
                                </small>

                            </div>



                            <div class="col-4 border-start">

                                <h4 class="fw-bold text-success mb-0">
                                    {{ count($rolePermissions) }}
                                </h4>

                                <small class="text-muted">
                                    Assigned
                                </small>

                            </div>



                            <div class="col-4 border-start">


                                @if ($role->is_system)
                                    <span class="badge bg-danger px-3 py-2">
                                        <i class="bx bx-lock"></i>
                                        System
                                    </span>
                                @else
                                    <span class="badge bg-success px-3 py-2">
                                        <i class="bx bx-check"></i>
                                        Custom
                                    </span>
                                @endif


                            </div>


                        </div>

                    </div>


                </div>

            </div>

        </div>



        {{-- Search Permission --}}
        <div class="card border-0 shadow-sm mb-4">

            <div class="card-body">


                <div class="position-relative">

                    


                    <input type="text" id="permissionSearch" class="form-control search-input"
                        placeholder="Search module or permission...">


                </div>


            </div>

        </div>





        <form action="{{ route('super-admin.settings.roles.permissions.update', $role) }}" method="POST">

            @csrf
            @method('PUT')



            <div class="row">


                @foreach ($modules as $module => $permissions)
                    <div class="col-xl-4 col-lg-6 mb-4">

                        <div class="card permission-card h-100">

                            <div class="card-header">

                                <div class="d-flex align-items-center justify-content-between">

                                    <div class="d-flex align-items-center">

                                        <div class="module-icon">
                                            <i class="bx bx-folder-open"></i>
                                        </div>

                                        <div class="ms-3">

                                            <h6 class="mb-1 text-capitalize fw-bold">
                                                {{ str_replace('-', ' ', $module) }}
                                            </h6>

                                            <small class="text-muted permission-counter" data-module="{{ $module }}">
                                                0 / {{ $permissions->count() }} Selected
                                            </small>

                                        </div>

                                    </div>


                                    <span class="badge module-count">
                                        {{ $permissions->count() }}
                                    </span>


                                </div>

                            </div>


                            <div class="card-body">


                                <div class="select-box mb-3">


                                    <div class="form-check form-switch">

                                        <input class="form-check-input select-all" type="checkbox"
                                            data-module="{{ $module }}" id="select-all-{{ $module }}"
                                            @if ($role->is_system) disabled @endif>


                                        <label class="form-check-label fw-semibold" for="select-all-{{ $module }}">

                                            Select All

                                        </label>


                                    </div>


                                </div>



                                @foreach ($permissions as $permission)
                                    @php
                                        $action = explode('.', $permission->name);
                                        $action = end($action);
                                    @endphp


                                    <div class="permission-item">


                                        <div class="form-check">


                                            <input class="form-check-input permission-checkbox module-{{ $module }}"
                                                type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                                id="permission-{{ $permission->id }}" data-module="{{ $module }}"
                                                {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}
                                                @if ($role->is_system) disabled @endif>


                                            <label class="form-check-label w-100" for="permission-{{ $permission->id }}">


                                                <div class="d-flex justify-content-between align-items-center">


                                                    <span>


                                                        @if ($action == 'view')
                                                            <i class="bx bx-show text-info"></i>
                                                        @elseif($action == 'create')
                                                            <i class="bx bx-plus text-success"></i>
                                                        @elseif($action == 'edit')
                                                            <i class="bx bx-edit text-warning"></i>
                                                        @elseif($action == 'delete')
                                                            <i class="bx bx-trash text-danger"></i>
                                                        @endif


                                                        {{ ucfirst($action) }}

                                                    </span>



                                                    <span class="permission-tag {{ $action }}">

                                                        {{ strtoupper($action) }}

                                                    </span>


                                                </div>


                                            </label>


                                        </div>


                                    </div>
                                @endforeach


                            </div>


                        </div>

                    </div>
                @endforeach


            </div>





            @if (!$role->is_system)
                <div class="text-end mt-3">


                    <button class="btn btn-primary px-4">


                        <i class="bx bx-save"></i>

                        Save Permissions


                    </button>


                </div>
            @else
                <div class="alert alert-warning">

                    <i class="bx bx-lock"></i>

                    This is a system role. Permission modification is disabled.

                </div>
            @endif



        </form>


    </div>


@endsection





@push('styles')
    <style>
        .role-summary {

            border-radius: 20px;

        }


        .role-avatar {

            width: 75px;
            height: 75px;

            border-radius: 20px;

            background:
                linear-gradient(135deg, #0d6efd, #6610f2);

            display: flex;

            align-items: center;

            justify-content: center;

            color: white;

            font-size: 35px;

            box-shadow:
                0 15px 35px rgba(13, 110, 253, .25);

        }



        .search-input {

            height: 55px;

            border-radius: 16px;

            padding-left: 50px;

            font-size: 15px;

        }


        .search-icon {

            position: absolute;

            left: 18px;

            top: 17px;

            font-size: 22px;

            color: #8c98a4;

        }



        .permission-card {

            border-radius: 20px !important;

            border: 0 !important;

        }



        .permission-card:hover {

            transform: translateY(-6px);

        }



        .permission-item {

            background: #fff;

            border: 1px solid #edf1f5;

            padding: 13px;

            border-radius: 14px;

        }



        .permission-item:hover {

            background: #f5f9ff;

            border-color: #0d6efd;

        }



        .select-box {

            background: #f5f7fb;

            border-radius: 14px;

            padding: 14px;

        }

        .search-input {

            height: 48px;

            border-radius: 14px;

            padding-left: 45px;

            border: 1px solid #dee2e6;

            box-shadow: none;

        }

        .search-input:focus {

            border-color: #0d6efd;

            box-shadow: 0 0 0 .2rem rgba(13, 110, 253, .15);

        }

        .search-icon {

            position: absolute;

            left: 16px;

            top: 15px;

            color: #6c757d;

            font-size: 20px;

        }


        .header-card {

            border-radius: 18px;

        }


        .role-info-card {

            border-radius: 18px;

        }


        .role-avatar {

            width: 70px;

            height: 70px;

            border-radius: 18px;

            background: linear-gradient(135deg, #0d6efd, #4f8cff);

            display: flex;

            align-items: center;

            justify-content: center;

            color: #fff;

            font-size: 34px;

            box-shadow: 0 10px 25px rgba(13, 110, 253, .25);

        }



        .breadcrumb-item a {

            color: #0d6efd;

            text-decoration: none;

        }



        .breadcrumb {

            margin-bottom: 8px;

        }



        .header-card h3 {

            font-size: 28px;

        }



        .role-info-card .col-4 {

            border-left: 1px solid #edf2f7;

        }



        .role-info-card .col-4:first-child {

            border-left: none;

        }



        .badge {

            border-radius: 50px;

            font-size: 13px;

        }

        .permission-card {

            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
            transition: .3s;

        }


        .permission-card:hover {

            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, .12);

        }



        .permission-card .card-header {

            background: linear-gradient(135deg,
                    #f8fbff,
                    #ffffff);

            border-bottom: 1px solid #eef2f7;

            padding: 18px;

        }



        .module-icon {


            width: 45px;
            height: 45px;

            border-radius: 14px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #e8f1ff;

            color: #0d6efd;

            font-size: 22px;


        }



        .module-count {


            background: #0d6efd;
            color: white;

            border-radius: 50px;

            padding: 7px 12px;

        }



        .select-box {


            background: #f8f9fa;

            padding: 12px;

            border-radius: 12px;

        }




        .permission-item {


            padding: 12px;

            border-radius: 12px;

            margin-bottom: 8px;

            border: 1px solid #edf0f5;

            transition: .25s;


        }



        .permission-item:hover {

            background: #f8fbff;

            border-color: #0d6efd;

            transform: translateX(4px);

        }



        .form-check-input {

            cursor: pointer;

        }



        .permission-tag {


            font-size: 10px;

            padding: 5px 10px;

            border-radius: 50px;

            font-weight: 700;


        }



        .permission-tag.view {

            background: #e8f7ff;

            color: #008cff;

        }


        .permission-tag.create {

            background: #e8fff0;

            color: #00a651;

        }


        .permission-tag.edit {

            background: #fff5db;

            color: #ff9800;

        }


        .permission-tag.delete {

            background: #ffe8e8;

            color: #dc3545;

        }
    </style>
@endpush






@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            function updateModule(module) {

                const boxes = document.querySelectorAll(".module-" + module);
                const checked = document.querySelectorAll(".module-" + module + ":checked");

                const counter = document.querySelector(
                    '.permission-counter[data-module="' + module + '"]'
                );

                const selectAll = document.querySelector("#select-all-" + module);

                if (counter) {
                    counter.innerHTML = checked.length + " / " + boxes.length + " Selected";
                }

                if (selectAll) {
                    selectAll.checked = boxes.length > 0 && boxes.length === checked.length;
                }
            }

            // Select All
            document.querySelectorAll(".select-all").forEach(function(selectAll) {

                selectAll.onclick = function() {

                    const module = this.dataset.module;

                    document.querySelectorAll(".module-" + module).forEach(function(box) {
                        box.checked = selectAll.checked;
                    });

                    updateModule(module);
                };

            });

            // Single checkbox
            document.querySelectorAll(".permission-checkbox").forEach(function(box) {

                box.addEventListener("change", function() {
                    updateModule(this.dataset.module);
                });

            });

            // Initial load
            document.querySelectorAll(".select-all").forEach(function(item) {
                updateModule(item.dataset.module);
            });

        });


        // Permission Search

        const search = document.getElementById('permissionSearch');


        if (search) {

            search.addEventListener('keyup', function() {


                let value = this.value.toLowerCase();


                document.querySelectorAll('.permission-card')
                    .forEach(function(card) {


                        let text = card.innerText.toLowerCase();


                        if (text.includes(value)) {

                            card.parentElement.style.display = "block";

                        } else {

                            card.parentElement.style.display = "none";

                        }


                    });


            });


        }
    </script>
@endpush
