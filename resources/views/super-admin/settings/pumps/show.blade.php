@extends('layouts.super-admin')

@section('title','Pump Dashboard')


@section('content')


{{-- Header --}}
<div class="d-flex justify-content-between align-items-center mb-4">


<div>

<h4 class="fw-bold mb-1">

<i class="bx bx-gas-pump text-primary me-2"></i>

Pump Dashboard

</h4>


<p class="text-muted mb-0">

Manage complete petrol pump operation

</p>


</div>



<div class="d-flex gap-2">


<a href="{{ route('super-admin.settings.pumps.index') }}"
class="btn btn-light shadow-sm">

<i class="bx bx-arrow-back"></i>

Back

</a>



<a href="{{ route('super-admin.settings.pumps.edit',$pump) }}"
class="btn btn-warning shadow-sm">

<i class="bx bx-edit"></i>

Edit

</a>


</div>


</div>








{{-- Pump Profile --}}

<div class="card shadow-sm border-0 mb-4">


<div class="card-body">


<div class="row align-items-center">


<div class="col-lg-8">


<div class="d-flex align-items-center">


<div class="bg-primary bg-opacity-10 rounded-circle p-4 me-3">

<i class="bx bx-gas-pump text-primary display-5"></i>

</div>




<div>


<h3 class="fw-bold mb-2">

{{ $pump->name }}

</h3>


<p class="mb-1">

<strong>Code:</strong>

{{ $pump->code }}

</p>


<p class="mb-1">

<strong>Owner:</strong>

{{ $pump->owner_name ?? '-' }}

</p>


<p class="mb-1">

<strong>Phone:</strong>

{{ $pump->phone ?? '-' }}

</p>


<p class="mb-0">

<strong>Email:</strong>

{{ $pump->email ?? '-' }}

</p>


</div>


</div>


</div>





<div class="col-lg-4 text-lg-end mt-3 mt-lg-0">


@if($pump->status)

<span class="badge bg-success fs-6">

Active Pump

</span>

@else

<span class="badge bg-danger fs-6">

Inactive Pump

</span>

@endif



<br>


<small class="text-muted">

Created:

{{ $pump->created_at?->format('d M Y') }}

</small>


</div>


</div>


</div>


</div>








{{-- Statistics --}}

<div class="row g-3 mb-4">





<div class="col-lg-3 col-md-6">

<div class="card shadow-sm border-start border-primary border-4">


<div class="card-body">


<div class="d-flex justify-content-between">


<div>

<small class="text-muted">

Tanks

</small>


<h3 class="fw-bold">

{{ $totalTank ?? 0 }}

</h3>


</div>


<i class="bx bx-cylinder text-primary fs-1"></i>


</div>


</div>


</div>


</div>








<div class="col-lg-3 col-md-6">

<div class="card shadow-sm border-start border-success border-4">


<div class="card-body">


<div class="d-flex justify-content-between">


<div>

<small class="text-muted">

Employees

</small>


<h3 class="fw-bold">

{{ $totalEmployee ?? 0 }}

</h3>


</div>


<i class="bx bx-group text-success fs-1"></i>


</div>


</div>


</div>


</div>









<div class="col-lg-3 col-md-6">

<div class="card shadow-sm border-start border-warning border-4">


<div class="card-body">


<div class="d-flex justify-content-between">


<div>

<small class="text-muted">

Fuel Types

</small>


<h3 class="fw-bold">

{{ $totalFuelType ?? 0 }}

</h3>


</div>


<i class="bx bx-droplet text-warning fs-1"></i>


</div>


</div>


</div>


</div>









<div class="col-lg-3 col-md-6">

<div class="card shadow-sm border-start border-danger border-4">


<div class="card-body">


<div class="d-flex justify-content-between">


<div>

<small class="text-muted">

Nozzles

</small>


<h3 class="fw-bold">

{{ $totalNozzle ?? 0 }}

</h3>


</div>


<i class="bx bx-target-lock text-danger fs-1"></i>


</div>


</div>


</div>


</div>





</div>








{{-- Modules --}}

<div class="card shadow-sm border-0">


<div class="card-header bg-white">


<h5 class="fw-bold mb-0">

<i class="bx bx-grid-alt me-2"></i>

Pump Modules

</h5>


</div>



<div class="card-body">


<div class="row g-4">





{{-- Tank --}}

<div class="col-lg-4 col-md-6">


<a href="{{ route('super-admin.settings.tanks.index') }}"
class="text-decoration-none">


<div class="card h-100 shadow-sm border-0">


<div class="card-body text-center">


<i class="bx bx-cylinder text-primary display-4"></i>



<h5 class="fw-bold mt-3 text-dark">

Tanks

</h5>


<p class="text-muted">

Manage Fuel Storage Tank

</p>


<span class="badge bg-primary">

{{ $totalTank ?? 0 }}

</span>


</div>


</div>


</a>


</div>








{{-- Nozzle --}}

<div class="col-lg-4 col-md-6">


<a href="{{ route('super-admin.settings.nozzles.index') }}"
class="text-decoration-none">


<div class="card h-100 shadow-sm border-0">


<div class="card-body text-center">


<i class="bx bx-target-lock text-success display-4"></i>



<h5 class="fw-bold mt-3 text-dark">

Nozzles

</h5>


<p class="text-muted">

Manage Fuel Dispensing

</p>


<span class="badge bg-success">

{{ $totalNozzle ?? 0 }}

</span>


</div>


</div>


</a>


</div>








{{-- Fuel --}}

<div class="col-lg-4 col-md-6">


<a href="{{ route('super-admin.settings.fuel-types.index') }}"
class="text-decoration-none">


<div class="card h-100 shadow-sm border-0">


<div class="card-body text-center">


<i class="bx bx-droplet text-warning display-4"></i>



<h5 class="fw-bold mt-3 text-dark">

Fuel Types

</h5>


<p class="text-muted">

Manage Fuel Category

</p>


<span class="badge bg-warning text-dark">

{{ $totalFuelType ?? 0 }}

</span>


</div>


</div>


</a>


</div>







</div>


</div>


</div>








{{-- Information --}}

<div class="row mt-4">


<div class="col-lg-8">


<div class="card shadow-sm border-0">


<div class="card-header">


<h5 class="fw-bold mb-0">

Pump Information

</h5>


</div>



<div class="card-body">


<div class="row">


<div class="col-md-6 mb-3">

<strong>Name</strong>

<br>

{{ $pump->name }}

</div>



<div class="col-md-6 mb-3">

<strong>Code</strong>

<br>

{{ $pump->code }}

</div>



<div class="col-md-6 mb-3">

<strong>Owner</strong>

<br>

{{ $pump->owner_name ?? '-' }}

</div>



<div class="col-md-6 mb-3">

<strong>Phone</strong>

<br>

{{ $pump->phone ?? '-' }}

</div>


<div class="col-12">

<strong>Address</strong>


<div class="bg-light rounded p-3 mt-2">

{{ $pump->address ?? '-' }}

</div>


</div>



</div>


</div>


</div>


</div>





<div class="col-lg-4">


<div class="card shadow-sm border-0">


<div class="card-header">

<h5 class="fw-bold mb-0">

System Status

</h5>

</div>



<div class="card-body text-center">


<i class="bx bx-shield-check text-success display-3"></i>


<h5 class="mt-3">

Pump System Running

</h5>


<p class="text-muted">

All modules are connected

</p>


</div>


</div>


</div>


</div>




@endsection