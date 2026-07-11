<div class="row">

    <div class="col-md-4 mb-3">

        <label class="form-label">
            Company Name
        </label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name', $company->name ?? '') }}">

    </div>


    <div class="col-md-4 mb-3">

        <label class="form-label">
            Email
        </label>

        <input
            type="email"
            name="email"
            class="form-control"
            value="{{ old('email', $company->email ?? '') }}">

    </div>


    <div class="col-md-4 mb-3">

        <label class="form-label">
            Phone
        </label>

        <input
            type="text"
            name="phone"
            class="form-control"
            value="{{ old('phone', $company->phone ?? '') }}">

    </div>

</div>


<div class="row">

    <div class="col-md-4 mb-3">

        <label class="form-label">
            Website
        </label>

        <input
            type="text"
            name="website"
            class="form-control"
            value="{{ old('website', $company->website ?? '') }}">

    </div>


    <div class="col-md-4 mb-3">

        <label class="form-label">
            Trade License
        </label>

        <input
            type="text"
            name="trade_license"
            class="form-control"
            value="{{ old('trade_license', $company->trade_license ?? '') }}">

    </div>


    <div class="col-md-4 mb-3">

        <label class="form-label">
            BIN
        </label>

        <input
            type="text"
            name="bin"
            class="form-control"
            value="{{ old('bin', $company->bin ?? '') }}">

    </div>

</div>

<div class="row">

    <div class="col-md-4 mb-3">

        <label class="form-label">
            TIN
        </label>

        <input
            type="text"
            name="tin"
            class="form-control"
            value="{{ old('tin', $company->tin ?? '') }}">

    </div>


    <div class="col-md-4 mb-3">

        <label class="form-label">
            Logo
        </label>

        <input
            type="file"
            name="logo"
            class="form-control">

            @if(isset($company) && $company->logo)

    <div class="mt-2">

        <img
            src="{{ asset('storage/'.$company->logo) }}"
            alt="Company Logo"
            width="80"
            class="img-thumbnail">

    </div>

@endif

        <small >
            JPG, JPEG, PNG, WEBP , SVG (Max 2MB)
        </small>

    </div>


    <div class="col-md-4 mb-3">

        <label class="form-label">
            Status
        </label>

        <select
            name="status"
            class="form-select">

            <option
                value="1"
                {{ old('status', $company->status ?? 1) == 1 ? 'selected' : '' }}>

                Active

            </option>


            <option
                value="0"
                {{ old('status', $company->status ?? 1) == 0 ? 'selected' : '' }}>

                Inactive

            </option>

        </select>

    </div>

</div>


<div class="row">

    <div class="col-md-12 mb-3">

        <label class="form-label">
            Address
        </label>

        <textarea
            name="address"
            class="form-control"
            rows="3">{{ old('address', $company->address ?? '') }}</textarea>

    </div>

</div>


<div class="mt-4">

    <button
        type="submit"
        class="btn btn-light">

        <i class="bx bx-save"></i>

        {{ isset($company) ? 'Update Company' : 'Save Company' }}

    </button>


    <a
        href="{{ route('super-admin.settings.companies.index') }}"
        class="btn btn-light">

        Back

    </a>

</div>