<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDesignationRequest;
use App\Models\Designation;
use App\Models\Department;
use App\Services\Designation\DesignationCodeGenerator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;

class DesignationController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Designation List
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        $designations = Designation::with([

                'company',
                'branch',
                'department',
                'creator',
                'updater',

            ])

            ->latest()

            ->paginate(15);

        return view(

            'super-admin.settings.designations.index',

            compact(

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

        $departments = Department::with([

                'company',
                'branch',

            ])

            ->active()

            ->get();

        return view(

            'super-admin.settings.designations.create',

            compact(

                'departments'

            )

        );

    }







    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */

    public function store(
        StoreDesignationRequest $request
    )
    {

        DB::beginTransaction();

        try {

            $data = $request->validated();

            /*
            |--------------------------------------------------------------------------
            | Auto Company & Branch
            |--------------------------------------------------------------------------
            */

            $department = Department::findOrFail(
                $data['department_id']
            );

            $data['company_id'] = $department->company_id;

            $data['branch_id'] = $department->branch_id;

            /*
            |--------------------------------------------------------------------------
            | Generate Code
            |--------------------------------------------------------------------------
            */

            $data['code'] = DesignationCodeGenerator::generate();

            /*
            |--------------------------------------------------------------------------
            | Audit
            |--------------------------------------------------------------------------
            */

            $data['created_by'] = Auth::id();

            /*
            |--------------------------------------------------------------------------
            | Default Settings
            |--------------------------------------------------------------------------
            */

            $data['sort_order'] = 0;

            $data['is_system'] = false;

            Designation::create($data);

            DB::commit();

            return redirect()

                ->route(

                    'super-admin.settings.designations.index'

                )

                ->with(

                    'success',

                    'Designation created successfully.'

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

    public function show(
        Designation $designation
    )
    {

        $designation->load([

            'company',

            'branch',

            'department',

            'creator',

            'updater',

            'employees:id,designation_id,name',

        ]);

        return view(

            'super-admin.settings.designations.show',

            compact(

                'designation'

            )

        );

    }







    /*
    |--------------------------------------------------------------------------
    | Edit
    |--------------------------------------------------------------------------
    */

    public function edit(
        Designation $designation
    )
    {

        $departments = Department::with([

                'company',

                'branch',

            ])

            ->active()

            ->orderBy('name')

            ->get();

        return view(

            'super-admin.settings.designations.edit',

            compact(

                'designation',

                'departments'

            )

        );

    }







    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(

        StoreDesignationRequest $request,

        Designation $designation

    )
    {

        DB::beginTransaction();

        try {

            $data = $request->validated();

            /*
            |--------------------------------------------------------------------------
            | Auto Company & Branch
            |--------------------------------------------------------------------------
            */

            $department = Department::select(

                'id',

                'company_id',

                'branch_id'

            )->findOrFail(

                $data['department_id']

            );

            $data['company_id'] = $department->company_id;

            $data['branch_id']  = $department->branch_id;

            /*
            |--------------------------------------------------------------------------
            | Audit
            |--------------------------------------------------------------------------
            */

            $data['updated_by'] = Auth::id();

            $designation->update($data);

            DB::commit();

            return redirect()

                ->route(

                    'super-admin.settings.designations.index'

                )

                ->with(

                    'success',

                    'Designation updated successfully.'

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
        Designation $designation
    )
    {

        try {

            /*
            |--------------------------------------------------------------------------
            | System Designation Protection
            |--------------------------------------------------------------------------
            */

            if ($designation->is_system) {

                return back()->with(

                    'error',

                    'System designation cannot be deleted.'

                );

            }

            /*
            |--------------------------------------------------------------------------
            | Employee Dependency Check
            |--------------------------------------------------------------------------
            */

            if (!$designation->canDelete()) {

                return back()->with(

                    'error',

                    'This designation has employees assigned and cannot be deleted.'

                );

            }

            /*
            |--------------------------------------------------------------------------
            | Delete
            |--------------------------------------------------------------------------
            */

            $designation->delete();

            return redirect()

                ->route(
                    'super-admin.settings.designations.index'
                )

                ->with(

                    'success',

                    'Designation deleted successfully.'

                );

        }

        catch (Exception $e) {

            Log::error($e);

            return back()->with(

                'error',

                'Unable to delete designation.'

            );

        }

    }

}