<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;

use App\Models\Employee;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Designation;

use App\Services\Employee\EmployeeCodeGenerator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Employee List
    |--------------------------------------------------------------------------
    */

public function index(Request $request)
{

    $employees = Employee::with([

        'company',
        'branch',
        'department',
        'designation',
        'reportingManager',

    ])


    ->when($request->search, function($query) use ($request){

        $query->where(function($q) use ($request){

            $q->where('full_name','like','%'.$request->search.'%')
              ->orWhere('employee_code','like','%'.$request->search.'%')
              ->orWhere('phone','like','%'.$request->search.'%');

        });

    })


    ->when($request->branch_id,function($query) use ($request){

        $query->where(
            'branch_id',
            $request->branch_id
        );

    })


    ->when($request->department_id,function($query) use ($request){

        $query->where(
            'department_id',
            $request->department_id
        );

    })


    ->when($request->designation_id,function($query) use ($request){

        $query->where(
            'designation_id',
            $request->designation_id
        );

    })


    ->when($request->status !== null,function($query) use ($request){

        $query->where(
            'status',
            $request->status
        );

    })


    ->latest()

    ->paginate(15)

    ->withQueryString();



    $branches = Branch::orderBy('name')->get();

    $departments = Department::orderBy('name')->get();

    $designations = Designation::orderBy('name')->get();



    return view(

        'super-admin.settings.employees.index',

        compact(
            'employees',
            'branches',
            'departments',
            'designations'
        )

    );

}



    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */

    public function create()
    {

        $branches = Branch::active()
            ->orderBy('name')
            ->get();


        $departments = Department::active()
            ->orderBy('name')
            ->get();


        $designations = Designation::active()
            ->orderBy('name')
            ->get();


        $managers = Employee::active()
            ->orderBy('full_name')
            ->get();



        return view(

            'super-admin.settings.employees.create',

            compact(

                'branches',
                'departments',
                'designations',
                'managers'

            )

        );

    }





    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */

    public function store(StoreEmployeeRequest $request)
    {

        DB::beginTransaction();


        try {


            $data = $request->validated();



            /*
            |--------------------------------------------------------------------------
            | Auto Company From Branch
            |--------------------------------------------------------------------------
            */


            $branch = Branch::findOrFail(
                $data['branch_id']
            );


            $data['company_id'] = $branch->company_id;



            /*
            |--------------------------------------------------------------------------
            | Employee Code
            |--------------------------------------------------------------------------
            */


            $data['employee_code'] =
                EmployeeCodeGenerator::generate();





            /*
            |--------------------------------------------------------------------------
            | Full Name
            |--------------------------------------------------------------------------
            */


            $data['full_name'] = trim(

                $data['first_name']
                .' '.
                ($data['last_name'] ?? '')

            );





            /*
            |--------------------------------------------------------------------------
            | Photo Upload
            |--------------------------------------------------------------------------
            */


            if($request->hasFile('photo'))
            {

                $data['photo'] =

                    $request
                    ->file('photo')
                    ->store(
                        'employees',
                        'public'
                    );

            }




            /*
            |--------------------------------------------------------------------------
            | Default
            |--------------------------------------------------------------------------
            */


            $data['sort_order'] = 0;

            $data['is_system'] = false;




            /*
            |--------------------------------------------------------------------------
            | Audit
            |--------------------------------------------------------------------------
            */


            $data['created_by'] = Auth::id();




            Employee::create($data);



            DB::commit();



            return redirect()

                ->route(
                    'super-admin.settings.employees.index'
                )

                ->with(
                    'success',
                    'Employee created successfully.'
                );


        }


        catch(Exception $e)
        {


            DB::rollBack();


            return back()

                ->withInput()

                ->with(
                    'error',
                    $e->getMessage()
                );


        }

    }







    /*
    |--------------------------------------------------------------------------
    | Show
    |--------------------------------------------------------------------------
    */

    public function show(Employee $employee)
    {

        $employee->load([

            'company',
            'branch',
            'department',
            'designation',
            'reportingManager',
            'creator',
            'updater',
            'subordinates',

        ]);



        return view(

            'super-admin.settings.employees.show',

            compact('employee')

        );

    }








    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */

    public function edit(Employee $employee)
    {


        $branches = Branch::active()
            ->orderBy('name')
            ->get();



        $departments = Department::active()
            ->orderBy('name')
            ->get();



        $designations = Designation::active()
            ->orderBy('name')
            ->get();



        $managers = Employee::active()

            ->where(
                'id',
                '!=',
                $employee->id
            )

            ->orderBy('full_name')

            ->get();





        return view(

            'super-admin.settings.employees.edit',

            compact(

                'employee',
                'branches',
                'departments',
                'designations',
                'managers'

            )

        );


    }







    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(
        StoreEmployeeRequest $request,
        Employee $employee
    )
    {


        DB::beginTransaction();



        try {


            $data = $request->validated();




            $branch = Branch::findOrFail(

                $data['branch_id']

            );



            $data['company_id'] =
                $branch->company_id;




            $data['full_name'] = trim(

                $data['first_name']
                .' '.
                ($data['last_name'] ?? '')

            );





            if($request->hasFile('photo'))
            {

                $data['photo'] =

                    $request
                    ->file('photo')
                    ->store(
                        'employees',
                        'public'
                    );

            }




            $data['updated_by'] = Auth::id();



            $employee->update($data);




            DB::commit();



            return redirect()

                ->route(
                    'super-admin.settings.employees.index'
                )

                ->with(
                    'success',
                    'Employee updated successfully.'
                );


        }

        catch(Exception $e)
        {

            DB::rollBack();


            return back()

                ->withInput()

                ->with(
                    'error',
                    $e->getMessage()
                );

        }


    }







    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    public function destroy(Employee $employee)
    {


        if($employee->is_system)
        {

            return back()->with(

                'error',

                'System Employee cannot be deleted.'

            );

        }



        if($employee->subordinates()->exists())
        {

            return back()->with(

                'error',

                'Employee is assigned as Reporting Manager.'

            );

        }




        $employee->delete();




        return redirect()

            ->route(
                'super-admin.settings.employees.index'
            )

            ->with(

                'success',

                'Employee deleted successfully.'

            );


    }


}