<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $query = Attendance::with('employee');


    // Employee Filter
    if ($request->employee_id) {

        $query->where(
            'employee_id',
            $request->employee_id
        );

    }


    // Date Filter
    if ($request->date) {

        $query->where(
            'attendance_date',
            $request->date
        );

    }


    // Status Filter
    if ($request->status) {

        $query->where(
            'status',
            $request->status
        );

    }



    $attendances = $query
        ->latest()
        ->paginate(20);



    $employees = Employee::where('status', true)
        ->orderBy('name')
        ->get();



    return view(
        'super-admin.settings.attendances.index',
        compact(
            'attendances',
            'employees'
        )
    );
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::where('status', true)
            ->orderBy('name')
            ->get();

        return view(
            'super-admin.settings.attendances.create',
            compact('employees')
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }


    /**
     * Attendance Scan Page
     */
    public function scan()
    {
        return view(
            'super-admin.settings.attendances.scan'
        );
    }


    /**
     * QR / Employee Code Scan
     */
    public function storeScan(Request $request)
    {
        $request->validate([
            'employee_code' => 'required|string',
        ]);


        // Find Employee
        $employee = Employee::where(
            'employee_code',
            $request->employee_code
        )->first();


        if (!$employee) {

            return back()->with(
                'error',
                'Employee not found.'
            );
        }


        $today = Carbon::today()->toDateString();



        // Check today's attendance
        $attendance = Attendance::where(
            'employee_id',
            $employee->id
        )
        ->where(
            'attendance_date',
            $today
        )
        ->first();



        /**
         * First Scan = Check In
         */
        if (!$attendance) {


            Attendance::create([

                'employee_id'     => $employee->id,

                'attendance_date' => $today,

                'check_in'        => now()->format('H:i:s'),

                'status'          => 'present',

            ]);



            return back()->with(
                'success',
                'Check In Successful.'
            );
        }




        /**
         * Second Scan = Check Out
         */
        if (!$attendance->check_out) {


            $checkIn = Carbon::parse(
                $attendance->check_in
            );


            $checkOut = now();



            // Calculate Working Minutes
            $workingMinutes = $checkIn->diffInMinutes(
                $checkOut
            );



            /**
             * Status Logic
             */

            $status = 'absent';



            $fullWorkingMinutes = 360; // 6 Hour

            $halfDayMinutes = 240; // 4 Hour



            if ($workingMinutes >= $fullWorkingMinutes) {


                $status = 'present';


            } elseif ($workingMinutes >= $halfDayMinutes) {


                $status = 'half_day';


            } else {


                $status = 'absent';

            }




            /**
             * Late Check
             */

            if (
                $checkIn->format('H:i') > '09:15'
                &&
                $status == 'present'
            ) {

                $status = 'late';

            }




            // Update Attendance

            $attendance->update([

                'check_out'       => $checkOut->format('H:i:s'),

                'working_minutes' => $workingMinutes,

                'status'          => $status,

            ]);




            return back()->with(
                'success',
                'Check Out Successful.'
            );

        }




        /**
         * Already Completed
         */

        return back()->with(
            'info',
            'আজকের Attendance Complete হয়েছে।'
        );
    }
}