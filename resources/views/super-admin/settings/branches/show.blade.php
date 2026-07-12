@extends('layouts.super-admin')

@section('title', 'Branch Details')

@section('content')

<div class="card">


    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">

            <i class="bx bx-git-branch me-2"></i>

            Branch Details

        </h5>


        <div>

            <a href="{{ route('super-admin.settings.branches.index') }}"
               class="btn btn-light">

                <i class="bx bx-arrow-back"></i>

                Back

            </a>


            <a href="{{ route('super-admin.settings.branches.edit', $branch) }}"
               class="btn btn-light">

                <i class="bx bx-edit"></i>

                Edit

            </a>


        </div>

    </div>



    <div class="card-body">


        <div class="row">


            {{-- Branch Logo --}}

            <div class="col-md-3 text-center">


                @if ($branch->logo)

                    <img src="{{ asset('storage/' . $branch->logo) }}"
                         alt="{{ $branch->name }}"
                         class="img-fluid rounded border p-2"
                         style="max-width:180px;max-height:180px;object-fit:contain;">

                @else

                    <i class="bx bx-git-branch"
                       style="font-size:120px;color:#bdbdbd;"></i>

                @endif


            </div>




            {{-- Basic Information --}}

            <div class="col-md-9">


                <h4 class="mb-3">

                    {{ $branch->name }}

                </h4>


                <hr>


                <div class="row">


                    <div class="col-md-6 mb-3">

                        <strong>Branch Code</strong>

                        <br>

                        {{ $branch->code ?? '-' }}

                    </div>



                    <div class="col-md-6 mb-3">

                        <strong>Status</strong>

                        <br>


                        @if ($branch->status)

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

                        <strong>Company</strong>

                        <br>

                        {{ $branch->company->name }}

                    </div>



                    <div class="col-md-6 mb-3">

                        <strong>Email</strong>

                        <br>

                        {{ $branch->email ?? '-' }}

                    </div>



                    <div class="col-md-6 mb-3">

                        <strong>Phone</strong>

                        <br>

                        {{ $branch->phone ?? '-' }}

                    </div>


                </div>


            </div>



        </div>




        <hr class="my-5">



        {{-- Contact Information --}}

        <h5 class="mb-3">

            <i class="bx bx-phone me-2"></i>

            Contact Information

        </h5>



        <table class="table table-borderless">


            <tr>

                <th width="35%">Email</th>

                <td>
                    {{ $branch->email ?? '-' }}
                </td>

            </tr>


            <tr>

                <th>Phone</th>

                <td>
                    {{ $branch->phone ?? '-' }}
                </td>

            </tr>


            <tr>

                <th>Website</th>

                <td>

                    @if ($branch->website)

                        <a href="{{ $branch->website }}"
                           target="_blank">

                            {{ $branch->website }}

                        </a>

                    @else

                        -

                    @endif


                </td>

            </tr>


        </table>





        <hr class="my-5">



        {{-- Address --}}

        <h5 class="mb-3">

            <i class="bx bx-map me-2"></i>

            Address Information

        </h5>



        <div class="border rounded p-3">

            {{ $branch->address ?? '-' }}

        </div>





        <hr class="my-5">



        {{-- System Information --}}

        <h5 class="mb-3">

            <i class="bx bx-info-circle me-2"></i>

            System Information

        </h5>



        <div class="row">


            <div class="col-md-6 mb-3">

                <strong>Created At</strong>

                <br>

                {{ $branch->created_at->format('d M Y, h:i A') }}

            </div>



            <div class="col-md-6 mb-3">

                <strong>Last Updated</strong>

                <br>

                {{ $branch->updated_at->format('d M Y, h:i A') }}

            </div>


        </div>



    </div>


</div>


@endsection