<div class="row">

    {{-- Branch --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Branch
        </label>

        <select
            name="branch_id"
            class="form-select">

            <option value="">
                Select Branch
            </option>

            @foreach($branches as $branch)

                <option
                    value="{{ $branch->id }}"
                    {{ old('branch_id', $department->branch_id ?? '') == $branch->id ? 'selected' : '' }}>

                    {{ $branch->name }}

                </option>

            @endforeach

        </select>

    </div>


    {{-- Department Name --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Department Name
        </label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name', $department->name ?? '') }}">

    </div>


    {{-- Department Code --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Department Code
        </label>

        <input
            type="text"
            class="form-control"
            value="{{ $department->code ?? 'Auto Generate' }}"
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
            value="{{ old('email', $department->email ?? '') }}">

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
            value="{{ old('phone', $department->phone ?? '') }}">

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
                {{ old('status', $department->status ?? 1) == 1 ? 'selected' : '' }}>

                Active

            </option>

            <option
                value="0"
                {{ old('status', $department->status ?? 1) == 0 ? 'selected' : '' }}>

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
            rows="4">{{ old('description', $department->description ?? '') }}</textarea>

    </div>

</div>


<div class="mt-4">

    <button
        type="submit"
        class="btn btn-light">

        <i class="bx bx-save"></i>

        {{ isset($department) ? 'Update Department' : 'Save Department' }}

    </button>


    <a
        href="{{ route('super-admin.settings.departments.index') }}"
        class="btn btn-light">

        Back

    </a>

</div>