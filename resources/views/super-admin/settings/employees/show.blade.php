@extends('layouts.super-admin')

@section('title','Employee Profile')


@section('content')


<div class="d-flex justify-content-between align-items-center mb-4">


    <div>

        <h4 class="mb-1">

            <i class="bx bx-user me-2"></i>

            Employee Profile

        </h4>


        <p class="text-muted mb-0">

            Complete employee information

        </p>

    </div>



    <div>


        <a href="{{ route('super-admin.settings.employees.index') }}"
           class="btn btn-light">


            <i class="bx bx-arrow-back"></i>

            Back


        </a>



        <a href="{{ route('super-admin.settings.employees.edit',$employee) }}"
           class="btn btn-primary">


            <i class="bx bx-edit"></i>

            Edit


        </a>


    </div>



</div>





{{-- Profile Header --}}


<div class="card radius-10">


<div class="card-body">


<div class="row align-items-center">



<div class="col-md-2 text-center">


@if(
$employee->photo &&
file_exists(public_path('storage/'.$employee->photo))
)


<img
src="{{ asset('storage/'.$employee->photo) }}"
class="rounded-circle shadow"
width="140"
height="140"
style="object-fit:cover">


@else


<div
class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center mx-auto"
style="width:140px;height:140px">


<i class="bx bx-user fs-1"></i>


</div>


@endif


</div>





<div class="col-md-10">


<h2>

{{ $employee->full_name }}

</h2>



<span class="badge bg-info">

{{ $employee->employee_code }}

</span>




@if($employee->status)


<span class="badge bg-success">

Active

</span>


@else


<span class="badge bg-danger">

Inactive

</span>


@endif





<h6 class="text-muted mt-3">


{{ $employee->designation->name ?? '-' }}


-


{{ $employee->department->name ?? '-' }}



</h6>



<p class="mb-0">


<i class="bx bx-calendar"></i>


Joined:


{{ $employee->joining_date?->format('d M Y') ?? '-' }}



</p>



</div>



</div>


</div>


</div>









{{-- Organization --}}


<div class="card mt-4 radius-10">


<div class="card-body">


<h5>

<i class="bx bx-building"></i>

Organization Information

</h5>



<hr>



<div class="row">



<div class="col-md-3 mb-3">

<strong>
Company
</strong>

<p>
{{ $employee->company->name ?? '-' }}
</p>

</div>




<div class="col-md-3 mb-3">

<strong>
Branch
</strong>

<p>
{{ $employee->branch->name ?? '-' }}
</p>

</div>




<div class="col-md-3 mb-3">

<strong>
Department
</strong>

<p>
{{ $employee->department->name ?? '-' }}
</p>

</div>




<div class="col-md-3 mb-3">

<strong>
Designation
</strong>

<p>
{{ $employee->designation->name ?? '-' }}
</p>

</div>



</div>


</div>

</div>









{{-- Personal Information --}}


<div class="card mt-4 radius-10">


<div class="card-body">


<h5>

<i class="bx bx-id-card"></i>

Personal Information

</h5>


<hr>



<div class="row">



<div class="col-md-3 mb-3">

<strong>
Gender
</strong>

<p>
{{ $employee->gender ?? '-' }}
</p>

</div>



<div class="col-md-3 mb-3">

<strong>
Date Of Birth
</strong>

<p>
{{ $employee->date_of_birth?->format('d M Y') ?? '-' }}
</p>

</div>




<div class="col-md-3 mb-3">

<strong>
Blood Group
</strong>

<p>
{{ $employee->blood_group ?? '-' }}
</p>

</div>



<div class="col-md-3 mb-3">

<strong>
Nationality
</strong>

<p>
{{ $employee->nationality ?? '-' }}
</p>

</div>




<div class="col-md-3 mb-3">

<strong>
Religion
</strong>

<p>
{{ $employee->religion ?? '-' }}
</p>

</div>




<div class="col-md-3 mb-3">

<strong>
Marital Status
</strong>

<p>
{{ $employee->marital_status ?? '-' }}
</p>

</div>




<div class="col-md-3 mb-3">

<strong>
National ID
</strong>

<p>
{{ $employee->national_id ?? '-' }}
</p>

</div>




<div class="col-md-3 mb-3">

<strong>
Passport
</strong>

<p>
{{ $employee->passport_no ?? '-' }}
</p>

</div>



</div>


</div>


</div>









{{-- Contact --}}


<div class="card mt-4 radius-10">


<div class="card-body">


<h5>

