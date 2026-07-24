@extends('layouts.super-admin')

@section('title','Stock Movement Ledger')


@section('content')


<div class="d-flex justify-content-between align-items-center mb-4">


<div>

<h4 class="fw-bold mb-1">

<i class="bx bx-transfer text-primary me-2"></i>

Stock Movement Ledger

</h4>


<p class="text-muted mb-0">

Track fuel stock movement history

</p>


</div>


</div>







{{-- Filter --}}


<div class="card shadow-sm border-0 mb-4">


<div class="card-body">


<form method="GET">


<div class="row g-3">



<div class="col-lg-4">


<label class="form-label fw-semibold">

Search Fuel

</label>


<input type="text"
name="search"
value="{{ request('search') }}"
class="form-control"
placeholder="Search fuel type">


</div>






<div class="col-lg-3">


<label class="form-label fw-semibold">

Movement Type

</label>


<select name="type"
class="form-select">


<option value="">

All

</option>


<option value="Purchase"
{{ request('type')=='Purchase'?'selected':'' }}>

Purchase

</option>



<option value="Sale"
{{ request('type')=='Sale'?'selected':'' }}>

Sale

</option>




<option value="Adjustment"
{{ request('type')=='Adjustment'?'selected':'' }}>

Adjustment

</option>


</select>


</div>






<div class="col-lg-2 d-flex align-items-end">


<button class="btn btn-primary w-100">

<i class="bx bx-search"></i>

Filter

</button>


</div>



<div class="col-lg-2 d-flex align-items-end">


<a href="{{ route('super-admin.settings.stock-movements.index') }}"
class="btn btn-light w-100">

Reset

</a>


</div>



</div>


</form>


</div>


</div>









{{-- Ledger Table --}}


<div class="card shadow-sm border-0">


<div class="card-body">



<div class="table-responsive">


<table class="table table-hover align-middle">


<thead class="table-light">


<tr>


<th>#</th>

<th>Date</th>

<th>Fuel</th>

<th>Tank</th>

<th>Type</th>

<th>Quantity</th>

<th>Created By</th>


</tr>


</thead>



<tbody>


@forelse($movements as $movement)


<tr>


<td>

{{ $loop->iteration }}

</td>




<td>

{{ $movement->created_at?->format('d M Y') }}

</td>





<td>

{{ $movement->fuelType->name ?? '-' }}

</td>





<td>

{{ $movement->tank->name ?? '-' }}

</td>





<td>


@if($movement->type=='Purchase')


<span class="badge bg-success">

Purchase

</span>



@elseif($movement->type=='Sale')


<span class="badge bg-danger">

Sale

</span>



@else


<span class="badge bg-warning text-dark">

Adjustment

</span>



@endif


</td>







<td>


@if($movement->type=='Purchase')


<span class="text-success fw-bold">

+ {{ number_format($movement->quantity,2) }}

</span>



@else


<span class="text-danger fw-bold">

- {{ number_format($movement->quantity,2) }}

</span>


@endif


</td>







<td>

{{ $movement->creator->name ?? '-' }}

</td>



</tr>



@empty


<tr>


<td colspan="7"
class="text-center text-muted">


No stock movement found


</td>


</tr>


@endforelse



</tbody>


</table>


</div>





{{ $movements->links() }}



</div>


</div>





@endsection