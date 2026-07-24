<div class="row">

    {{-- Department --}}
    <div class="col-lg-4 mb-3">

        <label class="form-label fw-semibold">

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
                    {{ old('department_id', $designation->department_id ?? '') == $department->id ? 'selected' : '' }}>

                    {{ $department->branch->name }}
                    →
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





    {{-- Designation Name --}}
    <div class="col-lg-4 mb-3">

        <label class="form-label fw-semibold">

            Designation Name
            <span class="text-danger">*</span>

        </label>

        <input
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $designation->name ?? '') }}"
            placeholder="Enter designation name">

        @error('name')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>





    {{-- Code --}}
    <div class="col-lg-4 mb-3">

        <label class="form-label fw-semibold">

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

    {{-- Level --}}
    <div class="col-lg-3 mb-3">

        <label class="form-label fw-semibold">

            Level
            <span class="text-danger">*</span>

        </label>

        <input
            type="number"
            min="1"
            max="10"
            name="level"
            class="form-control @error('level') is-invalid @enderror"
            value="{{ old('level', $designation->level ?? 5) }}">

        @error('level')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>





    {{-- Status --}}
    <div class="col-lg-3 mb-3">

        <label class="form-label fw-semibold">

            Status

        </label>

        <select
            name="status"
            class="form-select">

            <option
                value="1"
                {{ old('status', $designation->status ?? true) ? 'selected' : '' }}>

                Active

            </option>

            <option
                value="0"
                {{ old('status', $designation->status ?? true) == false ? 'selected' : '' }}>

                Inactive

            </option>

        </select>

    </div>





    {{-- Email --}}
    <div class="col-lg-3 mb-3">

        <label class="form-label fw-semibold">

            Email

        </label>

        <input
            type="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $designation->email ?? '') }}">

        @error('email')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>





    {{-- Phone --}}
    <div class="col-lg-3 mb-3">

        <label class="form-label fw-semibold">

            Phone

        </label>

        <input
            type="text"
            name="phone"
            class="form-control @error('phone') is-invalid @enderror"
            value="{{ old('phone', $designation->phone ?? '') }}">

        @error('phone')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

</div>







<div class="row">

    {{-- Description --}}
    <div class="col-lg-12 mb-3">

        <label class="form-label fw-semibold">

            Description

        </label>

        <textarea
            name="description"
            rows="4"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="Write designation description...">{{ old('description', $designation->description ?? '') }}</textarea>

        @error('description')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

</div>







<hr>

<div class="d-flex gap-2">

    <button
        type="submit"
        class="btn btn-primary">

        <i class="bx bx-save"></i>

        {{ isset($designation)
            ? 'Update Designation'
            : 'Save Designation' }}

    </button>

    <a
        href="{{ route('super-admin.settings.designations.index') }}"
        class="btn btn-secondary">

        <i class="bx bx-arrow-back"></i>

        Back

    </a>

</div>