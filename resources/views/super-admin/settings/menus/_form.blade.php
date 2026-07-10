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

        <div class="mt-2">
            <i
                id="iconPreview"
                class="{{ old('icon', $menu->icon ?? 'bx bx-home') }}"
                style="font-size:24px;">
            </i>
        </div>

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
            Permission
        </label>

        <select
            name="permission_name"
            class="form-select">

            <option value="">
                No Permission
            </option>

            @foreach($permissions as $permission)

                <option
                    value="{{ $permission->name }}"
                    @selected(old('permission_name', $menu->permission_name ?? '') == $permission->name)>

                    {{ $permission->name }}

                </option>

            @endforeach

        </select>

    </div>

</div>


<div class="row">

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

    <div class="col-md-4 mb-3">

        <label class="form-label">
            Menu Type
        </label>

        <select
            name="menu_type"
            class="form-select">

            <option
                value="sidebar"
                {{ old('menu_type', $menu->menu_type ?? 'sidebar') == 'sidebar' ? 'selected' : '' }}>

                Sidebar

            </option>

            <option
                value="topbar"
                {{ old('menu_type', $menu->menu_type ?? '') == 'topbar' ? 'selected' : '' }}>

                Topbar

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

</div>


<div class="row">

    <div class="col-md-4 mb-3">

        <label class="form-label">
            Status
        </label>

        <select
            name="status"
            class="form-select">

            <option
                value="1"
                {{ old('status', $menu->status ?? 1) == 1 ? 'selected' : '' }}>

                Active

            </option>

            <option
                value="0"
                {{ old('status', $menu->status ?? 1) == 0 ? 'selected' : '' }}>

                Inactive

            </option>

        </select>

    </div>

</div>


<div class="mt-4">

    <button
        type="submit"
        class="btn btn-light">

        <i class="bx bx-save"></i>

        {{ isset($menu) ? 'Update Menu' : 'Save Menu' }}

    </button>

    <a
        href="{{ route('super-admin.settings.menus.index') }}"
        class="btn btn-light">

        Back

    </a>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const input = document.querySelector('input[name="icon"]');
    const preview = document.getElementById('iconPreview');

    if (input && preview) {

        input.addEventListener('keyup', function () {

            preview.className = this.value;

        });

    }

});

</script>