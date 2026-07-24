@extends('layouts.super-admin')

@section('title','Fuel Purchase Management')


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

<i class="bx bx-cart text-primary me-2"></i>

Fuel Purchase Management

</h4>


<p class="text-muted mb-0">

Manage fuel purchases and supplier transactions

</p>


</div>




<a href="{{ route('super-admin.settings.fuel-purchases.create') }}"
class="btn btn-primary shadow-sm">


<i class="bx bx-plus me-1"></i>

New Purchase


</a>


</div>







{{-- Summary Cards --}}

<div class="row g-3 mb-4">



<div class="col-lg-4 col-md-6">

<div class="card shadow-sm border-0">

<div class="card-body">


<div class="d-flex justify-content-between align-items-center">


<div>

<small class="text-muted">

Total Purchase

</small>


<h3 class="fw-bold mb-0">

{{ $purchases->total() }}

</h3>


</div>



<div class="bg-primary bg-opacity-10 rounded-circle p-3">

<i class="bx bx-cart text-primary fs-3"></i>

</div>


</div>


</div>

</div>

</div>







<div class="col-lg-4 col-md-6">

<div class="card shadow-sm border-0">

<div class="card-body">


<div class="d-flex justify-content-between align-items-center">


<div>

<small class="text-muted">

Total Amount

</small>


<h3 class="fw-bold mb-0">

৳ {{ number_format($purchases->sum('grand_total')) }}

</h3>


</div>



<div class="bg-success bg-opacity-10 rounded-circle p-3">

<i class="bx bx-money text-success fs-3"></i>

</div>


</div>


</div>

</div>

</div>








<div class="col-lg-4 col-md-6">

<div class="card shadow-sm border-0">

<div class="card-body">


<div class="d-flex justify-content-between align-items-center">


<div>

<small class="text-muted">

Due Amount

</small>


<h3 class="fw-bold mb-0">

৳ {{ number_format($purchases->sum('due_amount')) }}

</h3>


</div>



<div class="bg-danger bg-opacity-10 rounded-circle p-3">

<i class="bx bx-error-circle text-danger fs-3"></i>

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


<th>#</th>

<th>Purchase No</th>

<th>Supplier</th>

<th>Pump</th>

<th>Date</th>

<th>Total</th>

<th>Payment</th>

<th>Status</th>

<th class="text-center">
Action
</th>


</tr>


</thead>





<tbody>


@forelse($purchases as $purchase)


<tr>


<td>

{{ $loop->iteration }}

</td>





<td>

<strong>

{{ $purchase->purchase_no }}

</strong>

</td>







<td>

{{ $purchase->supplier->name ?? '-' }}

</td>







<td>

{{ $purchase->pump->name ?? '-' }}

</td>







<td>

{{ $purchase->purchase_date?->format('d M Y') }}

</td>







<td>

<strong>

৳ {{ number_format($purchase->grand_total,2) }}

</strong>

</td>








<td>


@if($purchase->payment_status == 'Paid')

<span class="badge bg-success">

Paid

</span>


@elseif($purchase->payment_status == 'Partial')

<span class="badge bg-warning text-dark">

Partial

</span>


@else

<span class="badge bg-danger">

Due

</span>


@endif


</td>







<td>


@if($purchase->status)

<span class="badge bg-success">

Active

</span>


@else

<span class="badge bg-danger">

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
href="{{ route('super-admin.settings.fuel-purchases.show',$purchase) }}">


<i class="bx bx-show me-2"></i>

View


</a>

</li>




<li>

<a class="dropdown-item"
href="{{ route('super-admin.settings.fuel-purchases.edit',$purchase) }}">


<i class="bx bx-edit me-2"></i>

Edit


</a>

</li>




<li>


<form action="{{ route('super-admin.settings.fuel-purchases.destroy',$purchase) }}"
method="POST">


@csrf

@method('DELETE')


<button class="dropdown-item text-danger"
onclick="return confirm('Delete this purchase?')">


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

<td colspan="9"
class="text-center py-5">


<i class="bx bx-cart display-4 text-muted"></i>


<h5 class="mt-3">

No Purchase Found

</h5>


<p class="text-muted">

Create your first fuel purchase

</p>


</td>

</tr>


@endforelse



</tbody>


</table>


</div>





<div class="mt-3">

{{ $purchases->links() }}

</div>


</div>


</div>



@endsection