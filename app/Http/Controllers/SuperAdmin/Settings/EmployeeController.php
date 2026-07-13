<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Designation;
use App\Services\Employee\EmployeeCodeGenerator;
use Illuminate\Support\Facades\Storage;



class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with([
            'company',
            'branch',
            'department',
            'designation'
        ])
            ->get()
            ->groupBy('department_id')
            ->map(function ($employees) {

                return $employees->sortBy(function ($employee) {

                    return $employee->designation->level;
                });
            });


        return view(
            'super-admin.settings.employees.index',
            compact('employees')
        );
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::where('status', true)
            ->orderBy('name')
            ->get();


        $branches = Branch::where('status', true)
            ->orderBy('name')
            ->get();


        $departments = Department::where('status', true)
            ->orderBy('name')
            ->get();


        $designations = Designation::where('status', true)
            ->orderBy('name')
            ->get();



        return view(
            'super-admin.settings.employees.create',
            compact(
                'companies',
                'branches',
                'departments',
                'designations'
            )
        );
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->validated();


        $data['employee_code'] =
            EmployeeCodeGenerator::generate();



        if ($request->hasFile('photo')) {


            $data['photo'] =
                $request->file('photo')
                ->store('employees', 'public');
        }



        Employee::create($data);



        return redirect()

            ->route('super-admin.settings.employees.index')

            ->with(
                'success',
                'Employee created successfully.'
            );
    }



    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view(
            'super-admin.settings.employees.show',
            compact('employee')
        );
    }



    /**
     * Show the form for editing.
     */
    public function edit(Employee $employee)
    {

        $companies = Company::where('status', true)
            ->orderBy('name')
            ->get();


        $branches = Branch::where('status', true)
            ->orderBy('name')
            ->get();


        $departments = Department::where('status', true)
            ->orderBy('name')
            ->get();


        $designations = Designation::where('status', true)
            ->orderBy('name')
            ->get();



        return view(
            'super-admin.settings.employees.edit',
            compact(
                'employee',
                'companies',
                'branches',
                'departments',
                'designations'
            )
        );
    }



    /**
     * Update resource.
     */
    public function update(StoreEmployeeRequest $request, Employee $employee)
    {

        $data = $request->validated();



        if ($request->hasFile('photo')) {


            if (
                $employee->photo &&
                Storage::disk('public')
                ->exists($employee->photo)
            ) {


                Storage::disk('public')
                    ->delete($employee->photo);
            }


            $data['photo'] =
                $request->file('photo')
                ->store('employees', 'public');
        }



        $employee->update($data);



        return redirect()

            ->route('super-admin.settings.employees.index')

            ->with(
                'success',
                'Employee updated successfully.'
            );
    }



    /**
     * Remove resource.
     */
    public function destroy(Employee $employee)
    {

        if (
            $employee->photo &&
            Storage::disk('public')
            ->exists($employee->photo)
        ) {


            Storage::disk('public')
                ->delete($employee->photo);
        }



        $employee->delete();



        return redirect()

            ->route('super-admin.settings.employees.index')

            ->with(
                'success',
                'Employee deleted successfully.'
            );
    }




    public function department(Department $department)
    {
        $employees = Employee::with([
            'company',
            'branch',
            'department',
            'designation'
        ])
            ->where('department_id', $department->id)
            ->get()
            ->sortBy(function ($employee) {

                return $employee->designation->level;
            });


        return view(
            'super-admin.settings.employees.department',
            compact(
                'employees',
                'department'
            )
        );
    }
}
