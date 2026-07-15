<div class="row">

    {{-- Company --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Company
        </label>

        <select
            name="company_id"
            class="form-select">

            <option value="">
                Select Company
            </option>

            @foreach($companies as $company)

                <option
                    value="{{ $company->id }}"
                    {{ old('company_id', $branch->company_id ?? '') == $company->id ? 'selected' : '' }}>

                    {{ $company->name }}

                </option>

            @endforeach

        </select>

    </div>


    {{-- Branch Name --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Branch Name
        </label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name', $branch->name ?? '') }}">

    </div>


    {{-- Branch Code --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Branch Code
        </label>

        <input
            type="text"
            class="form-control"
            value="{{ $branch->code ?? 'Auto Generate' }}"
            readonly>

    </div>

</div>


<div class="row">

    {{-- Email --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Email
        </label>

        <input
            type="email"
            name="email"
            class="form-control"
            value="{{ old('email', $branch->email ?? '') }}">

    </div>


    {{-- Phone --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Phone
        </label>

        <input
            type="text"
            name="phone"
            class="form-control"
            value="{{ old('phone', $branch->phone ?? '') }}">

    </div>


    {{-- Website --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Website
        </label>

        <input
            type="text"
            name="website"
            class="form-control"
            value="{{ old('website', $branch->website ?? '') }}">

    </div>

</div>


<div class="row">

    {{-- Logo --}}
    <div class="col-md-4 mb-3">

        <label class="form-label">
            Logo
        </label>

        <input
            type="file"
            name="logo"
            class="form-control">

        @if(isset($branch) && $branch->logo)

            <div class="mt-2">

                <img
                    src="{{ asset('storage/'.$branch->logo) }}"
                    alt="Branch Logo"
                    width="80"
                    class="img-thumbnail">

            </div>

        @endif

        <small>
            JPG, JPEG, PNG, WEBP, SVG (Max 2MB)
        </small>

    </div>


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
                {{ old('status', $branch->status ?? 1) == 1 ? 'selected' : '' }}>

                Active

            </option>

            <option
                value="0"
                {{ old('status', $branch->status ?? 1) == 0 ? 'selected' : '' }}>

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
            class="form-control"
            rows="3">{{ old('address', $branch->address ?? '') }}</textarea>

    </div>

</div>


<div class="mt-4">

    <button
        type="submit"
        class="btn btn-light">

        <i class="bx bx-save"></i>

        {{ isset($branch) ? 'Update Branch' : 'Save Branch' }}

    </button>


    <a
        href="{{ route('super-admin.settings.branches.index') }}"
        class="btn btn-light">

        Back

    </a>

</div>