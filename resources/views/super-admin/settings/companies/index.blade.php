@extends('layouts.super-admin')

@section('title', 'Companies')

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
    Company Management
</h6>

<hr>



<div class="card">

    <div class="card-body">


        <div class="d-flex justify-content-between align-items-center mb-3">


            <h5 class="mb-0">
                Company List
            </h5>


            <a href="{{ route('super-admin.settings.companies.create') }}"
                class="btn btn-light">


                <i class="bx bx-plus"></i>

                Create Company


            </a>


        </div>



        <div class="table-responsive">


            <table id="companiesTable"
                class="table table-bordered table-striped">


                <thead>

                    <tr>

                        <th>#</th>

                        <th>Logo</th>

                        <th>Name</th>

                        <th>Code</th>

                        <th>Contact</th>

                        <th>Website</th>

                        <th>Status</th>

                        <th>Action</th>

                    </tr>


                </thead>



                <tbody>


                @foreach($companies as $key => $company)


                    <tr>


                        <td>
                            {{ $key + 1 }}
                        </td>



                        <td>


                            @if($company->logo)

                                <img
                                    src="{{ asset('storage/'.$company->logo) }}"
                                    width="45"
                                    height="45"
                                    class="rounded-circle"
                                    style="object-fit:cover;">


                            @else


                                <i class="bx bx-building"
                                    style="font-size:35px;">
                                </i>


                            @endif


                        </td>




                        <td>


                            <strong>

                                {{ $company->name }}

                            </strong>


                            <br>


                            <small >

                                {{ $company->address }}

                            </small>


                        </td>




                        <td>


                            <span class="badge bg-info">

                                {{ $company->code }}

                            </span>


                        </td>




                        <td>


                            {{ $company->phone }}


                            <br>


                            <small>

                                {{ $company->email }}

                            </small>


                        </td>




                        <td>


                            @if($company->website)


                                <a href="{{ $company->website }}"
                                    target="_blank">

                                    Visit

                                </a>


                            @else


                                -


                            @endif


                        </td>




                        <td>


                            @if($company->status)


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



                                <a href="{{ route('super-admin.settings.companies.edit',$company->id) }}"
                                    class="btn btn-sm btn-light">


                                    Edit


                                </a>



                                <form
                                    action="{{ route('super-admin.settings.companies.destroy',$company->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this company?')">


                                    @csrf

                                    @method('DELETE')



                                    <button
                                        class="btn btn-sm btn-light">


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