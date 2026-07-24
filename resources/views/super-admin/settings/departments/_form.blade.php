<div class="row g-4">

    {{-- Branch --}}
    <div class="col-md-6">

        <label class="form-label fw-semibold">
            Branch <span class="text-danger">*</span>
        </label>

        <select
            name="branch_id"
            class="form-select @error('branch_id') is-invalid @enderror">

            <option value="">
                -- Select Branch --
            </option>

            @foreach($branches as $branch)

                <option
                    value="{{ $branch->id }}"
                    {{ old('branch_id', $department->branch_id ?? '') == $branch->id ? 'selected' : '' }}>

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



    {{-- Department Name --}}
    <div class="col-md-6">

        <label class="form-label fw-semibold">
            Department Name <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            placeholder="Enter Department Name"
            value="{{ old('name', $department->name ?? '') }}">

        @error('name')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>



    {{-- Department Code --}}
    <div class="col-md-4">

        <label class="form-label fw-semibold">

            Department Code

        </label>

        <input
            type="text"
            class="form-control"
            value="{{ $department->code ?? 'Auto Generate' }}"
            readonly>

    </div>



    {{-- Email --}}
    <div class="col-md-4">

        <label class="form-label fw-semibold">

            Email

        </label>

        <input
            type="email"
            name="email"
            class="form-control @error('email') is-invalid @enderror"
            placeholder="department@email.com"
            value="{{ old('email', $department->email ?? '') }}">

        @error('email')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>



    {{-- Phone --}}
    <div class="col-md-4">

        <label class="form-label fw-semibold">

            Phone

        </label>

        <input
            type="text"
            name="phone"
            class="form-control @error('phone') is-invalid @enderror"
            placeholder="01XXXXXXXXX"
            value="{{ old('phone', $department->phone ?? '') }}">

        @error('phone')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>



    {{-- Sort Order --}}
    <div class="col-md-4">

        <label class="form-label fw-semibold">

            Sort Order

        </label>

        <input
            type="number"
            name="sort_order"
            class="form-control @error('sort_order') is-invalid @enderror"
            value="{{ old('sort_order', $department->sort_order ?? 0) }}">

        @error('sort_order')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>



    {{-- Status --}}
    <div class="col-md-4">

        <label class="form-label fw-semibold">
            Status <span class="text-danger">*</span>
        </label>

        <select
            name="status"
            class="form-select @error('status') is-invalid @enderror">

            <option value="1"
                {{ old('status', $department->status ?? 1) == 1 ? 'selected' : '' }}>

                Active

            </option>

            <option value="0"
                {{ old('status', $department->status ?? 1) == 0 ? 'selected' : '' }}>

                Inactive

            </option>

        </select>

        @error('status')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>



    {{-- System Department --}}
    <div class="col-md-4">

        <label class="form-label fw-semibold">

            System Department

        </label>

        <select
            name="is_system"
            class="form-select">

            <option value="0"
                {{ old('is_system', $department->is_system ?? 0) == 0 ? 'selected' : '' }}>

                No

            </option>

            <option value="1"
                {{ old('is_system', $department->is_system ?? 0) == 1 ? 'selected' : '' }}>

                Yes

            </option>

        </select>

    </div>



    {{-- Description --}}
    <div class="col-12">

        <label class="form-label fw-semibold">

            Description

        </label>

        <textarea
            name="description"
            rows="4"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="Write department description...">{{ old('description', $department->description ?? '') }}</textarea>

        @error('description')

            <div class="invalid-feedback">

                {{ $message }}

            </div>

        @enderror

    </div>

</div>



<hr class="my-4">



<div class="d-flex justify-content-end gap-2">

    <a
        href="{{ route('super-admin.settings.departments.index') }}"
        class="btn btn-light">

        <i class="bx bx-arrow-back me-1"></i>

        Back

    </a>

    <button
        type="submit"
        class="btn btn-primary">

        <i class="bx bx-save me-1"></i>

        {{ isset($department) ? 'Update Department' : 'Save Department' }}

    </button>

</div>