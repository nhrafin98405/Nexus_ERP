@extends('layouts.super-admin')

@section('title', 'Designations')


@section('content')


<div class="page-breadcrumb d-flex align-items-center mb-3">

    <div class="breadcrumb-title pe-3">

        Designations

    </div>


    <div class="ms-auto">

        <a href="{{ route('super-admin.settings.designations.create') }}"
           class="btn btn-primary">

            <i class="bx bx-plus"></i>

            Create Designation

        </a>

    </div>


</div>





@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

    {{ session('success') }}

    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">

    </button>

</div>

@endif






@if(session('error'))

<div class="alert alert-danger alert-dismissible fade show">

    {{ session('error') }}

    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">

    </button>

</div>

@endif







<div class="card">


<div class="card-body">



<div class="table-responsive">


<table class="table table-bordered table-striped align-middle">



<thead class="table-light">


<tr>

<th width="5%">#</th>

<th>Organization</th>

<th>Department</th>

<th>Designation</th>

<th>Level</th>

<th>Employees</th>

<th>Status</th>

<th width="15%">Action</th>


</tr>


</thead>





<tbody>



@forelse($designations as $key => $designation)



<tr>


<td>

{{ $designations->firstItem() + $key }}

</td>





<td>


<strong>

{{ $designation->company->name ?? '-' }}

</strong>


<br>


<small class="text-muted">

{{ $designation->branch->name ?? '-' }}

</small>


</td>







<td>


<strong>

{{ $designation->department->name ?? '-' }}

</strong>


<br>


<small>

{{ $designation->department->code ?? '' }}

</small>


</td>








<td>


<strong>

{{ $designation->name }}

</strong>


<br>


<span class="badge bg-info">

{{ $designation->code }}

</span>


@if($designation->is_system)

<span class="badge bg-warning">

System

</span>

@endif


</td>








<td>


<span class="badge bg-secondary">


Level {{ $designation->level }}


</span>


<br>


<small>

{{ $designation->level_name }}

</small>


</td>









<td>


<span class="badge bg-primary">


{{ $designation->employee_count }}

</span>


Employees


</td>









<td>


<span class="badge bg-{{ $designation->status_badge }}">


{{ $designation->status_text }}


</span>


</td>









<td>


<div class="dropdown">


<button class="btn btn-light btn-sm dropdown-toggle"
        data-bs-toggle="dropdown">


Action


</button>



<ul class="dropdown-menu">



<li>


<a class="dropdown-item"

href="{{ route(
'super-admin.settings.designations.show',
$designation
) }}">


<i class="bx bx-show"></i>

View


</a>


</li>






<li>


<a class="dropdown-item"

href="{{ route(
'super-admin.settings.designations.edit',
$designation
) }}">


<i class="bx bx-edit"></i>

Edit


</a>


</li>






@if($designation->canDelete())


<li>


<hr class="dropdown-divider">


</li>


<li>


<button class="dropdown-item text-danger"

data-bs-toggle="modal"

data-bs-target="#delete{{ $designation->id }}">


<i class="bx bx-trash"></i>

Delete


</button>


</li>


@endif





</ul>


</div>



</td>





</tr>






@include(
'super-admin.settings.components.delete-modal',
[

'id'=>'delete'.$designation->id,

'action'=>route(
'super-admin.settings.designations.destroy',
$designation
),

'message'=>'Delete this designation?'

])







@empty


<tr>


<td colspan="8"
class="text-center">


No designation found.


</td>


</tr>


@endforelse





</tbody>



</table>



</div>






@if($designations->hasPages())


<div class="mt-3">


{{ $designations->links() }}


</div>


@endif





</div>


</div>



@endsection