<i class="bx bx-phone"></i>

Contact Information

</h5>


<hr>


<div class="row">



<div class="col-md-4">

<strong>
Email
</strong>

<p>
{{ $employee->email ?? '-' }}
</p>

</div>



<div class="col-md-4">

<strong>
Phone
</strong>

<p>
{{ $employee->phone ?? '-' }}
</p>

</div>




<div class="col-md-4">

<strong>
Alternate Phone
</strong>

<p>
{{ $employee->alternate_phone ?? '-' }}
</p>

</div>



</div>


</div>


</div>









{{-- Address --}}


<div class="card mt-4 radius-10">


<div class="card-body">


<h5>

<i class="bx bx-map"></i>

Address

</h5>


<hr>



<div class="row">



<div class="col-md-6">

<strong>
Present Address
</strong>

<p>
{{ $employee->present_address ?? '-' }}
</p>

</div>



<div class="col-md-6">

<strong>
Permanent Address
</strong>

<p>
{{ $employee->permanent_address ?? '-' }}
</p>

</div>




<div class="col-md-3">

<strong>
City
</strong>

<p>
{{ $employee->city ?? '-' }}
</p>

</div>



<div class="col-md-3">

<strong>
State
</strong>

<p>
{{ $employee->state ?? '-' }}
</p>

</div>



<div class="col-md-3">

<strong>
Country
</strong>

<p>
{{ $employee->country ?? '-' }}
</p>

</div>



<div class="col-md-3">

<strong>
Postal Code
</strong>

<p>
{{ $employee->postal_code ?? '-' }}
</p>

</div>



</div>


</div>


</div>









{{-- Employment --}}


<div class="card mt-4 radius-10">


<div class="card-body">


<h5>

<i class="bx bx-briefcase"></i>

Employment Information

</h5>


<hr>



<div class="row">



<div class="col-md-3">

<strong>
Joining Date
</strong>

<p>
{{ $employee->joining_date?->format('d M Y') ?? '-' }}
</p>

</div>




<div class="col-md-3">

<strong>
Employment Type
</strong>

<p>
{{ $employee->employment_type ?? '-' }}
</p>

</div>




<div class="col-md-3">

<strong>
Employment Status
</strong>

<p>
{{ $employee->employment_status ?? '-' }}
</p>

</div>





<div class="col-md-3">

<strong>
Reporting Manager
</strong>

<p>

{{ $employee->reportingManager->full_name ?? '-' }}

</p>

</div>



</div>


</div>


</div>









{{-- Salary --}}


<div class="card mt-4 radius-10">


<div class="card-body">


<h5>

<i class="bx bx-money"></i>

Salary Information

</h5>


<hr>



<div class="row">



<div class="col-md-4">

<strong>
Basic Salary
</strong>

<p>

{{ number_format($employee->basic_salary ?? 0,2) }}

</p>

</div>




<div class="col-md-4">

<strong>
Hourly Rate
</strong>

<p>

{{ number_format($employee->hourly_rate ?? 0,2) }}

</p>

</div>




<div class="col-md-4">

<strong>
Overtime Rate
</strong>

<p>

{{ number_format($employee->overtime_rate ?? 0,2) }}

</p>

</div>



</div>


</div>


</div>









{{-- Team Members --}}


@if($employee->subordinates && $employee->subordinates->count())


<div class="card mt-4 radius-10">


<div class="card-body">


<h5>

<i class="bx bx-group"></i>

Team Members

</h5>


<hr>



<table class="table table-bordered">


<thead>

<tr>

<th>Name</th>

<th>Code</th>

<th>Designation</th>

</tr>

</thead>



<tbody>


@foreach($employee->subordinates as $staff)


<tr>

<td>
{{ $staff->full_name }}
</td>


<td>
{{ $staff->employee_code }}
</td>


<td>
{{ $staff->designation->name ?? '-' }}
</td>


</tr>


@endforeach


</tbody>


</table>


</div>


</div>


@endif







{{-- System Information --}}


<div class="card mt-4 radius-10">


<div class="card-body">


<h5>

<i class="bx bx-time"></i>

System Information

</h5>


<hr>



<div class="row">


<div class="col-md-6">


<strong>
Created At
</strong>


<p>

{{ $employee->created_at->format('d M Y h:i A') }}

</p>


</div>




<div class="col-md-6">


<strong>
Updated At
</strong>


<p>

{{ $employee->updated_at->format('d M Y h:i A') }}

</p>


</div>


</div>


</div>


</div>






@endsection