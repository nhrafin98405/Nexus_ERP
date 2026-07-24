@extends('layouts.super-admin')

@section('title','Nozzle Management')


@section('content')


@if(session('success'))

<div class="alert alert-success alert-dismissible fade show shadow-sm">

    <i class="bx bx-check-circle me-2"></i>

    {{ session('success') }}

    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
    </button>

</div>

@endif





{{-- Header --}}

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h4 class="fw-bold mb-1">

            <i class="bx bx-target-lock text-primary me-2"></i>

            Nozzle Management

        </h4>


        <p class="text-muted mb-0">

            Control fuel dispensing points and meter readings

        </p>

    </div>



    <a href="{{ route('super-admin.settings.nozzles.create') }}"
       class="btn btn-primary shadow-sm">

        <i class="bx bx-plus me-1"></i>

        Add New Nozzle

    </a>


</div>






{{-- Summary --}}

<div class="row g-3 mb-4">


<div class="col-md-4">

<div class="card border-0 shadow-sm h-100">

<div class="card-body">


<div class="d-flex justify-content-between align-items-center">


<div>

<span class="text-muted">

Total Nozzles

</span>


<h2 class="fw-bold mb-0">

{{ $nozzles->total() }}

</h2>


</div>



<div class="bg-primary bg-opacity-10 rounded-circle p-3">

<i class="bx bx-target-lock text-primary fs-2"></i>

</div>


</div>


</div>

</div>

</div>





<div class="col-md-4">

<div class="card border-0 shadow-sm h-100">

<div class="card-body">


<div class="d-flex justify-content-between align-items-center">


<div>

<span class="text-muted">

Active

</span>


<h2 class="fw-bold text-success mb-0">

{{ $nozzles->where('status',1)->count() }}

</h2>


</div>


<div class="bg-success bg-opacity-10 rounded-circle p-3">

<i class="bx bx-check-circle text-success fs-2"></i>

</div>


</div>


</div>

</div>

</div>







<div class="col-md-4">

<div class="card border-0 shadow-sm h-100">

<div class="card-body">


<div class="d-flex justify-content-between align-items-center">


<div>

<span class="text-muted">

Inactive

</span>


<h2 class="fw-bold text-danger mb-0">

{{ $nozzles->where('status',0)->count() }}

</h2>


</div>


<div class="bg-danger bg-opacity-10 rounded-circle p-3">

<i class="bx bx-x-circle text-danger fs-2"></i>

</div>


</div>


</div>

</div>

</div>



</div>










{{-- Table --}}


<div class="card shadow-sm border-0">


<div class="card-body">


<div class="table-responsive">


<table class="table table-hover align-middle">


<thead class="table-light">


<tr>


<th width="50">

#

</th>


<th>

Nozzle

</th>


<th>

Pump

</th>


<th>

Tank

</th>


<th>

Fuel

</th>


<th>

Meter Reading

</th>


<th>

Status

</th>


<th class="text-center">

Action

</th>


</tr>


</thead>



<tbody>



@forelse($nozzles as $nozzle)



<tr>



<td>

{{ $loop->iteration }}

</td>





<td>


<div class="d-flex align-items-center">


<div class="avatar rounded-circle bg-primary bg-opacity-10 p-2 me-2">


<i class="bx bx-target-lock text-primary fs-5"></i>


</div>


<div>


<h6 class="mb-0">

{{ $nozzle->name }}

</h6>


<small class="text-muted">

{{ $nozzle->code }}

</small>


</div>


</div>


</td>








<td>


<i class="bx bx-gas-pump text-primary me-1"></i>


{{ $nozzle->pump->name ?? '-' }}


</td>







<td>


<i class="bx bx-cylinder text-warning me-1"></i>


{{ $nozzle->tank->name ?? '-' }}


</td>







<td>


<span class="badge rounded-pill px-3 py-2"

style="
background:{{ $nozzle->fuelType->color ?? '#777' }};
">


{{ $nozzle->fuelType->name ?? '-' }}


</span>


</td>









<td>


<div class="small">


Start :

<strong>

{{ number_format($nozzle->meter_start,2) }}

</strong>


</div>


<div class="small">


Current :

<strong class="text-primary">

{{ number_format($nozzle->meter_current,2) }}

</strong>


</div>



</td>









<td>


@if($nozzle->status)


<span class="badge bg-success rounded-pill">

Active

</span>


@else


<span class="badge bg-danger rounded-pill">

Inactive

</span>


@endif


</td>








<td class="text-center">


<div class="dropdown">


<button class="btn btn-light btn-sm"
data-bs-toggle="dropdown">


<i class="bx bx-dots-vertical-rounded"></i>


</button>



<ul class="dropdown-menu dropdown-menu-end">



<li>

<a class="dropdown-item"
href="{{ route('super-admin.settings.nozzles.show',$nozzle) }}">

<i class="bx bx-show me-2"></i>

View

</a>

</li>




<li>

<a class="dropdown-item"
href="{{ route('super-admin.settings.nozzles.edit',$nozzle) }}">

<i class="bx bx-edit me-2"></i>

Edit

</a>

</li>





<li>


<form action="{{ route('super-admin.settings.nozzles.destroy',$nozzle) }}"
method="POST">


@csrf

@method('DELETE')


<button class="dropdown-item text-danger"
onclick="return confirm('Delete nozzle?')">


<i class="bx bx-trash me-2"></i>

Delete


</button>


</form>


</li>



</ul>



</div>


</td>


</tr>





@empty


<tr>


<td colspan="8"
class="text-center py-5">


<i class="bx bx-target-lock display-3 text-muted"></i>


<h5 class="mt-3">

Nozzle Not Found

</h5>


<p class="text-muted">

Create your first fuel dispensing nozzle

</p>


</td>


</tr>


@endforelse




</tbody>


</table>


</div>





<div class="mt-3">

{{ $nozzles->links() }}

</div>



</div>


</div>



@endsection