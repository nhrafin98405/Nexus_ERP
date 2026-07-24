@extends('layouts.super-admin')

@section('title','Tank Details')


@section('content')



<div class="d-flex justify-content-between align-items-center mb-4">


<div>


<h4 class="fw-bold mb-1">


<i class="bx bx-cylinder text-primary me-2"></i>


{{ $tank->name }}


</h4>



<p class="text-muted mb-0">

Fuel Storage Tank Details

</p>



</div>




<div>


<a href="{{ route('super-admin.settings.tanks.index') }}"
class="btn btn-light shadow-sm">


<i class="bx bx-arrow-back me-1"></i>

Back


</a>



<a href="{{ route('super-admin.settings.tanks.edit',$tank) }}"
class="btn btn-warning">


<i class="bx bx-edit me-1"></i>

Edit


</a>


</div>


</div>









{{-- Top Summary --}}


<div class="row g-3 mb-4">





<div class="col-md-3">


<div class="card shadow-sm border-0">


<div class="card-body">


<div class="d-flex justify-content-between">


<div>


<small class="text-muted">

Capacity

</small>


<h3 class="fw-bold mb-0">


{{ number_format($tank->capacity) }}


</h3>


<small>

Liter

</small>


</div>



<i class="bx bx-cylinder display-5 text-primary"></i>



</div>


</div>


</div>


</div>









<div class="col-md-3">


<div class="card shadow-sm border-0">


<div class="card-body">


<div class="d-flex justify-content-between">


<div>


<small class="text-muted">

Current Stock

</small>


<h3 class="fw-bold mb-0">


{{ number_format($tank->current_stock) }}


</h3>


<small>

Liter

</small>


</div>



<i class="bx bx-droplet display-5 text-success"></i>



</div>


</div>


</div>


</div>









<div class="col-md-3">


<div class="card shadow-sm border-0">


<div class="card-body">


<div class="d-flex justify-content-between">


<div>


<small class="text-muted">

Fuel Type

</small>


<h5 class="fw-bold mt-2">


{{ $tank->fuelType->name ?? '-' }}


</h5>


</div>



<i class="bx bx-gas-pump display-5 text-warning"></i>



</div>


</div>


</div>


</div>








<div class="col-md-3">


<div class="card shadow-sm border-0">


<div class="card-body">


<div class="d-flex justify-content-between">


<div>


<small class="text-muted">

Status

</small>



<h5 class="mt-2">


@if($tank->status)


<span class="badge bg-success">

Active

</span>


@else


<span class="badge bg-danger">

Inactive

</span>


@endif



</h5>



</div>



<i class="bx bx-check-circle display-5 text-info"></i>



</div>


</div>


</div>


</div>




</div>









<div class="row">







{{-- Information --}}


<div class="col-lg-8">


<div class="card shadow-sm border-0">


<div class="card-header bg-white">


<h5 class="mb-0">


<i class="bx bx-info-circle me-2"></i>


Tank Information


</h5>


</div>



<div class="card-body">


<div class="row">





<div class="col-md-6 mb-3">


<strong>

Tank Name

</strong>


<p class="text-muted">

{{ $tank->name }}

</p>


</div>






<div class="col-md-6 mb-3">


<strong>

Tank Code

</strong>


<p class="text-muted">

{{ $tank->code }}

</p>


</div>







<div class="col-md-6 mb-3">


<strong>

Company

</strong>


<p class="text-muted">

{{ $tank->company->name ?? '-' }}

</p>


</div>







<div class="col-md-6 mb-3">


<strong>

Pump

</strong>


<p class="text-muted">

{{ $tank->pump->name ?? '-' }}

</p>


</div>








<div class="col-md-6 mb-3">


<strong>

Created Date

</strong>


<p class="text-muted">


{{ $tank->created_at?->format('d M Y h:i A') }}


</p>


</div>








<div class="col-md-6 mb-3">


<strong>

Last Update

</strong>


<p class="text-muted">


{{ $tank->updated_at?->format('d M Y h:i A') }}


</p>


</div>




</div>



</div>


</div>


</div>









{{-- Activity --}}


<div class="col-lg-4">


<div class="card shadow-sm border-0">


<div class="card-header bg-white">


<h5 class="mb-0">


<i class="bx bx-history me-2"></i>


Activity


</h5>


</div>



<div class="card-body">


<ul class="list-group list-group-flush">



<li class="list-group-item d-flex justify-content-between">


<span>

Created By

</span>


<strong>

{{ optional($tank->creator)->name ?? '-' }}

</strong>


</li>





<li class="list-group-item d-flex justify-content-between">


<span>

Updated By

</span>


<strong>

{{ optional($tank->updater)->name ?? '-' }}

</strong>


</li>





<li class="list-group-item d-flex justify-content-between">


<span>

Fuel

</span>


<strong>

{{ $tank->fuelType->name ?? '-' }}

</strong>


</li>





</ul>



</div>


</div>






<div class="card shadow-sm border-0 mt-4">


<div class="card-body text-center">


<i class="bx bx-cylinder display-3 text-primary"></i>



<h5 class="mt-3">

{{ $tank->name }}

</h5>



<p class="text-muted">

Storage capacity management system

</p>



</div>


</div>



</div>




</div>




@endsection