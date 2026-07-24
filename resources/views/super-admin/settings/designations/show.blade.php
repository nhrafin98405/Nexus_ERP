@extends('layouts.super-admin')

@section('title', 'Designation Details')


@section('content')


<div class="page-breadcrumb d-flex align-items-center mb-3">


    <div class="breadcrumb-title pe-3">

        Designation Details

    </div>


    <div class="ms-auto">


        <a href="{{ route('super-admin.settings.designations.index') }}"
           class="btn btn-secondary">


            <i class="bx bx-arrow-back"></i>

            Back


        </a>


        <a href="{{ route('super-admin.settings.designations.edit',$designation) }}"
           class="btn btn-primary">


            <i class="bx bx-edit"></i>

            Edit


        </a>


    </div>


</div>






<div class="card">



<div class="card-header">


<h5 class="mb-0">


<i class="bx bx-id-card me-2"></i>


{{ $designation->name }}


</h5>


</div>






<div class="card-body">



<div class="row">





<div class="col-md-4 mb-4">


<strong>

Designation Code

</strong>


<br>


<span class="badge bg-info">


{{ $designation->code }}


</span>


</div>







<div class="col-md-4 mb-4">


<strong>

Level

</strong>


<br>


<span class="badge bg-secondary">


Level {{ $designation->level }}


</span>


<br>


{{ $designation->level_name }}



</div>







<div class="col-md-4 mb-4">


<strong>

Status

</strong>


<br>


<span class="badge bg-{{ $designation->status_badge }}">


{{ $designation->status_text }}


</span>



</div>







</div>







<hr>






<h5 class="mb-3">


<i class="bx bx-buildings me-2"></i>


Organization


</h5>






<div class="row">



<div class="col-md-4 mb-3">


<strong>

Company

</strong>


<br>


{{ $designation->company->name ?? '-' }}



</div>







<div class="col-md-4 mb-3">


<strong>

Branch

</strong>


<br>


{{ $designation->branch->name ?? '-' }}



</div>







<div class="col-md-4 mb-3">


<strong>

Department

</strong>


<br>


{{ $designation->department->name ?? '-' }}



</div>






</div>







<hr>






<h5 class="mb-3">


<i class="bx bx-phone me-2"></i>


Contact Information


</h5>






<div class="row">



<div class="col-md-6 mb-3">


<strong>

Email

</strong>


<br>


{{ $designation->email ?? '-' }}



</div>







<div class="col-md-6 mb-3">


<strong>

Phone

</strong>


<br>


{{ $designation->phone ?? '-' }}



</div>




</div>







<hr>






<h5 class="mb-3">


<i class="bx bx-group me-2"></i>


Employee Information


</h5>





<div class="row">


<div class="col-md-4 mb-3">


<div class="card bg-light">


<div class="card-body text-center">


<h3>

{{ $designation->employee_count }}

</h3>


<p class="mb-0">

Total Employees

</p>


</div>


</div>


</div>



</div>







<hr>






<h5 class="mb-3">


<i class="bx bx-detail me-2"></i>


Description


</h5>





<div class="border rounded p-3">


{{ $designation->description ?? 'No description available.' }}



</div>








<hr>






<h5 class="mb-3">


<i class="bx bx-time me-2"></i>


System Information


</h5>






<div class="row">



<div class="col-md-6 mb-3">


<strong>

Created By

</strong>


<br>


{{ $designation->creator->name ?? '-' }}


</div>





<div class="col-md-6 mb-3">


<strong>

Updated By

</strong>


<br>


{{ $designation->updater->name ?? '-' }}


</div>






<div class="col-md-6 mb-3">


<strong>

Created At

</strong>


<br>


{{ $designation->created_at->format('d M Y h:i A') }}



</div>






<div class="col-md-6 mb-3">


<strong>

Updated At

</strong>


<br>


{{ $designation->updated_at->format('d M Y h:i A') }}



</div>





</div>





</div>


</div>



@endsection