@extends('layouts.super-admin')

@section('content')

<div class="container-fluid">


    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="mb-1 fw-bold">
                <i class="bx bx-money me-2"></i>
                Add Employee Salary
            </h4>

            <small class="text-muted">
                Configure employee salary structure
            </small>
        </div>


        <a href="{{ url('super-admin/employee-salaries') }}"
   class="btn btn-light border">

            <i class="bx bx-arrow-back me-1"></i>
            Back

        </a>

    </div>




    <div class="card shadow-sm border-0">


        <div class="card-header bg-transparent py-3">

            <h5 class="mb-0">

                <i class="bx bx-user-circle me-2"></i>

                Salary Information

            </h5>

        </div>



        <div class="card-body p-4">


            <form action="{{ url('super-admin/employee-salaries') }}"
      method="POST">

                @csrf



                <div class="row">



                    <!-- Employee -->

                    <div class="col-md-6 mb-4">


                        <label class="form-label fw-semibold">

                            Employee

                        </label>


                        <select name="employee_id"
                                class="form-select">

                            <option value="">
                                Select Employee
                            </option>


                            @foreach($employees as $employee)

                            <option value="{{ $employee->id }}">

                                {{ $employee->name }}
                                -
                                {{ $employee->employee_code }}

                            </option>


                            @endforeach


                        </select>


                    </div>




                    <!-- Basic Salary -->


                    <div class="col-md-6 mb-4">


                        <label class="form-label fw-semibold">

                            Basic Salary

                        </label>


                        <div class="input-group">

                            <span class="input-group-text">
                                ৳
                            </span>


                            <input type="number"
                                   name="basic_salary"
                                   class="form-control"
                                   placeholder="Enter basic salary">

                        </div>


                    </div>





                </div>




                <hr class="my-4">



                <h6 class="fw-bold mb-3">

                    <i class="bx bx-plus-circle me-2"></i>

                    Allowance Details

                </h6>




                <div class="row">


                    <div class="col-md-4 mb-3">


                        <label class="form-label">
                            House Rent
                        </label>


                        <input type="number"
                               name="house_rent"
                               class="form-control"
                               value="0">

                    </div>



                    <div class="col-md-4 mb-3">


                        <label class="form-label">
                            Medical Allowance
                        </label>


                        <input type="number"
                               name="medical_allowance"
                               class="form-control"
                               value="0">


                    </div>




                    <div class="col-md-4 mb-3">


                        <label class="form-label">
                            Transport Allowance
                        </label>


                        <input type="number"
                               name="transport_allowance"
                               class="form-control"
                               value="0">


                    </div>



                </div>





                <hr class="my-4">




                <h6 class="fw-bold mb-3">

                    <i class="bx bx-calendar me-2"></i>

                    Salary Settings

                </h6>




                <div class="row">


                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            Effective Date

                        </label>


                        <input type="date"
                               name="effective_date"
                               class="form-control"
                               value="{{ date('Y-m-d') }}">


                    </div>





                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            Status

                        </label>


                        <select name="status"
                                class="form-select">


                            <option value="1">
                                Active
                            </option>


                            <option value="0">
                                Inactive
                            </option>


                        </select>


                    </div>



                </div>





                <div class="text-end mt-4">


                    <button class="btn btn-primary px-4">


                        <i class="bx bx-save me-1"></i>

                        Save Salary


                    </button>


                </div>




            </form>



        </div>



    </div>



</div>


@endsection