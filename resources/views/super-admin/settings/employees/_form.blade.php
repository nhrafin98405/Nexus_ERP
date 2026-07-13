<div class="row">


    {{-- Company --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Company
        </label>

        <select name="company_id"
                class="form-select">

            <option value="">
                Select Company
            </option>


            @foreach($companies as $company)

                <option value="{{ $company->id }}"
                    {{ old('company_id',$employee->company_id ?? '') == $company->id ? 'selected':'' }}>

                    {{ $company->name }}

                </option>

            @endforeach

        </select>

    </div>



    {{-- Branch --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Branch
        </label>

        <select name="branch_id"
                class="form-select">

            <option value="">
                Select Branch
            </option>


            @foreach($branches as $branch)

                <option value="{{ $branch->id }}"
                    {{ old('branch_id',$employee->branch_id ?? '') == $branch->id ? 'selected':'' }}>

                    {{ $branch->name }}

                </option>

            @endforeach


        </select>

    </div>



    {{-- Department --}}
    <div class="col-md-4 mb-3">


        <label class="form-label">
            Department
        </label>


        <select name="department_id"
                class="form-select">


            <option value="">
                Select Department
            </option>


            @foreach($departments as $department)


                <option value="{{ $department->id }}"
                    {{ old('department_id',$employee->department_id ?? '') == $department->id ? 'selected':'' }}>


                    {{ $department->name }}


                </option>


            @endforeach


        </select>


    </div>


</div>




<div class="row">


    {{-- Designation --}}
    <div class="col-md-4 mb-3">


        <label class="form-label">
            Designation
        </label>


        <select name="designation_id"
                class="form-select">


            <option value="">
                Select Designation
            </option>



            @foreach($designations as $designation)


                <option value="{{ $designation->id }}"
                    {{ old('designation_id',$employee->designation_id ?? '') == $designation->id ? 'selected':'' }}>


                    {{ $designation->name }}


                </option>


            @endforeach



        </select>


    </div>




    {{-- Employee Code --}}
    <div class="col-md-4 mb-3">


        <label class="form-label">
            Employee Code
        </label>


        <input type="text"
               class="form-control"
               value="{{ $employee->employee_code ?? 'Auto Generate' }}"
               readonly>


    </div>




    {{-- Name --}}
    <div class="col-md-4 mb-3">


        <label class="form-label">
            Employee Name
        </label>


        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name',$employee->name ?? '') }}">


    </div>


</div>





<div class="row">


    {{-- Email --}}
    <div class="col-md-6 mb-3">


        <label class="form-label">
            Email
        </label>


        <input type="email"
               name="email"
               class="form-control"
               value="{{ old('email',$employee->email ?? '') }}">


    </div>




    {{-- Phone --}}
    <div class="col-md-6 mb-3">


        <label class="form-label">
            Phone
        </label>


        <input type="text"
               name="phone"
               class="form-control"
               value="{{ old('phone',$employee->phone ?? '') }}">


    </div>


</div>





<div class="row">


    {{-- Photo --}}
    <div class="col-md-4 mb-3">


        <label class="form-label">
            Photo
        </label>


        <input type="file"
               name="photo"
               class="form-control">


        @if(isset($employee) && $employee->photo)

            <img src="{{ asset('storage/'.$employee->photo) }}"
                 width="80"
                 class="mt-2 rounded">

        @endif


    </div>




    {{-- Gender --}}
    <div class="col-md-4 mb-3">


        <label class="form-label">
            Gender
        </label>


        <select name="gender"
                class="form-select">


            <option value="">
                Select Gender
            </option>


            <option value="male"
                {{ old('gender',$employee->gender ?? '') == 'male' ? 'selected':'' }}>

                Male

            </option>



            <option value="female"
                {{ old('gender',$employee->gender ?? '') == 'female' ? 'selected':'' }}>

                Female

            </option>



            <option value="other"
                {{ old('gender',$employee->gender ?? '') == 'other' ? 'selected':'' }}>

                Other

            </option>


        </select>


    </div>





    {{-- Date Of Birth --}}
    <div class="col-md-4 mb-3">


        <label class="form-label">
            Date Of Birth
        </label>


        <input type="date"
               name="date_of_birth"
               class="form-control"
               value="{{ old('date_of_birth',$employee->date_of_birth ?? '') }}">


    </div>


</div>





<div class="row">


    {{-- Joining Date --}}
    <div class="col-md-4 mb-3">


        <label class="form-label">
            Joining Date
        </label>


        <input type="date"
               name="joining_date"
               class="form-control"
               value="{{ old('joining_date',$employee->joining_date ?? '') }}">


    </div>




    {{-- Status --}}
    <div class="col-md-4 mb-3">


        <label class="form-label">
            Status
        </label>


        <select name="status"
                class="form-select">


            <option value="1"
            {{ old('status',$employee->status ?? 1)==1?'selected':'' }}>

                Active

            </option>


            <option value="0"
            {{ old('status',$employee->status ?? 1)==0?'selected':'' }}>

                Inactive

            </option>


        </select>


    </div>


</div>





<div class="row">


    {{-- Address --}}
    <div class="col-md-12 mb-3">


        <label class="form-label">
            Address
        </label>


        <textarea name="address"
                  class="form-control"
                  rows="4">{{ old('address',$employee->address ?? '') }}</textarea>


    </div>


</div>





<div class="mt-4">


    <button type="submit"
            class="btn btn-light">


        <i class="bx bx-save"></i>


        {{ isset($employee) ? 'Update Employee':'Save Employee' }}


    </button>




    <a href="{{ route('super-admin.settings.employees.index') }}"
       class="btn btn-light">

        Back

    </a>


</div>