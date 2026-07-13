@extends('layouts.super-admin')

@section('title', 'Create Employee')


@section('content')


@if ($errors->any())

<div class="alert alert-danger">

    <ul class="mb-0">

        @foreach($errors->all() as $error)

            <li>
                {{ $error }}
            </li>

        @endforeach

    </ul>

</div>

@endif




<div class="card">


    <div class="card-header">

        <h5>
            Create Employee
        </h5>

    </div>




    <div class="card-body">



        <form action="{{ route('super-admin.settings.employees.store') }}"
              method="POST"
              enctype="multipart/form-data">


            @csrf



            @include('super-admin.settings.employees._form')



        </form>


    </div>


</div>



@endsection