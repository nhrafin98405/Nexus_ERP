<div class="row">

    {{-- Branch --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">
            Branch
            <span class="text-danger">*</span>
        </label>

        <select
            name="branch_id"
            class="form-select @error('branch_id') is-invalid @enderror">

            <option value="">
                Select Branch
            </option>

            @foreach($branches as $branch)

                <option
                    value="{{ $branch->id }}"
                    {{ old('branch_id', $employee->branch_id ?? '') == $branch->id ? 'selected' : '' }}>

                    {{ $branch->name }}

                </option>

            @endforeach

        </select>

        @error('branch_id')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Department --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">
            Department
            <span class="text-danger">*</span>
        </label>

        <select
            name="department_id"
            class="form-select @error('department_id') is-invalid @enderror">

            <option value="">
                Select Department
            </option>

            @foreach($departments as $department)

                <option
                    value="{{ $department->id }}"
                    {{ old('department_id', $employee->department_id ?? '') == $department->id ? 'selected' : '' }}>

                    {{ $department->name }}

                </option>

            @endforeach

        </select>

        @error('department_id')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Designation --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">
            Designation
            <span class="text-danger">*</span>
        </label>

        <select
            name="designation_id"
            class="form-select @error('designation_id') is-invalid @enderror">

            <option value="">
                Select Designation
            </option>

            @foreach($designations as $designation)

                <option
                    value="{{ $designation->id }}"
                    {{ old('designation_id', $employee->designation_id ?? '') == $designation->id ? 'selected' : '' }}>

                    {{ $designation->name }}

                </option>

            @endforeach

        </select>

        @error('designation_id')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Employee Code --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">

            Employee Code

        </label>

        <input
            type="text"
            class="form-control"
            value="{{ $employee->employee_code ?? 'Auto Generate' }}"
            readonly>

    </div>

</div>

<hr>

<div class="row">

    {{-- First Name --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            First Name
            <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="first_name"
            class="form-control @error('first_name') is-invalid @enderror"
            value="{{ old('first_name', $employee->first_name ?? '') }}">

        @error('first_name')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Last Name --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">

            Last Name

        </label>

        <input
            type="text"
            name="last_name"
            class="form-control @error('last_name') is-invalid @enderror"
            value="{{ old('last_name', $employee->last_name ?? '') }}">

        @error('last_name')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Full Name --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Full Name
            <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="full_name"
            class="form-control @error('full_name') is-invalid @enderror"
            value="{{ old('full_name', $employee->full_name ?? '') }}">

        @error('full_name')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

</div>

<div class="row">

    {{-- Employee Photo --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">

            Employee Photo

        </label>

        <input
            type="file"
            name="photo"
            class="form-control @error('photo') is-invalid @enderror">

        @error('photo')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

        @if(isset($employee) && $employee->photo)

            <div class="mt-2">

                <img
                    src="{{ asset('storage/'.$employee->photo) }}"
                    width="90"
                    class="img-thumbnail">

            </div>

        @endif

    </div>

</div>

<hr>
<div class="row">

    {{-- Gender --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">
            Gender
            <span class="text-danger">*</span>
        </label>

        <select
            name="gender"
            class="form-select @error('gender') is-invalid @enderror">

            <option value="">Select Gender</option>

            @foreach (['Male', 'Female', 'Other'] as $gender)

                <option
                    value="{{ $gender }}"
                    {{ old('gender', $employee->gender ?? '') == $gender ? 'selected' : '' }}>

                    {{ $gender }}

                </option>

            @endforeach

        </select>

        @error('gender')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Date of Birth --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">

            Date of Birth

        </label>

        <input
            type="date"
            name="date_of_birth"
            class="form-control @error('date_of_birth') is-invalid @enderror"
            value="{{ old('date_of_birth', isset($employee) && $employee->date_of_birth ? $employee->date_of_birth->format('Y-m-d') : '') }}">

        @error('date_of_birth')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Blood Group --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">

            Blood Group

        </label>

        <select
            name="blood_group"
            class="form-select @error('blood_group') is-invalid @enderror">

            <option value="">
                Select Blood Group
            </option>

            @foreach (['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $blood)

                <option
                    value="{{ $blood }}"
                    {{ old('blood_group', $employee->blood_group ?? '') == $blood ? 'selected' : '' }}>

                    {{ $blood }}

                </option>

            @endforeach

        </select>

        @error('blood_group')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Marital Status --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">

            Marital Status

        </label>

        <select
            name="marital_status"
            class="form-select @error('marital_status') is-invalid @enderror">

            <option value="">
                Select Status
            </option>

            @foreach (['Single','Married','Divorced','Widowed'] as $status)

                <option
                    value="{{ $status }}"
                    {{ old('marital_status', $employee->marital_status ?? '') == $status ? 'selected' : '' }}>

                    {{ $status }}

                </option>

            @endforeach

        </select>

        @error('marital_status')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

</div>

<div class="row">

    {{-- Religion --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">

            Religion

        </label>

        <input
            type="text"
            name="religion"
            class="form-control @error('religion') is-invalid @enderror"
            value="{{ old('religion', $employee->religion ?? '') }}">

        @error('religion')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Nationality --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">

            Nationality

        </label>

        <input
            type="text"
            name="nationality"
            class="form-control @error('nationality') is-invalid @enderror"
            value="{{ old('nationality', $employee->nationality ?? 'Bangladeshi') }}">

        @error('nationality')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- National ID --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">

            National ID

        </label>

        <input
            type="text"
            name="national_id"
            class="form-control @error('national_id') is-invalid @enderror"
            value="{{ old('national_id', $employee->national_id ?? '') }}">

        @error('national_id')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

</div>

<div class="row">

    {{-- Passport --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">

            Passport No

        </label>

        <input
            type="text"
            name="passport_no"
            class="form-control @error('passport_no') is-invalid @enderror"
            value="{{ old('passport_no', $employee->passport_no ?? '') }}">

        @error('passport_no')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Driving License --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">

            Driving License

        </label>

        <input
            type="text"
            name="driving_license"
            class="form-control @error('driving_license') is-invalid @enderror"
            value="{{ old('driving_license', $employee->driving_license ?? '') }}">

        @error('driving_license')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

</div>

<hr>
<div class="row">

    {{-- Email --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">

            Email

        </label>

        <input
            type="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $employee->email ?? '') }}">

        @error('email')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Phone --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Phone
            <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="phone"
            class="form-control @error('phone') is-invalid @enderror"
            value="{{ old('phone', $employee->phone ?? '') }}">

        @error('phone')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Alternate Phone --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">

            Alternate Phone

        </label>

        <input
            type="text"
            name="alternate_phone"
            class="form-control @error('alternate_phone') is-invalid @enderror"
            value="{{ old('alternate_phone', $employee->alternate_phone ?? '') }}">

        @error('alternate_phone')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

</div>

<div class="row">

    {{-- Present Address --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">

            Present Address

        </label>

        <textarea
            name="present_address"
            rows="3"
            class="form-control @error('present_address') is-invalid @enderror">{{ old('present_address', $employee->present_address ?? '') }}</textarea>

        @error('present_address')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Permanent Address --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">

            Permanent Address

        </label>

        <textarea
            name="permanent_address"
            rows="3"
            class="form-control @error('permanent_address') is-invalid @enderror">{{ old('permanent_address', $employee->permanent_address ?? '') }}</textarea>

        @error('permanent_address')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

</div>

<div class="row">

    {{-- City --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">

            City

        </label>

        <input
            type="text"
            name="city"
            class="form-control @error('city') is-invalid @enderror"
            value="{{ old('city', $employee->city ?? '') }}">

        @error('city')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- State --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">

            State

        </label>

        <input
            type="text"
            name="state"
            class="form-control @error('state') is-invalid @enderror"
            value="{{ old('state', $employee->state ?? '') }}">

        @error('state')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Country --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">

            Country

        </label>

        <input
            type="text"
            name="country"
            class="form-control @error('country') is-invalid @enderror"
            value="{{ old('country', $employee->country ?? 'Bangladesh') }}">

        @error('country')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

    {{-- Postal Code --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">

            Postal Code

        </label>

        <input
            type="text"
            name="postal_code"
            class="form-control @error('postal_code') is-invalid @enderror"
            value="{{ old('postal_code', $employee->postal_code ?? '') }}">

        @error('postal_code')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

</div>

<hr>
<div class="row">

    {{-- Joining Date --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">
            Joining Date
            <span class="text-danger">*</span>
        </label>

        <input
            type="date"
            name="joining_date"
            class="form-control @error('joining_date') is-invalid @enderror"
            value="{{ old('joining_date', isset($employee) && $employee->joining_date ? $employee->joining_date->format('Y-m-d') : '') }}">

        @error('joining_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Confirmation Date --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">
            Confirmation Date
        </label>

        <input
            type="date"
            name="confirmation_date"
            class="form-control @error('confirmation_date') is-invalid @enderror"
            value="{{ old('confirmation_date', isset($employee) && $employee->confirmation_date ? $employee->confirmation_date->format('Y-m-d') : '') }}">

        @error('confirmation_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Employment Type --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">
            Employment Type
            <span class="text-danger">*</span>
        </label>

        <select
            name="employment_type"
            class="form-select @error('employment_type') is-invalid @enderror">

            <option value="">Select Type</option>

            @foreach(['Permanent','Probation','Contract','Part Time','Intern'] as $type)

                <option
                    value="{{ $type }}"
                    {{ old('employment_type', $employee->employment_type ?? '') == $type ? 'selected' : '' }}>

                    {{ $type }}

                </option>

            @endforeach

        </select>

        @error('employment_type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Employment Status --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">
            Employment Status
            <span class="text-danger">*</span>
        </label>

        <select
            name="employment_status"
            class="form-select @error('employment_status') is-invalid @enderror">

            <option value="">Select Status</option>

            @foreach(['Active','Inactive','Resigned','Terminated'] as $status)

                <option
                    value="{{ $status }}"
                    {{ old('employment_status', $employee->employment_status ?? '') == $status ? 'selected' : '' }}>

                    {{ $status }}

                </option>

            @endforeach

        </select>

        @error('employment_status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>

<div class="row">

    {{-- Reporting Manager --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Reporting Manager
        </label>

        <select
            name="reporting_manager_id"
            class="form-select @error('reporting_manager_id') is-invalid @enderror">

            <option value="">
                Select Manager
            </option>

            @foreach($managers as $manager)

                <option
                    value="{{ $manager->id }}"
                    {{ old('reporting_manager_id', $employee->reporting_manager_id ?? '') == $manager->id ? 'selected' : '' }}>

                    {{ $manager->full_name }}

                </option>

            @endforeach

        </select>

        @error('reporting_manager_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Shift --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Shift ID
        </label>

        <input
            type="number"
            name="shift_id"
            class="form-control @error('shift_id') is-invalid @enderror"
            value="{{ old('shift_id', $employee->shift_id ?? '') }}">

        @error('shift_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>

<hr>

<h5 class="mb-3">
    Salary Information
</h5>

<div class="row">

    {{-- Basic Salary --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Basic Salary
        </label>

        <input
            type="number"
            step="0.01"
            name="basic_salary"
            class="form-control @error('basic_salary') is-invalid @enderror"
            value="{{ old('basic_salary', $employee->basic_salary ?? '') }}">

        @error('basic_salary')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Hourly Rate --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Hourly Rate
        </label>

        <input
            type="number"
            step="0.01"
            name="hourly_rate"
            class="form-control @error('hourly_rate') is-invalid @enderror"
            value="{{ old('hourly_rate', $employee->hourly_rate ?? '') }}">

        @error('hourly_rate')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

    {{-- Overtime Rate --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Overtime Rate
        </label>

        <input
            type="number"
            step="0.01"
            name="overtime_rate"
            class="form-control @error('overtime_rate') is-invalid @enderror"
            value="{{ old('overtime_rate', $employee->overtime_rate ?? '') }}">

        @error('overtime_rate')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>

<hr>
<div class="row">

    {{-- Status --}}
    <div class="col-md-3 mb-3">

        <label class="form-label">
            Status
            <span class="text-danger">*</span>
        </label>

        <select
            name="status"
            class="form-select @error('status') is-invalid @enderror">

            <option
                value="1"
                {{ old('status', $employee->status ?? 1) == 1 ? 'selected' : '' }}>

                Active

            </option>

            <option
                value="0"
                {{ old('status', $employee->status ?? 1) == 0 ? 'selected' : '' }}>

                Inactive

            </option>

        </select>

        @error('status')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

</div>

<hr>

<div class="d-flex justify-content-between">

    <a
        href="{{ route('super-admin.settings.employees.index') }}"
        class="btn btn-secondary">

        <i class="bx bx-arrow-back"></i>

        Back

    </a>

    <button
        type="submit"
        class="btn btn-primary">

        <i class="bx bx-save"></i>

        {{ isset($employee) ? 'Update Employee' : 'Save Employee' }}

    </button>

</div>