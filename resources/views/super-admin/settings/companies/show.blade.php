@extends('layouts.super-admin')

@section('title', 'Company Details')

@section('content')

    <div class="card">

        {{-- =========================
        Card Header Start
    ========================= --}}

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5 class="mb-0">

                <i class="bx bx-buildings me-2"></i>

                Company Details

            </h5>

            <div>

                <a href="{{ route('super-admin.settings.companies.index') }}" class="btn btn-light">

                    <i class="bx bx-arrow-back"></i>

                    Back

                </a>

                <a href="{{ route('super-admin.settings.companies.edit', $company) }}" class="btn btn-light">

                    <i class="bx bx-edit"></i>

                    Edit

                </a>

            </div>

        </div>

        {{-- =========================
        Card Header End
    ========================= --}}



        {{-- =========================
        Card Body Start
    ========================= --}}

        <div class="card-body">

            <div class="row">

                {{-- =========================
                Company Logo
            ========================= --}}

                <div class="col-md-3 text-center">

                    @if ($company->logo)
                        <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}"
                            class="img-fluid rounded border p-2"
                            style="max-width:180px;max-height:180px;object-fit:contain;">
                    @else
                        <i class="bx bx-buildings" style="font-size:120px;color:#bdbdbd;"></i>
                    @endif

                </div>


                {{-- =========================
                Company Basic Information
            ========================= --}}

                <div class="col-md-9">

                    <h4 class="mb-3">

                        {{ $company->name }}

                    </h4>

                    <hr>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <strong>Company Code</strong>

                            <br>

                            {{ $company->code }}

                        </div>

                        <div class="col-md-6 mb-3">

                            <strong>Status</strong>

                            <br>

                            @if ($company->status)
                                <span class="badge bg-success">

                                    Active

                                </span>
                            @else
                                <span class="badge bg-danger">

                                    Inactive

                                </span>
                            @endif

                        </div>

                        <div class="col-md-6 mb-3">

                            <strong>Email</strong>

                            <br>

                            {{ $company->email ?? '-' }}

                        </div>

                        <div class="col-md-6 mb-3">

                            <strong>Phone</strong>

                            <br>

                            {{ $company->phone ?? '-' }}

                        </div>

                    </div>
                    
                </div>

                {{-- ========================================================= --}}
                    {{-- Contact & Business Information Start --}}
                    {{-- ========================================================= --}}

                    <hr class="my-4">

                    <div class="row">

                        <div class="col-md-6">

                            <h5 class="mb-3">
                                <i class="bx bx-phone me-2"></i>
                                Contact Information
                            </h5>

                            <table class="table table-borderless">

                                <tr>
                                    <th width="35%">Email</th>
                                    <td>{{ $company->email ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $company->phone ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Website</th>
                                    <td>
                                        @if ($company->website)
                                            <a href="{{ $company->website }}" target="_blank">
                                                {{ $company->website }}
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>

                            </table>

                        </div>


                        <div class="col-md-6">

                            <h5 class="mb-3">
                                <i class="bx bx-briefcase me-2"></i>
                                Business Information
                            </h5>

                            <table class="table table-borderless">

                                <tr>
                                    <th width="35%">Trade License</th>
                                    <td>{{ $company->trade_license ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>BIN</th>
                                    <td>{{ $company->bin ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>TIN</th>
                                    <td>{{ $company->tin ?? '-' }}</td>
                                </tr>

                            </table>

                        </div>

                    </div>

                    {{-- ========================================================= --}}
                    {{-- Contact & Business Information End --}}
                    {{-- ========================================================= --}}

                    {{-- ========================================================= --}}
                    {{-- Address Information Start --}}
                    {{-- ========================================================= --}}

                    <hr class="my-5">

                    <h5 class="mb-3">

                        <i class="bx bx-map me-2"></i>

                        Address Information

                    </h5>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="border rounded p-3">

                                {{ $company->address ?? '-' }}

                            </div>

                        </div>

                    </div>

                    {{-- ========================================================= --}}
                    {{-- Address Information End --}}
                    {{-- ========================================================= --}}

                    {{-- ========================================================= --}}
                    {{-- System Information Start --}}
                    {{-- ========================================================= --}}

                    <hr class="my-5">

                    <h5 class="mb-3">

                        <i class="bx bx-info-circle me-2"></i>

                        System Information

                    </h5>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <strong>Created At</strong>

                            <br>

                            {{ $company->created_at->format('d M Y, h:i A') }}

                        </div>

                        <div class="col-md-6 mb-3">

                            <strong>Last Updated</strong>

                            <br>

                            {{ $company->updated_at->format('d M Y, h:i A') }}

                        </div>

                    </div>

                    {{-- ========================================================= --}}
                    {{-- System Information End --}}
                    {{-- ========================================================= --}}




            </div>

        </div>



        {{-- =========================
        Card Body End
    ========================= --}}

    </div>

@endsection
