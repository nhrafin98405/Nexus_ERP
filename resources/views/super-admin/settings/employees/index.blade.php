@extends('layouts.super-admin')

@section('title','Employees')


@section('content')


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





<div class="d-flex justify-content-between align-items-center mb-3">


<div>

<h4 class="mb-1">

<i class="bx bx-user"></i>

Employee Management

</h4>


<p class="text-muted mb-0">

Manage all employees

</p>


</div>



<a href="{{ route('super-admin.settings.employees.create') }}"
class="btn btn-primary">


<i class="bx bx-user-plus"></i>

Create Employee


</a>


</div>








{{-- Filter --}}


<div class="card radius-10 mb-3">


<div class="card-body">



<form method="GET">


<div class="row g-2">



<div class="col-md-3">


<input

type="text"

name="search"

value="{{ request('search') }}"

class="form-control"

placeholder="Search name/code/phone">


</div>





<div class="col-md-2">


<select name="branch_id"
class="form-select">


<option value="">
All Branch
</option>


@foreach($branches as $branch)


<option value="{{ $branch->id }}"

@if(request('branch_id')==$branch->id)
selected
@endif

>

{{ $branch->name }}

</option>


@endforeach


</select>


</div>







<div class="col-md-2">


<select name="department_id"
class="form-select">


<option value="">
All Department
</option>



@foreach($departments as $department)


<option value="{{ $department->id }}"


@if(request('department_id')==$department->id)
selected
@endif


>

{{ $department->name }}

</option>



@endforeach


</select>


</div>







<div class="col-md-2">


<select name="status"
class="form-select">


<option value="">
All Status
</option>


<option value="1"

@if(request('status')==='1')
selected
@endif

>

Active

</option>



<option value="0"

@if(request('status')==='0')
selected
@endif

>

Inactive

</option>



</select>


</div>





<div class="col-md-2">


<button class="btn btn-primary w-100">

<i class="bx bx-search"></i>

Search

</button>


</div>





</div>


</form>



</div>


</div>









<div class="card radius-10">


<div class="card-body">



<div class="table-responsive">



<table class="table table-hover align-middle">


<thead class="table-light">


<tr>


<th>#</th>

<th>Employee</th>

<th>Code</th>

<th>Branch</th>

<th>Department</th>

<th>Designation</th>

<th>Contact</th>

<th>Status</th>

<th width="180">
Action
</th>


</tr>


</thead>






<tbody>



@forelse($employees as $key=>$employee)





@include(
'super-admin.settings.components.delete-modal',
[
'id'=>'deleteEmployee'.$employee->id,

'action'=>route(
'super-admin.settings.employees.destroy',
$employee
),

'message'=>'Are you sure you want to delete this employee?'
]
)





<tr>



<td>

{{ $employees->firstItem()+$key }}

</td>







<td>



<div class="d-flex align-items-center">



@if($employee->photo)


<img

src="{{ asset('storage/'.$employee->photo) }}"

width="45"

height="45"

class="rounded-circle shadow-sm me-2"

style="object-fit:cover;">



@else



<div

class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center me-2"

style="width:45px;height:45px">

<i class="bx bx-user"></i>


</div>


@endif





<div>


<strong>

{{ $employee->full_name }}

</strong>


<br>


<small class="text-muted">

{{ $employee->phone }}

</small>


</div>


</div>


</td>









<td>


<span class="badge bg-info">

{{ $employee->employee_code }}

</span>


</td>







<td>

{{ $employee->branch->name ?? '-' }}

</td>








<td>

{{ $employee->department->name ?? '-' }}

</td>








<td>

{{ $employee->designation->name ?? '-' }}

</td>








<td>


{{ $employee->email ?? '-' }}


<br>


<small>

{{ $employee->phone }}

</small>


</td>








<td>



@if($employee->status)


<span class="badge bg-success">

Active

</span>


@else


<span class="badge bg-danger">

Inactive

</span>


@endif



<br>


<small>

{{ $employee->employment_status }}

</small>


</td>









<td>


<div class="d-flex gap-1">



<a

href="{{ route('super-admin.settings.employees.show',$employee) }}"

class="btn btn-sm btn-light">

<i class="bx bx-show"></i>

</a>





<a

href="{{ route('super-admin.settings.employees.edit',$employee) }}"

class="btn btn-sm btn-light">

<i class="bx bx-edit"></i>

</a>






<button

class="btn btn-sm btn-light"

data-bs-toggle="modal"

data-bs-target="#deleteEmployee{{ $employee->id }}">

<i class="bx bx-trash"></i>

</button>





</div>


</td>





</tr>





@empty



<tr>

<td colspan="9"
class="text-center">

No Employee Found

</td>

</tr>



@endforelse



</tbody>



</table>




</div>






@if($employees->hasPages())


<div class="mt-3">

{{ $employees->links() }}

</div>


@endif





</div>

</div>





@endsection