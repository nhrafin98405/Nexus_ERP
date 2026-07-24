@extends('layouts.super-admin')

@section('title','Create Tank')


@section('content')


<div class="d-flex justify-content-between align-items-center mb-4">


<div>

<h4 class="fw-bold mb-1">

<i class="bx bx-cylinder text-primary me-2"></i>

Create New Tank

</h4>


<p class="text-muted mb-0">

Add new fuel storage tank

</p>


</div>



<a href="{{ route('super-admin.settings.tanks.index') }}"
class="btn btn-light shadow-sm">


<i class="bx bx-arrow-back me-1"></i>

Back


</a>


</div>








<div class="card shadow-sm border-0">


<div class="card-body">


<form action="{{ route('super-admin.settings.tanks.store') }}"
method="POST">


@csrf



<div class="row g-3">







{{-- Company --}}

<div class="col-md-6">


<label class="form-label fw-semibold">

Company

</label>


<select name="company_id"
class="form-select">


<option value="">

Select Company

</option>


@foreach($companies as $company)


<option value="{{ $company->id }}">

{{ $company->name }}

</option>


@endforeach


</select>



@error('company_id')

<small class="text-danger">

{{ $message }}

</small>

@enderror


</div>










{{-- Pump --}}

<div class="col-md-6">


<label class="form-label fw-semibold">

Pump

</label>



<select name="pump_id"
class="form-select"
required>


<option value="">

Select Pump

</option>



@foreach($pumps as $pump)


<option value="{{ $pump->id }}">


{{ $pump->name }}


</option>



@endforeach



</select>


@error('pump_id')

<small class="text-danger">

{{ $message }}

</small>

@enderror


</div>









{{-- Fuel Type --}}

<div class="col-md-6">


<label class="form-label fw-semibold">

Fuel Type

</label>



<select name="fuel_type_id"
class="form-select"
required>



<option value="">

Select Fuel

</option>



@foreach($fuelTypes as $fuel)



<option value="{{ $fuel->id }}">


{{ $fuel->name }}


</option>


@endforeach



</select>


@error('fuel_type_id')

<small class="text-danger">

{{ $message }}

</small>

@enderror


</div>









{{-- Tank Name --}}

<div class="col-md-6">


<label class="form-label fw-semibold">

Tank Name

</label>


<input type="text"
name="name"
class="form-control"
placeholder="Example: Diesel Tank 01"
value="{{ old('name') }}">



@error('name')

<small class="text-danger">

{{ $message }}

</small>

@enderror


</div>









{{-- Tank Code --}}

<div class="col-md-6">


<label class="form-label fw-semibold">

Tank Code

</label>



<input type="text"
name="code"
class="form-control"
placeholder="TANK001"
value="{{ old('code') }}">



@error('code')

<small class="text-danger">

{{ $message }}

</small>

@enderror


</div>









{{-- Capacity --}}

<div class="col-md-6">


<label class="form-label fw-semibold">

Capacity (Liter)

</label>


<div class="input-group">


<input type="number"
step="0.01"
name="capacity"
class="form-control"
placeholder="10000">


<span class="input-group-text">

Liter

</span>


</div>


@error('capacity')

<small class="text-danger">

{{ $message }}

</small>

@enderror


</div>









{{-- Current Stock --}}

<div class="col-md-6">


<label class="form-label fw-semibold">

Opening Stock

</label>


<div class="input-group">


<input type="number"
step="0.01"
name="current_stock"
class="form-control"
placeholder="0">


<span class="input-group-text">

Liter

</span>


</div>



@error('current_stock')

<small class="text-danger">

{{ $message }}

</small>

@enderror



</div>









{{-- Status --}}

<div class="col-md-6">


<label class="form-label fw-semibold">

Status

</label>



<select name="status"
class="form-select">


<option value="1">

Active

</option>


<option value="0">

Inactive

</option>


</select>


</div>



</div>








<hr class="my-4">



<div class="text-end">


<a href="{{ route('super-admin.settings.tanks.index') }}"
class="btn btn-light me-2">


Cancel


</a>




<button type="submit"
class="btn btn-primary">


<i class="bx bx-save me-1"></i>


Save Tank


</button>



</div>




</form>


</div>


</div>



@endsection