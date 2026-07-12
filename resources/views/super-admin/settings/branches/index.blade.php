@extends('layouts.super-admin')

@section('title', 'Branches')

@section('content')


@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show">

        {{ session('success') }}

        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

    </div>
@endif



<h6 class="mb-0 text-uppercase">
    Branch Management
</h6>

<hr>



<div class="card">

    <div class="card-body">


        <div class="d-flex justify-content-between align-items-center mb-3">


            <h5 class="mb-0">
                Branch List
            </h5>


            <a href="{{ route('super-admin.settings.branches.create') }}" 
               class="btn btn-light">

                <i class="bx bx-plus"></i>

                Create Branch

            </a>


        </div>



        <div class="table-responsive">


            <table class="table table-bordered table-striped">


                <thead>

                    <tr>

                        <th>#</th>

                        <th>Company</th>

                        <th>Branch Name</th>

                        <th>Contact</th>

                        <th>Website</th>

                        <th>Status</th>

                        <th>Action</th>

                    </tr>

                </thead>



                <tbody>


                @foreach ($branches as $key => $branch)


                    @include('super-admin.settings.components.delete-modal', [

                        'id' => 'deleteBranch' . $branch->id,

                        'action' => route('super-admin.settings.branches.destroy', $branch),

                        'message' => 'Are you sure you want to delete this branch?',

                    ])



                    <tr>


                        <td>
                            {{ $branches->firstItem() + $key }}
                        </td>



                        <td>

                            {{ $branch->company->name }}

                        </td>



                        <td>

                            <strong>
                                {{ $branch->name }}
                            </strong>

                            <br>

                            <small>
                                {{ $branch->address }}
                            </small>

                        </td>



                        <td>

                            {{ $branch->phone }}

                            <br>

                            <small>
                                {{ $branch->email }}
                            </small>

                        </td>



                        <td>


                            @if ($branch->website)

                                <a href="{{ $branch->website }}" target="_blank">
                                    Visit
                                </a>

                            @else

                                -

                            @endif


                        </td>



                        <td>


                            @if ($branch->status)

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


                                <a href="{{ route('super-admin.settings.branches.show', $branch) }}"
                                   class="btn btn-sm btn-light">

                                    View

                                </a>



                                <a href="{{ route('super-admin.settings.branches.edit', $branch->id) }}"
                                   class="btn btn-sm btn-light">

                                    Edit

                                </a>




                                <button type="button"
                                        class="btn btn-sm btn-light"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteBranch{{ $branch->id }}">

                                    Delete

                                </button>


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