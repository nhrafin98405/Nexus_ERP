@extends('layouts.super-admin')

@section('content')
    <div class="page-wrapper">

        <div class="page-content">


            <!-- ================= HEADER ================= -->

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h4 class="mb-1">
                        Dashboard
                    </h4>

                    <p class="text-muted mb-0">
                        Welcome back, {{ auth()->user()->name }}
                    </p>

                </div>


                <div>

                    <button class="btn btn-primary">

                        <i class="bx bx-refresh"></i>
                        Refresh

                    </button>

                </div>


            </div>





            <!-- ================= KPI CARDS ================= -->


            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">



                <!-- Employees -->

                <div class="col">

                    <div class="card radius-10 border-start border-0 border-4 border-primary">

                        <div class="card-body">


                            <div class="d-flex align-items-center">


                                <div>

                                    <p class="mb-0 text-secondary">
                                        Employees
                                    </p>


                                    <h4 class="my-1">
                                        {{ $dashboard['employeeCount'] }}
                                    </h4>


                                    <span class="text-success">
                                        Total Employees
                                    </span>


                                </div>



                                <div class="widgets-icons bg-light-primary text-primary ms-auto">

                                    <i class="bx bx-user"></i>

                                </div>



                            </div>


                        </div>

                    </div>

                </div>





                <!-- Attendance -->

                <div class="col">

                    <div class="card radius-10 border-start border-0 border-4 border-success">

                        <div class="card-body">


                            <div class="d-flex align-items-center">


                                <div>

                                    <p class="mb-0 text-secondary">
                                        Present Today
                                    </p>


                                    <h4 class="my-1">

                                        {{ $dashboard['presentCount'] }}

                                    </h4>


                                    <span class="text-success">

                                        Attendance

                                    </span>


                                </div>



                                <div class="widgets-icons bg-light-success text-success ms-auto">

                                    <i class="bx bx-calendar-check"></i>

                                </div>



                            </div>


                        </div>

                    </div>

                </div>




@if(
$dashboard['permissions']['isSuperAdmin'] ||
$dashboard['permissions']['isAdmin'] ||
$dashboard['permissions']['isManager']
)

<!-- Sales Card এখানে থাকবে -->


                <!-- Sales -->

                <div class="col">

                    <div class="card radius-10 border-start border-0 border-4 border-warning">

                        <div class="card-body">


                            <div class="d-flex align-items-center">


                                <div>

                                    <p class="mb-0 text-secondary">
                                        Today's Sales
                                    </p>


                                    <h4 class="my-1">

                                        {{ number_format($dashboard['todaySales'], 2) }}

                                    </h4>


                                    <span class="text-warning">

                                        Revenue

                                    </span>


                                </div>



                                <div class="widgets-icons bg-light-warning text-warning ms-auto">

                                    <i class="bx bx-line-chart"></i>

                                </div>



                            </div>


                        </div>

                    </div>

                </div>


                @endif



                @if(
$dashboard['permissions']['isSuperAdmin'] ||
$dashboard['permissions']['isAdmin']
)

<!-- Expense Card -->



                <!-- Expense -->

                <div class="col">

                    <div class="card radius-10 border-start border-0 border-4 border-danger">

                        <div class="card-body">


                            <div class="d-flex align-items-center">


                                <div>

                                    <p class="mb-0 text-secondary">
                                        Today's Expense
                                    </p>


                                    <h4 class="my-1">

                                        {{ number_format($dashboard['todayExpense'], 2) }}

                                    </h4>


                                    <span class="text-danger">

                                        Expense

                                    </span>


                                </div>



                                <div class="widgets-icons bg-light-danger text-danger ms-auto">

                                    <i class="bx bx-wallet"></i>

                                </div>



                            </div>


                        </div>

                    </div>

                </div>


                @endif


            </div>

            <!-- ================= CHART SECTION ================= -->


            <div class="row mt-4">


                <div class="col-xl-8">

                    <div class="card radius-10">

                        <div class="card-body">


                            <h5 class="mb-3">
                                Sales Overview
                            </h5>


                            <div id="salesChart"></div>


                        </div>

                    </div>

                </div>





                <div class="col-xl-4">


                    <div class="card radius-10">


                        <div class="card-body">


                            <h5 class="mb-3">
                                Attendance
                            </h5>


                            <div id="attendanceChart"></div>


                        </div>


                    </div>


                </div>


            </div>

            @push('scripts')
                <script>
                    var salesChart = new ApexCharts(
                        document.querySelector("#salesChart"), {

                            chart: {
                                type: 'area',
                                height: 300
                            },

                            series: [{
                                name: 'Sales',
                                data: @json($dashboard['monthlySales'])
                            }],


                            xaxis: {
                                categories: [
                                    'Jan',
                                    'Feb',
                                    'Mar',
                                    'Apr',
                                    'May',
                                    'Jun',
                                    'Jul',
                                    'Aug',
                                    'Sep',
                                    'Oct',
                                    'Nov',
                                    'Dec'
                                ]
                            }


                        });


                    salesChart.render();





                    var attendanceChart = new ApexCharts(
                        document.querySelector("#attendanceChart"), {

                            chart: {
                                type: 'donut',
                                height: 300
                            },


                            series: [

                                {{ $dashboard['presentCount'] }},

                                {{ $dashboard['absentCount'] }},

                                {{ $dashboard['lateCount'] }}

                            ],


                            labels: [

                                'Present',
                                'Absent',
                                'Late'

                            ]


                        });


                    attendanceChart.render();
                </script>
            @endpush


            <!-- ================= LOWER SECTION ================= -->


            <div class="row mt-4">



                @if(
$dashboard['permissions']['isSuperAdmin'] ||
$dashboard['permissions']['isAdmin'] ||
$dashboard['permissions']['isManager']
)

