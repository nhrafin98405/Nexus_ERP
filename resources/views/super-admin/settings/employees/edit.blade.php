@extends('layouts.super-admin')

@section('title','Edit Employee')


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


    <div class="card-header d-flex justify-content-between align-items-center">


        <h5 class="mb-0">

            <i class="bx bx-edit me-2"></i>

            Edit Employee

        </h5>



        <a
            href="{{ route('super-admin.settings.employees.index') }}"
            class="btn btn-secondary">


            <i class="bx bx-arrow-back"></i>

            Back


        </a>


    </div>





    <div class="card-body">


        <form

            action="{{ route('super-admin.settings.employees.update',$employee) }}"

            method="POST"

            enctype="multipart/form-data">


            @csrf

            @method('PUT')



            @include(
                'super-admin.settings.employees._form',
                [
                    'employee'=>$employee
                ]
            )



        </form>



    </div>



</div>



@endsection