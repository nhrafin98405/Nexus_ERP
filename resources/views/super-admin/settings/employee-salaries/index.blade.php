@extends('layouts.super-admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">

            <h5 class="mb-0">
                Employee Salary List
            </h5>


            <a href="{{ route('super-admin.settings.employee-salaries.create') }}"
               class="btn btn-primary">

                <i class="bx bx-plus"></i>
                Add Salary

            </a>

        </div>



        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif



        <div class="card">

            <div class="card-body">


                <div class="table-responsive">

                    <table class="table table-bordered">

                        <thead>

                            <tr>

                                <th>#</th>
                                <th>Employee</th>
                                <th>Basic Salary</th>
                                <th>Allowance</th>
                                <th>Effective Date</th>
                                <th>Status</th>
                                <th width="180">Action</th>

                            </tr>

                        </thead>


                        <tbody>


                        @forelse($salaries as $salary)


                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                <td>

                                    {{ $salary->employee->name ?? '-' }}

                                </td>


                                <td>

                                    {{ number_format($salary->basic_salary,2) }}

                                </td>


                                <td>

                                    {{ number_format(
                                        $salary->house_rent +
                                        $salary->medical_allowance +
                                        $salary->transport_allowance
                                    ,2) }}

                                </td>


                                <td>

                                    {{ $salary->effective_date }}

                                </td>


                                <td>

                                    @if($salary->status == 'active')

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Inactive
                                        </span>

                                    @endif

                                </td>


                                <td>


                                    <a href="{{ route('super-admin.settings.employee-salaries.show',$salary->id) }}"
                                       class="btn btn-sm btn-info">

                                        View

                                    </a>


                                    <a href="{{ route('super-admin.settings.employee-salaries.destroy',$salary->id) }}"
                                       class="btn btn-sm btn-warning">

                                        Edit

                                    </a>


                                </td>


                            </tr>


                        @empty


                            <tr>

                                <td colspan="7"
                                    class="text-center">

                                    No Salary Found

                                </td>

                            </tr>


                        @endforelse


                        </tbody>


                    </table>


                </div>


            </div>

        </div>


@endsection