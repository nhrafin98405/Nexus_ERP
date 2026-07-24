@extends('layouts.super-admin')

@section('title','Edit Tank')


@section('content')


<div class="d-flex justify-content-between align-items-center mb-4">


<div>

<h4 class="fw-bold mb-1">

<i class="bx bx-cylinder text-warning me-2"></i>

Edit Tank

</h4>


<p class="text-muted mb-0">

Update fuel storage tank information

</p>


</div>




<div>


<a href="{{ route('super-admin.settings.tanks.index') }}"
class="btn btn-light shadow-sm">


<i class="bx bx-arrow-back me-1"></i>

Back


</a>


</div>


</div>







<div class="card shadow-sm border-0">


<div class="card-body">


<form action="{{ route('super-admin.settings.tanks.update',$tank) }}"
method="POST">


@csrf

@method('PUT')



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


<option value="{{ $company->id }}"


{{ $tank->company_id == $company->id ? 'selected':'' }}

>


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


<option value="{{ $pump->id }}"


{{ $tank->pump_id == $pump->id ? 'selected':'' }}

>


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


<option value="{{ $fuel->id }}"


{{ $tank->fuel_type_id == $fuel->id ? 'selected':'' }}

>


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









{{-- Name --}}

<div class="col-md-6">


<label class="form-label fw-semibold">

Tank Name

</label>


<input type="text"
name="name"
class="form-control"
value="{{ old('name',$tank->name) }}">



@error('name')

<small class="text-danger">

{{ $message }}

</small>

@enderror


</div>









{{-- Code --}}

<div class="col-md-6">


<label class="form-label fw-semibold">

Tank Code

</label>


<input type="text"
name="code"
class="form-control"
value="{{ old('code',$tank->code) }}">



@error('code')

<small class="text-danger">

{{ $message }}

</small>

@enderror


</div>









{{-- Capacity --}}

<div class="col-md-6">


<label class="form-label fw-semibold">

Capacity

</label>



<div class="input-group">


<input type="number"
step="0.01"
name="capacity"
class="form-control"
value="{{ old('capacity',$tank->capacity) }}">


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









{{-- Stock --}}

<div class="col-md-6">


<label class="form-label fw-semibold">

Current Stock

</label>



<div class="input-group">


<input type="number"
step="0.01"
name="current_stock"
class="form-control"
value="{{ old('current_stock',$tank->current_stock) }}">


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



<option value="1"

{{ $tank->status == 1 ? 'selected':'' }}

>

Active

</option>



<option value="0"

{{ $tank->status == 0 ? 'selected':'' }}

>

Inactive

</option>



</select>


</div>






</div>







<hr class="my-4">



<div class="d-flex justify-content-end">



<a href="{{ route('super-admin.settings.tanks.index') }}"
class="btn btn-light me-2">


Cancel


</a>





<button type="submit"
class="btn btn-warning">


<i class="bx bx-save me-1"></i>


Update Tank


</button>



</div>





</form>


</div>


</div>



@endsection