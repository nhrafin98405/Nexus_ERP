@extends('layouts.super-admin')

@section('title', 'Supplier Management')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0">

            <i class="bx bx-check-circle me-2"></i>

            {{ session('success') }}

            <button class="btn-close" data-bs-dismiss="alert">
            </button>

        </div>
    @endif



    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="fw-bold mb-1">

                <i class="bx bx-buildings text-primary me-2"></i>

                Supplier Management

            </h3>

            <p class="text-muted mb-0">

                Manage fuel suppliers, balances and business information

            </p>

        </div>



        <a href="{{ route('super-admin.settings.suppliers.create') }}" class="btn btn-primary shadow-sm">

            <i class="bx bx-plus-circle me-1"></i>

            Add Supplier

        </a>

    </div>

    {{-- ========================================= --}}
    {{-- Summary Cards --}}
    {{-- ========================================= --}}

    <div class="row g-3 mb-4">

        {{-- Total Supplier --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Total Suppliers

                            </small>

                            <h3 class="fw-bold mb-0">

                                {{ $suppliers->total() }}

                            </h3>

                        </div>

                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">

                            <i class="bx bx-buildings fs-2 text-primary"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- Active Supplier --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Active

                            </small>

                            <h3 class="fw-bold mb-0">

                                {{ $suppliers->where('status', true)->count() }}

                            </h3>

                        </div>

                        <div class="bg-success bg-opacity-10 rounded-circle p-3">

                            <i class="bx bx-check-circle fs-2 text-success"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- Payable --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Payable

                            </small>

                            <h3 class="fw-bold mb-0">

                                {{ $suppliers->where('balance_type', 'Payable')->count() }}

                            </h3>

                        </div>

                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">

                            <i class="bx bx-wallet fs-2 text-warning"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        {{-- Receivable --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">

                                Receivable

                            </small>

                            <h3 class="fw-bold mb-0">

                                {{ $suppliers->where('balance_type', 'Receivable')->count() }}

                            </h3>

                        </div>

                        <div class="bg-info bg-opacity-10 rounded-circle p-3">

                            <i class="bx bx-money fs-2 text-info"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- ====================================================== --}}
    {{-- Supplier List --}}
    {{-- ====================================================== --}}

    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white border-0 py-3">

            <div class="row align-items-center">

                <div class="col-lg-4">

                    <h5 class="mb-0 fw-bold">

                        <i class="bx bx-list-ul text-primary me-2"></i>

                        Supplier List

                    </h5>

                </div>



                <div class="col-lg-8">

                    <div class="row g-2">

                        <div class="col-md-6">

                            <input type="text" class="form-control" placeholder="Search supplier...">

                        </div>



                        <div class="col-md-3">

                            <select class="form-select">

                                <option>

                                    All Status

                                </option>

                                <option>

                                    Active

                                </option>

                                <option>

                                    Inactive

                                </option>

                            </select>

                        </div>



                        <div class="col-md-3 text-end">

                            <a href="{{ route('super-admin.settings.suppliers.index') }}" class="btn btn-light w-100">

                                <i class="bx bx-refresh"></i>

                                Refresh

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="60">#</th>

                            <th>Supplier</th>

                            <th>Company</th>

                            <th>Pump</th>

                            <th>Phone</th>

                            <th>Balance</th>

                            <th>Status</th>

                            <th class="text-center" width="80">

                                Action

                            </th>

                        </tr>

                    </thead>

                    <tbody>
                        @forelse($suppliers as $supplier)
                            <tr>

                                <td>

                                    {{ $loop->iteration + ($suppliers->currentPage() - 1) * $suppliers->perPage() }}

                                </td>



                                <td>

                                    <div class="d-flex align-items-center">

                                        <div class="bg-primary bg-opacity-10 rounded-circle me-3
                        d-flex align-items-center justify-content-center"
                                            style="width:45px;height:45px;">

                                            <i class="bx bx-buildings text-primary"></i>

                                        </div>

                                        <div>

                                            <div class="fw-bold">

                                                {{ $supplier->name }}

                                            </div>

                                            <small class="text-muted">

                                                {{ $supplier->code }}

                                            </small>

                                        </div>

                                    </div>

                                </td>



                                <td>

                                    {{ $supplier->company->name ?? '-' }}

                                </td>



                                <td>

                                    {{ $supplier->pump->name ?? '-' }}

                                </td>



                                <td>

                                    {{ $supplier->phone }}

                                </td>



                                <td>

                                    <div class="fw-bold">

                                        ৳ {{ number_format($supplier->opening_balance, 2) }}

                                    </div>

                                    @if ($supplier->balance_type == 'Payable')
                                        <span class="badge bg-warning text-dark">

                                            Payable

                                        </span>
                                    @else
                                        <span class="badge bg-info">

                                            Receivable

                                        </span>
                                    @endif

                                </td>



                                <td>

                                    @if ($supplier->status)
                                        <span class="badge bg-success">

                                            Active

                                        </span>
                                    @else
                                        <span class="badge bg-danger">

                                            Inactive

                                        </span>
                                    @endif

                                </td>



                                <td class="text-center">

                                    <div class="dropdown">

                                        <button class="btn btn-light btn-sm" data-bs-toggle="dropdown">

                                            <i class="bx bx-dots-vertical-rounded"></i>

                                        </button>



                                        <ul class="dropdown-menu dropdown-menu-end">

                                            <li>

                                                <a class="dropdown-item"
                                                    href="{{ route('super-admin.settings.suppliers.show', $supplier) }}">

                                                    <i class="bx bx-show me-2"></i>

                                                    View

                                                </a>

                                            </li>



                                            <li>

                                                <a class="dropdown-item"
                                                    href="{{ route('super-admin.settings.suppliers.edit', $supplier) }}">

                                                    <i class="bx bx-edit me-2"></i>

                                                    Edit

                                                </a>

                                            </li>



                                            <li>

                                                <form
                                                    action="{{ route('super-admin.settings.suppliers.destroy', $supplier) }}"
                                                    method="POST">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="dropdown-item text-danger"
                                                        onclick="return confirm('Delete this supplier?')">

                                                        <i class="bx bx-trash me-2"></i>

                                                        Delete

                                                    </button>

                                                </form>

                                            </li>

                                        </ul>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="text-center py-5">

                                    <i class="bx bx-buildings display-3 text-secondary"></i>

                                    <h5 class="mt-3">

                                        No Suppliers Found

                                    </h5>

                                    <p class="text-muted mb-0">

                                        Click "Add Supplier" to create your first supplier.

                                    </p>

                                </td>

                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>

        </div>

        <div class="card-footer bg-white">

            {{ $suppliers->links() }}

        </div>

    </div>

@endsection
