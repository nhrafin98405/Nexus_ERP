@extends('layouts.super-admin')

@section('title', 'Pump Management')

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

    Pump Management

</h6>

<hr>

<div class="card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h5 class="mb-0">

                Pump List

            </h5>

            <a
                href="{{ route('super-admin.settings.pumps.create') }}"
                class="btn btn-light">

                <i class="bx bx-plus"></i>

                Create Pump

            </a>

        </div>


        <div class="table-responsive">

            <table class="table table-bordered table-striped align-middle">

                <thead>

                    <tr>

                        <th width="60">#</th>

                        <th>Pump Name</th>

                        <th>Code</th>

                        <th>Owner</th>

                        <th>Phone</th>

                        <th>Status</th>

                        <th width="180">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($pumps as $pump)

                    <tr>

                        <td>

                            {{ $loop->iteration }}

                        </td>

                        <td>

                            <strong>{{ $pump->name }}</strong>

                        </td>

                        <td>

                            <span class="badge bg-secondary">

                                {{ $pump->code }}

                            </span>

                        </td>

                        <td>

                            {{ $pump->owner_name ?: '-' }}

                        </td>

                        <td>

                            {{ $pump->phone ?: '-' }}

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

                            <div class="d-flex gap-1">

                                <a
                                    href="{{ route('super-admin.settings.pumps.show',$pump) }}"
                                    class="btn btn-sm btn-light">

                                    <i class="bx bx-show"></i>

                                </a>

                                <a
                                    href="{{ route('super-admin.settings.pumps.edit',$pump) }}"
                                    class="btn btn-sm btn-light">

                                    <i class="bx bx-edit"></i>

                                </a>

                                <form
                                    action="{{ route('super-admin.settings.pumps.destroy',$pump) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this pump?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-sm btn-light">

                                        <i class="bx bx-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="text-center text-muted py-4">

                            No Pump Found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>


        @if($pumps->hasPages())

            <div class="mt-3">

                {{ $pumps->links() }}

            </div>

        @endif

    </div>

</div>

@endsection