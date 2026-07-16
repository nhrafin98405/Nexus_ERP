<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeSalary;
use Illuminate\Http\Request;

class EmployeeSalaryController extends Controller
{
    /**
     * Display salary list
     */
    public function index()
    {
        $salaries = EmployeeSalary::with('employee')
            ->latest()
            ->get();

        return view(
            'super-admin.settings.employee-salaries.index',
            compact('salaries')
        );
    }


    /**
     * Create salary form
     */
 public function create()
{
    $employees = Employee::where('status',1)->get();

    return view(
        'super-admin.settings.employee-salaries.create',
        compact('employees')
    );
}


    /**
     * Store salary
     */
    public function store(Request $request)
    {
        $request->validate([

            'employee_id' => 'required|exists:employees,id',

            'basic_salary' => 'required|numeric',

            'house_rent' => 'nullable|numeric',

            'medical_allowance' => 'nullable|numeric',

            'transport_allowance' => 'nullable|numeric',

            'other_allowance' => 'nullable|numeric',

            'deduction' => 'nullable|numeric',

            'effective_date' => 'required|date',

        ]);


        $netSalary =
            $request->basic_salary
            + ($request->house_rent ?? 0)
            + ($request->medical_allowance ?? 0)
            + ($request->transport_allowance ?? 0)
            + ($request->other_allowance ?? 0)
            - ($request->deduction ?? 0);



        EmployeeSalary::create([

            'employee_id' => $request->employee_id,

            'basic_salary' => $request->basic_salary,

            'house_rent' => $request->house_rent ?? 0,

            'medical_allowance' => $request->medical_allowance ?? 0,

            'transport_allowance' => $request->transport_allowance ?? 0,

            'other_allowance' => $request->other_allowance ?? 0,

            'deduction' => $request->deduction ?? 0,

            'net_salary' => $netSalary,

            'effective_date' => $request->effective_date,

            'status' => true,

        ]);



        return redirect()
            ->route('super-admin.settings.employee-salaries.index')
            ->with('success','Salary setup created successfully.');
    }



    /**
     * Show salary
     */
    public function show(string $id)
    {
        $salary = EmployeeSalary::with('employee')
            ->findOrFail($id);


        return view(
            'super-admin.settings.employee-salaries.show',
            compact('salary')
        );
    }



    /**
     * Edit salary
     */
public function edit(string $id)
{
    $salary = EmployeeSalary::findOrFail($id);

    $employees = Employee::where('status',1)->get();


    return view(
        'super-admin.settings.employee-salaries.edit',
        compact(
            'salary',
            'employees'
        )
    );
}



    /**
     * Update salary
     */
    public function update(Request $request, string $id)
    {
        $salary = EmployeeSalary::findOrFail($id);



        $request->validate([

            'employee_id' => 'required|exists:employees,id',

            'basic_salary' => 'required|numeric',

            'effective_date' => 'required|date',

        ]);



        $netSalary =
            $request->basic_salary
            + ($request->house_rent ?? 0)
            + ($request->medical_allowance ?? 0)
            + ($request->transport_allowance ?? 0)
            + ($request->other_allowance ?? 0)
            - ($request->deduction ?? 0);



        $salary->update([

            'employee_id' => $request->employee_id,

            'basic_salary' => $request->basic_salary,

            'house_rent' => $request->house_rent ?? 0,

            'medical_allowance' => $request->medical_allowance ?? 0,

            'transport_allowance' => $request->transport_allowance ?? 0,

            'other_allowance' => $request->other_allowance ?? 0,

            'deduction' => $request->deduction ?? 0,

            'net_salary' => $netSalary,

            'effective_date' => $request->effective_date,

        ]);



        return redirect()
            ->route('super-admin.settings.employee-salaries.index')
            ->with('success','Salary updated successfully.');
    }



    /**
     * Delete salary
     */
    public function destroy(string $id)
    {
        EmployeeSalary::findOrFail($id)
            ->delete();


        return back()
            ->with('success','Salary deleted successfully.');
    }
}