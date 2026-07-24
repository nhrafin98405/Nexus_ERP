@extends('layouts.super-admin')

@section('title','Create Nozzle')


@section('content')


<div class="d-flex justify-content-between align-items-center mb-4">

<div>

<h4 class="fw-bold mb-1">

<i class="bx bx-target-lock text-primary me-2"></i>

Create New Nozzle

</h4>


<p class="text-muted mb-0">

Setup fuel dispensing nozzle information

</p>


</div>


<a href="{{ route('super-admin.settings.nozzles.index') }}"
class="btn btn-light shadow-sm">

<i class="bx bx-arrow-back me-1"></i>

Back

</a>


</div>







@if($errors->any())

<div class="alert alert-danger shadow-sm">

<div class="fw-bold mb-2">

<i class="bx bx-error-circle me-1"></i>

Please fix these errors

</div>


<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>


</div>

@endif







<div class="card shadow-sm border-0">


<div class="card-header bg-white">


<h5 class="mb-0 fw-bold">

<i class="bx bx-info-circle text-primary me-2"></i>

Nozzle Information

</h5>


</div>





<div class="card-body">


<form action="{{ route('super-admin.settings.nozzles.store') }}"
method="POST">

@csrf




<div class="row g-4">







{{-- Company --}}

<div class="col-lg-6">

<label class="form-label fw-semibold">

<i class="bx bx-buildings me-1"></i>

Company

</label>


<select name="company_id"
class="form-select">


<option value="">

Select Company

</option>


@foreach($companies as $company)

<option value="{{ $company->id }}"
{{ old('company_id')==$company->id?'selected':'' }}>

{{ $company->name }}

</option>

@endforeach


</select>


</div>









{{-- Pump --}}

<div class="col-lg-6">


<label class="form-label fw-semibold">

<i class="bx bx-gas-pump me-1"></i>

Pump

</label>


<select name="pump_id"
class="form-select">


<option value="">

Select Pump

</option>


@foreach($pumps as $pump)

<option value="{{ $pump->id }}"
{{ old('pump_id')==$pump->id?'selected':'' }}>

{{ $pump->name }}

</option>

@endforeach


</select>


</div>









{{-- Tank --}}

<div class="col-lg-6">


<label class="form-label fw-semibold">

<i class="bx bx-cylinder me-1"></i>

Fuel Tank

</label>


<select name="tank_id"
class="form-select">


<option value="">

Select Tank

</option>


@foreach($tanks as $tank)

<option value="{{ $tank->id }}"
{{ old('tank_id')==$tank->id?'selected':'' }}>

{{ $tank->name }}

</option>

@endforeach


</select>


</div>









{{-- Fuel --}}

<div class="col-lg-6">


<label class="form-label fw-semibold">

<i class="bx bx-droplet me-1"></i>

Fuel Type

</label>


<select name="fuel_type_id"
class="form-select">


<option value="">

Select Fuel

</option>


@foreach($fuelTypes as $fuel)


<option value="{{ $fuel->id }}"
{{ old('fuel_type_id')==$fuel->id?'selected':'' }}>

{{ $fuel->name }}

</option>


@endforeach


</select>


</div>









<div class="col-12">


<hr>


<h6 class="fw-bold">

<i class="bx bx-target-lock text-primary me-2"></i>

Nozzle Details

</h6>


</div>









{{-- Name --}}

<div class="col-lg-6">


<label class="form-label fw-semibold">

Nozzle Name

</label>


<div class="input-group">


<span class="input-group-text">

<i class="bx bx-target-lock"></i>

</span>


<input type="text"
name="name"
value="{{ old('name') }}"
class="form-control"
placeholder="Diesel Nozzle 01">


</div>


</div>









{{-- Code --}}

<div class="col-lg-6">


<label class="form-label fw-semibold">

Nozzle Code

</label>


<div class="input-group">


<span class="input-group-text">

<i class="bx bx-barcode"></i>

</span>


<input type="text"
name="code"
value="{{ old('code') }}"
class="form-control"
placeholder="DSL-N01">


</div>


</div>









{{-- Meter Start --}}

<div class="col-lg-6">


<label class="form-label fw-semibold">

Opening Meter

</label>


<input type="number"
step="0.01"
name="meter_start"
value="{{ old('meter_start',0) }}"
class="form-control">


</div>









{{-- Current Meter --}}

<div class="col-lg-6">


<label class="form-label fw-semibold">

Current Meter

</label>


<input type="number"
step="0.01"
name="meter_current"
value="{{ old('meter_current',0) }}"
class="form-control">


</div>









{{-- Status --}}

<div class="col-lg-6">


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







<div class="border-top mt-4 pt-4 text-end">


<a href="{{ route('super-admin.settings.nozzles.index') }}"
class="btn btn-light me-2">


Cancel

</a>



<button class="btn btn-primary px-4">


<i class="bx bx-save me-1"></i>

Save Nozzle


</button>



</div>





</form>


</div>


</div>



@endsection