@extends('layouts.super-admin')

@section('title', 'Pump Management')

@section('content')

{{-- ==========================================================
    Page Header
========================================================== --}}

<div class="page-breadcrumb d-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">
        Pump Management
    </div>

    <div class="ms-auto">
        <a href="{{ route('pumps.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i>
            Add New Pump
        </a>
    </div>
</div>

{{-- ==========================================================
    Success Message
========================================================== --}}

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif


{{-- ==========================================================
    Pump List Card
========================================================== --}}

<div class="card radius-10">

    <div class="card-header">

        <h5 class="mb-0">

            Pump List

        </h5>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">

                <tr>

                    <th width="60">#</th>

                    <th>Pump Name</th>

                    <th>Code</th>

                    <th>Owner</th>

                    <th>Phone</th>

                    <th>Status</th>

                    <th width="170">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($pumps as $pump)

                <tr>

                    <td>

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        {{ $pump->name }}

                    </td>

                    <td>

                        {{ $pump->code }}

                    </td>

                    <td>

                        {{ $pump->owner_name }}

                    </td>

                    <td>

                        {{ $pump->phone }}

                    </td>

                    <td>

                        @if($pump->status)

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
                        <a href="{{ route('pumps.show',$pump->id) }}"
   class="btn btn-info btn-sm">

    <i class="bx bx-show"></i>

</a>

                        <a href="{{ route('pumps.edit',$pump->id) }}"
                           class="btn btn-sm btn-warning">

                            <i class="bx bx-edit"></i>

                        </a>

                        <form action="{{ route('pumps.destroy',$pump->id) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Delete this Pump?')"
                                class="btn btn-sm btn-danger">

                                <i class="bx bx-trash"></i>

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7" class="text-center">

                        No Pump Found

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        {{-- ==========================================================
            Pagination
        ========================================================== --}}

        <div class="mt-3">

            {{ $pumps->links() }}

        </div>

    </div>

</div>

@endsection