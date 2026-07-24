<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepartmentRequest;

use App\Models\Department;
use App\Models\Branch;

use App\Services\Department\DepartmentCodeGenerator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;

class DepartmentController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Department List
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        $query = Department::with([

            'company',
            'branch',
            'creator',
            'updater',

        ]);


        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if (request()->filled('search')) {

            $query->where(function ($q) {

                $q->where(
                    'name',
                    'like',
                    '%' . request('search') . '%'
                )

                ->orWhere(
                    'code',
                    'like',
                    '%' . request('search') . '%'
                )

                ->orWhere(
                    'phone',
                    'like',
                    '%' . request('search') . '%'
                )

                ->orWhere(
                    'email',
                    'like',
                    '%' . request('search') . '%'
                );

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if (request()->filled('status')) {

            $query->where(

                'status',

                request('status')

            );

        }


        /*
        |--------------------------------------------------------------------------
        | Branch Filter
        |--------------------------------------------------------------------------
        */

        if (request()->filled('branch_id')) {

            $query->where(

                'branch_id',

                request('branch_id')

            );

        }


        $departments = $query

            ->latest()

            ->paginate(15)

            ->withQueryString();


        return view(

            'super-admin.settings.departments.index',

            compact('departments')

        );

    }







    /*
    |--------------------------------------------------------------------------
    | Create
    |--------------------------------------------------------------------------
    */

    public function create()
    {

        $branches = Branch::with('company')

            ->active()

            ->orderBy('name')

            ->get();


        return view(

            'super-admin.settings.departments.create',

            compact(

                'branches'

            )

        );

    }







    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */

    public function store(
        StoreDepartmentRequest $request
    )
    {

        DB::beginTransaction();

        try {

            $data = $request->validated();


            /*
            |--------------------------------------------------------------------------
            | Auto Company
            |--------------------------------------------------------------------------
            */

            $branch = Branch::select(

                'id',
                'company_id'

            )->findOrFail(

                $data['branch_id']

            );

            $data['company_id'] = $branch->company_id;


            /*
            |--------------------------------------------------------------------------
            | Department Code
            |--------------------------------------------------------------------------
            */

            $data['code'] = DepartmentCodeGenerator::generate();


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


            Department::create($data);


            DB::commit();


            return redirect()

                ->route(

                    'super-admin.settings.departments.index'

                )

                ->with(

                    'success',

                    'Department created successfully.'

                );

        }

        catch (Exception $e) {

            DB::rollBack();

            Log::error($e);

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

    public function show(Department $department)
    {

        $department->load([

            'company',

            'branch',

            'creator',

            'updater',

            'employees:id,department_id,name',

            'designations:id,department_id,name',

        ]);


        return view(

            'super-admin.settings.departments.show',

            compact(

                'department'

            )

        );

    }







    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */

    public function edit(
        Department $department
    )
    {

        $branches = Branch::with(

                'company'

            )

            ->active()

            ->orderBy(

                'name'

            )

            ->get();


        return view(

            'super-admin.settings.departments.edit',

            compact(

                'department',

                'branches'

            )

        );

    }







    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(

        StoreDepartmentRequest $request,

        Department $department

    )
    {

        DB::beginTransaction();

        try {

            $data = $request->validated();


            /*
            |--------------------------------------------------------------------------
            | Company Auto Detect
            |--------------------------------------------------------------------------
            */

            $branch = Branch::select(

                'id',

                'company_id'

            )->findOrFail(

                $data['branch_id']

            );

            $data['company_id'] = $branch->company_id;


            /*
            |--------------------------------------------------------------------------
            | Audit
            |--------------------------------------------------------------------------
            */

            $data['updated_by'] = Auth::id();


            $department->update(

                $data

            );


            DB::commit();


            return redirect()

                ->route(

                    'super-admin.settings.departments.index'

                )

                ->with(

                    'success',

                    'Department updated successfully.'

                );

        }

        catch (Exception $e) {

            DB::rollBack();

            Log::error($e);

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
    | Destroy
    |--------------------------------------------------------------------------
    */

    public function destroy(
        Department $department
    )
    {

        try {

            /*
            |--------------------------------------------------------------------------
            | System Department Protection
            |--------------------------------------------------------------------------
            */

            if ($department->is_system) {

                return back()->with(

                    'error',

                    'System Department cannot be deleted.'

                );

            }


            /*
            |--------------------------------------------------------------------------
            | Dependency Check
            |--------------------------------------------------------------------------
            */

            if (!$department->canDelete()) {

                return back()->with(

                    'error',

                    'This department contains employees or designations and cannot be deleted.'

                );

            }


            /*
            |--------------------------------------------------------------------------
            | Delete
            |--------------------------------------------------------------------------
            */

            $department->delete();


            return redirect()

                ->route(

                    'super-admin.settings.departments.index'

                )

                ->with(

                    'success',

                    'Department deleted successfully.'

                );

        }

        catch (Exception $e) {

            Log::error($e);

            return back()->with(

                'error',

                'Unable to delete department.'

            );

        }

    }

}