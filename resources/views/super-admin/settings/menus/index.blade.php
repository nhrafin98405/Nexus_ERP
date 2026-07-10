@extends('layouts.super-admin')

@section('title', 'Menus')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>
    </div>
@endif

<h6 class="mb-0 text-uppercase">
    Menu Management
</h6>

<hr>

<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h5 class="mb-0">
                Menu List
            </h5>

            <a href="{{ route('super-admin.settings.menus.create') }}"
                class="btn btn-light">

                <i class="bx bx-plus"></i>

                Create Menu

            </a>

        </div>

        <div class="table-responsive">

            <table id="menusTable"
                class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Name</th>

                        <th>Parent</th>

                        <th>Type</th>

                        <th>Route</th>

                        <th>Sort</th>

                        <th>Status</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($menus as $key => $menu)

                    <tr>

                        <td>{{ $key + 1 }}</td>

                        <td>

                            <i class="{{ $menu->icon }}"></i>

                            {{ $menu->name }}

                        </td>

                        <td>

                            {{ $menu->parent?->name ?? '-' }}

                        </td>

                        <td>

                            <span class="badge bg-info">

                                {{ ucfirst($menu->menu_type) }}

                            </span>

                        </td>

                        <td>

                            {{ $menu->route_name ?? '-' }}

                        </td>

                        <td>

                            {{ $menu->sort_order }}

                        </td>

                        <td>

                            @if($menu->status)

                                <span class="badge bg-success">

                                    Active

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Inactive

                                </span>

                            @endif

                        </td>

                        <td>

                            <div class="d-flex gap-1">

                                <a href="{{ route('super-admin.settings.menus.show',$menu) }}"
                                    class="btn btn-sm btn-light">

                                    View

                                </a>

                                <a href="{{ route('super-admin.settings.menus.edit',$menu->id) }}"
                                    class="btn btn-sm btn-warning">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('super-admin.settings.menus.destroy',$menu) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this menu?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-sm btn-danger">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection