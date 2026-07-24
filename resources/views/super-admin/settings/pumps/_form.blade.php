<div class="row">

    {{-- Pump Name --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Pump Name <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name', $pump->name ?? '') }}"
            required>

    </div>

    {{-- Pump Code --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Pump Code <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="code"
            class="form-control text-uppercase"
            value="{{ old('code', $pump->code ?? '') }}"
            required>

    </div>

</div>


<div class="row">

    {{-- Owner Name --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Owner Name
        </label>

        <input
            type="text"
            name="owner_name"
            class="form-control"
            value="{{ old('owner_name', $pump->owner_name ?? '') }}">

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
            value="{{ old('phone', $pump->phone ?? '') }}">

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
            value="{{ old('email', $pump->email ?? '') }}">

    </div>

    {{-- Status --}}
    <div class="col-md-6 mb-3">

        <label class="form-label">
            Status
        </label>

        <select
            name="status"
            class="form-select">

            <option
                value="1"
                {{ old('status', $pump->status ?? 1) == 1 ? 'selected' : '' }}>

                Active

            </option>

            <option
                value="0"
                {{ old('status', $pump->status ?? 1) == 0 ? 'selected' : '' }}>

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

        <textarea
            name="address"
            rows="4"
            class="form-control">{{ old('address', $pump->address ?? '') }}</textarea>

    </div>

</div>


<div class="mt-4">

    <button
        type="submit"
        class="btn btn-light">

        <i class="bx bx-save"></i>

        {{ isset($pump) ? 'Update Pump' : 'Save Pump' }}

    </button>

    <a
        href="{{ route('super-admin.settings.pumps.index') }}"
        class="btn btn-light">

        Back

    </a>

</div>