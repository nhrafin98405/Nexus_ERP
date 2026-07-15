@extends('layouts.super-admin')

@section('content')

<div class="container-fluid">


    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">

            <h5 class="mb-0">
                Attendance List
            </h5>


            <a href="{{ route('super-admin.settings.attendances.scan') }}"
               class="btn btn-light">

                <i class="bx bx-qr"></i>
                Attendance Scan

            </a>

        </div>



        <div class="card-body">

            <div class="card mb-3">

    <div class="card-body">

        <form method="GET"
              action="{{ route('super-admin.settings.attendances.index') }}">


            <div class="row">


                {{-- Employee Filter --}}
                <div class="col-md-4">

                    <label class="form-label">
                        Employee
                    </label>


                    <select name="employee_id"
                            class="form-select">

                        <option value="">
                            All Employee
                        </option>


                        @foreach($employees as $employee)

                            <option value="{{ $employee->id }}"
                                @selected(request('employee_id') == $employee->id)>

                                {{ $employee->name }}
                                ({{ $employee->employee_code }})

                            </option>

                        @endforeach


                    </select>

                </div>



                {{-- Date Filter --}}
                <div class="col-md-3">

                    <label class="form-label">
                        Date
                    </label>


                    <input type="date"
                           name="date"
                           class="form-control"
                           value="{{ request('date') }}">

                </div>




                {{-- Status Filter --}}
                <div class="col-md-3">

                    <label class="form-label">
                        Status
                    </label>


                    <select name="status"
                            class="form-select">


                        <option value="">
                            All Status
                        </option>


                        <option value="present"
                            @selected(request('status') == 'present')>

                            Present

                        </option>


                        <option value="late"
                            @selected(request('status') == 'late')>

                            Late

                        </option>


                        <option value="half_day"
                            @selected(request('status') == 'half_day')>

                            Half Day

                        </option>


                        <option value="absent"
                            @selected(request('status') == 'absent')>

                            Absent

                        </option>


                        <option value="leave"
                            @selected(request('status') == 'leave')>

                            Leave

                        </option>


                    </select>

                </div>




                {{-- Button --}}
                <div class="col-md-2 d-flex align-items-end">


                    <button class="btn btn-light w-100">

                        <i class="bx bx-search"></i>
                        Search

                    </button>


                </div>



            </div>


        </form>


    </div>

</div>


            <div class="table-responsive">


                <table class="table table-bordered table-striped">


                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Employee</th>

                            <th>Date</th>

                            <th>Check In</th>

                            <th>Check Out</th>

                            <th>Working Hour</th>

                            <th>Status</th>

                        </tr>

                    </thead>



                    <tbody>


                    @forelse($attendances as $attendance)


                        <tr>


                            <td>
                                {{ $loop->iteration }}
                            </td>



                            <td>

                                {{ $attendance->employee->name ?? '-' }}

                                <br>

                                <small class="text-muted">

                                    {{ $attendance->employee->employee_code ?? '' }}

                                </small>

                            </td>



                            <td>

                                {{ \Carbon\Carbon::parse($attendance->attendance_date)->format('d M Y') }}

                            </td>




                            <td>

                                {{ $attendance->check_in ?? '-' }}

                            </td>




                            <td>

                                {{ $attendance->check_out ?? '-' }}

                            </td>




                            <td>


                                @if($attendance->working_minutes)

                                    {{ floor($attendance->working_minutes / 60) }}
                                    Hr

                                    {{ $attendance->working_minutes % 60 }}
                                    Min

                                @else

                                    -

                                @endif


                            </td>




                            <td>


                                @if($attendance->status == 'present')

                                    <span class="badge bg-success">
                                        Present
                                    </span>


                                @elseif($attendance->status == 'late')

                                    <span class="badge bg-warning">
                                        Late
                                    </span>


                                @elseif($attendance->status == 'half_day')

                                    <span class="badge bg-info">
                                        Half Day
                                    </span>


                                @elseif($attendance->status == 'leave')

                                    <span class="badge bg-primary">
                                        Leave
                                    </span>


                                @else

                                    <span class="badge bg-danger">
                                        Absent
                                    </span>


                                @endif


                            </td>



                        </tr>


                    @empty


                        <tr>

                            <td colspan="7" class="text-center">

                                No Attendance Found

                            </td>

                        </tr>


                    @endforelse



                    </tbody>


                </table>


            </div>



            <div class="mt-3">

                {{ $attendances->links() }}

            </div>



        </div>

    </div>


</div>

@endsection