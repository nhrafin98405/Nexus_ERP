<div class="row">

    {{-- Department --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Department
        </label>

        <select
            name="department_id"
            class="form-select">

            <option value="">
                Select Department
            </option>

            @foreach($departments as $department)

                <option
                    value="{{ $department->id }}"
                    {{ old('department_id', $designation->department_id ?? '') == $department->id ? 'selected' : '' }}>

                    {{ $department->name }}

                </option>

            @endforeach

        </select>

    </div>


    {{-- Designation Name --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Designation Name
        </label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name', $designation->name ?? '') }}">

    </div>


    {{-- Designation Code --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Designation Code
        </label>

        <input
            type="text"
            class="form-control"
            value="{{ $designation->code ?? 'Auto Generate' }}"
            readonly>

    </div>

</div>


<div class="row">

    {{-- Email --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Email
        </label>

        <input
            type="email"
            name="email"
            class="form-control"
            value="{{ old('email', $designation->email ?? '') }}">

    </div>


    {{-- Phone --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Phone
        </label>

        <input
            type="text"
            name="phone"
            class="form-control"
            value="{{ old('phone', $designation->phone ?? '') }}">

    </div>

</div>


<div class="row">

    {{-- Status --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Status
        </label>

        <select
            name="status"
            class="form-select">

            <option
                value="1"
                {{ old('status', $designation->status ?? 1) == 1 ? 'selected' : '' }}>

                Active

            </option>

            <option
                value="0"
                {{ old('status', $designation->status ?? 1) == 0 ? 'selected' : '' }}>

                Inactive

            </option>

        </select>

    </div>

</div>


<div class="row">

    {{-- Description --}}
    <div class="col-md-12 mb-3">

        <label class="form-label">
            Description
        </label>

        <textarea
            name="description"
            class="form-control"
            rows="4">{{ old('description', $designation->description ?? '') }}</textarea>

    </div>

</div>


<div class="mt-4">

    <button
        type="submit"
        class="btn btn-light">

        <i class="bx bx-save"></i>

        {{ isset($designation) ? 'Update Designation' : 'Save Designation' }}

    </button>

    <a
        href="{{ route('super-admin.settings.designations.index') }}"
        class="btn btn-light">

        Back

    </a>

</div>