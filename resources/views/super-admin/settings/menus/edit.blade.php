@extends('layouts.super-admin')

@section('title', 'Edit Menu')

@section('content')

<div class="card">

    <div class="card-header">
        <h5>Edit Menu</h5>
    </div>

    <div class="card-body">

        <form action="{{ route('super-admin.settings.menus.update',$menu) }}" method="POST">

            @csrf
            @method('PUT')

            @include('super-admin.settings.menus._form')

        </form>

    </div>

</div>

@endsection