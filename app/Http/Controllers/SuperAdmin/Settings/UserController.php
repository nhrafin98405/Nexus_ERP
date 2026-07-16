<?php

namespace App\Http\Controllers\SuperAdmin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->get();

        return view('super-admin.settings.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $roles = Role::all();

    $companies = \App\Models\Company::all();
    $branches = \App\Models\Branch::all();
    $departments = \App\Models\Department::all();
    $designations = \App\Models\Designation::all();

    return view(
        'super-admin.settings.users.create',
        compact(
            'roles',
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'company_id' => 'nullable|exists:companies,id',
'branch_id' => 'nullable|exists:branches,id',
'phone' => 'nullable',
'user_type' => 'nullable',
'employee_code' => 'nullable|unique:employees,employee_code',
        ]);


        $imageName = null;


        if ($request->hasFile('profile_image')) {

            $image = $request->file('profile_image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(
                public_path('uploads/users'),
                $imageName
            );
        }


$user = User::create([

    'name' => $request->name,

    'email' => $request->email,

    'password' => Hash::make($request->password),

    'profile_image' => $imageName,

    'phone' => $request->phone,

    'company_id' => $request->company_id,

    'branch_id' => $request->branch_id,

    'user_type' => $request->user_type ?? 'employee',

    'status' => true,

]);

Employee::create([

    'user_id' => $user->id,

    'company_id' => $request->company_id,

    'branch_id' => $request->branch_id,

    'department_id' => $request->department_id,

    'designation_id' => $request->designation_id,

    'employee_code' => $request->employee_code,

    'name' => $request->name,

    'email' => $request->email,

    'phone' => $request->phone,

    'joining_date' => now(),

    'status' => true,

]);


        $user->assignRole($request->role);


        return redirect()
            ->route('super-admin.settings.users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('roles')->findOrFail($id);

        return view('super-admin.settings.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('roles')->findOrFail($id);

        $roles = Role::all();

        return view('super-admin.settings.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);


        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'role' => 'required',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);



        $imageName = $user->profile_image;



        if ($request->hasFile('profile_image')) {


            // Delete old image
            if ($user->profile_image && File::exists(public_path('uploads/users/' . $user->profile_image))) {

                File::delete(public_path('uploads/users/' . $user->profile_image));
            }



            // Upload new image
            $image = $request->file('profile_image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();


            $image->move(
                public_path('uploads/users'),
                $imageName
            );
        }




        $user->update([

            'name' => $request->name,

            'email' => $request->email,

            'profile_image' => $imageName,

        ]);




        // Update password if entered
        if ($request->password) {

            $user->update([

                'password' => Hash::make($request->password)

            ]);
        }




        // Update role

        $user->syncRoles([$request->role]);




        return redirect()

            ->route('super-admin.settings.users.index')

            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $user = User::findOrFail($id);


    // Delete profile image
    if($user->profile_image && file_exists(public_path('uploads/users/'.$user->profile_image))){

        unlink(public_path('uploads/users/'.$user->profile_image));

    }


    // Remove roles
    $user->syncRoles([]);


    // Delete user
    $user->delete();


    return redirect()
        ->route('super-admin.settings.users.index')
        ->with('success','User deleted successfully');
}
}
