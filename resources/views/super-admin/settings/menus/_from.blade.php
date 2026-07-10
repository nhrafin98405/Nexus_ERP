<div class="row">

    <div class="col-md-4 mb-3">

        <label class="form-label">
            Parent Menu
        </label>

        <select name="parent_id" class="form-select">

            <option value="">
                Main Menu
            </option>

            @foreach($parents as $parent)

                <option
                    value="{{ $parent->id }}"
                    {{ old('parent_id', $menu->parent_id ?? '') == $parent->id ? 'selected' : '' }}>

                    {{ $parent->name }}

                </option>

            @endforeach

        </select>

    </div>



    <div class="col-md-4 mb-3">

        <label class="form-label">
            Menu Name
        </label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name', $menu->name ?? '') }}">

    </div>



    <div class="col-md-4 mb-3">

        <label class="form-label">
            Slug
        </label>

        <input
            type="text"
            name="slug"
            class="form-control"
            value="{{ old('slug', $menu->slug ?? '') }}">

    </div>

</div>

<div class="row">

    <div class="col-md-4 mb-3">

        <label class="form-label">
            Icon
        </label>

        <input
            type="text"
            name="icon"
            class="form-control"
            placeholder="bx bx-home"
            value="{{ old('icon', $menu->icon ?? '') }}">

        <small class="text-muted">
            Example: bx bx-home, bx bx-user
        </small>

    </div>



    <div class="col-md-4 mb-3">

        <label class="form-label">
            Route Name
        </label>

        <input
            type="text"
            name="route_name"
            class="form-control"
            placeholder="super-admin.dashboard"
            value="{{ old('route_name', $menu->route_name ?? '') }}">

    </div>



    <div class="col-md-4 mb-3">

        <label class="form-label">
            URL
        </label>

        <input
            type="text"
            name="url"
            class="form-control"
            placeholder="/dashboard"
            value="{{ old('url', $menu->url ?? '') }}">

    </div>

</div>

<div class="row">

    <div class="col-md-4 mb-3">

        <label class="form-label">
            Menu Type
        </label>

        <select name="menu_type" class="form-select">

            <option value="menu"
                {{ old('menu_type', $menu->menu_type ?? 'menu') == 'menu' ? 'selected' : '' }}>
                Menu
            </option>

            <option value="group"
                {{ old('menu_type', $menu->menu_type ?? '') == 'group' ? 'selected' : '' }}>
                Group
            </option>

            <option value="submenu"
                {{ old('menu_type', $menu->menu_type ?? '') == 'submenu' ? 'selected' : '' }}>
                Sub Menu
            </option>

        </select>

    </div>



    <div class="col-md-4 mb-3">

        <label class="form-label">
            Sort Order
        </label>

        <input
            type="number"
            name="sort_order"
            class="form-control"
            min="0"
            value="{{ old('sort_order', $menu->sort_order ?? 0) }}">

    </div>



    <div class="col-md-4 mb-3">

        <label class="form-label">
            Status
        </label>

        <select name="status" class="form-select">

            <option value="1"
                {{ old('status', $menu->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0"
                {{ old('status', $menu->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>

        </select>

    </div>

</div>

<div class="mt-4">

    <button type="submit" class="btn btn-primary">

        <i class="bx bx-save"></i>

        {{ isset($menu) ? 'Update Menu' : 'Save Menu' }}

    </button>

    <a href="{{ route('super-admin.settings.menus.index') }}"
       class="btn btn-secondary">

        Back

    </a>

</div>