<!-- Employee Card -->


                <!-- Recent Employees -->

                <div class="col-xl-4">

                    <div class="card radius-10">


                        <div class="card-body">


                            <h5 class="mb-3">
                                Recent Employees
                            </h5>


                            <div class="table-responsive">

                                <table class="table">


                                    @foreach ($dashboard['recentEmployees'] as $employee)
                                        <tr>

                                            <td>

                                                <div class="d-flex align-items-center">


                                                    <div class="ms-2">

                                                        <h6 class="mb-0">
                                                            {{ $employee->name }}
                                                        </h6>


                                                        <small class="text-muted">

                                                            {{ $employee->employee_code }}

                                                        </small>


                                                    </div>


                                                </div>


                                            </td>


                                        </tr>
                                    @endforeach


                                </table>

                            </div>


                        </div>

                    </div>

                </div>

                @endif

                @if($dashboard['permissions']['isEmployee'])


<div class="card">

<div class="card-body">


<h5>
My Dashboard
</h5>


<div class="row">


<div class="col-md-3">

<div class="alert alert-primary">

My Attendance

</div>

</div>



<div class="col-md-3">

<div class="alert alert-success">

My Salary

</div>

</div>



<div class="col-md-3">

<div class="alert alert-warning">

My Leave

</div>

</div>



<div class="col-md-3">

<div class="alert alert-info">

My Payroll

</div>

</div>



</div>


</div>

</div>


@endif





                <!-- Recent Attendance -->

                <div class="col-xl-4">


                    <div class="card radius-10">


                        <div class="card-body">


                            <h5 class="mb-3">

                                Recent Attendance

                            </h5>



                            <table class="table">


                                @foreach ($dashboard['recentAttendance'] as $attendance)
                                    <tr>


                                        <td>

                                            {{ $attendance->employee->name ?? 'N/A' }}


                                        </td>


                                        <td>

                                            <span class="badge bg-success">

                                                {{ ucfirst($attendance->status) }}

                                            </span>


                                        </td>


                                    </tr>
                                @endforeach



                            </table>


                        </div>


                    </div>


                </div>






                <!-- Quick Action -->

                <div class="col-xl-4">


                    <div class="card radius-10">


                        <div class="card-body">


                            <h5 class="mb-3">

                                Quick Actions

                            </h5>



                            <div class="d-grid gap-2">


                                <a href="#" class="btn btn-primary">

                                    <i class="bx bx-user-plus"></i>

                                    Add Employee

                                </a>



                                <a href="#" class="btn btn-success">

                                    <i class="bx bx-calendar-check"></i>

                                    Attendance

                                </a>



                                <a href="#" class="btn btn-warning">

                                    <i class="bx bx-money"></i>

                                    Payroll

                                </a>



                            </div>


                        </div>


                    </div>


                </div>


            </div>

            <!-- ================= COMING SOON MODULES ================= -->


            <div class="row mt-4">


                <div class="col-12">


                    <div class="card radius-10">


                        <div class="card-body">


                            <div class="d-flex justify-content-between align-items-center mb-3">


                                <h5 class="mb-0">

                                    Industry ERP Modules

                                </h5>


                                <span class="badge bg-warning text-dark">

                                    Future Expansion

                                </span>


                            </div>




                            <div class="row">


                                @foreach ($dashboard['comingSoonModules'] as $module)
                                    <div class="col-xl-3 col-md-4 col-sm-6 mb-3">


                                        <div class="card border shadow-none h-100">


                                            <div class="card-body text-center">


                                                <div
                                                    class="widgets-icons bg-light-{{ $module['color'] }} text-{{ $module['color'] }} mx-auto mb-3">


                                                    <i class="{{ $module['icon'] }}"></i>


                                                </div>



                                                <h6>

                                                    {{ $module['name'] }}

                                                </h6>


                                                <span class="badge bg-warning text-dark">

                                                    <i class="bx bx-lock"></i>

                                                    Coming Soon

                                                </span>



                                            </div>


                                        </div>


                                    </div>
                                @endforeach


                            </div>


                        </div>


                    </div>


                </div>
            @endsection
