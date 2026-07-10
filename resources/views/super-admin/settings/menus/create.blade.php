@extends('layouts.super-admin')

@section('title', 'Create Menu')

@section('content')

<div class="card">

    <div class="card-header">
        <h5>Create Menu</h5>
    </div>

    <div class="card-body">

        <form action="{{ route('super-admin.settings.menus.store') }}" method="POST">

            @csrf

            @include('super-admin.settings.menus._form')

        </form>

    </div>

</div>

@endsection