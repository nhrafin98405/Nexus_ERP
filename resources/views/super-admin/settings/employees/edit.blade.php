@extends('layouts.super-admin')

@section('title', 'Edit Employee')


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

            Edit Employee

        </h5>


    </div>





    <div class="card-body">



        <form action="{{ route('super-admin.settings.employees.update', $employee) }}"
              method="POST"
              enctype="multipart/form-data">


            @csrf

            @method('PUT')



            @include('super-admin.settings.employees._form')



        </form>



    </div>



</div>




@endsection