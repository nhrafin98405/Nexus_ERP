@if ($menu->children->count())
    <li class="{{ $menu->isActive() ? 'mm-active' : '' }}">

        <a href="javascript:;" class="has-arrow {{ $menu->isActive() ? 'mm-active' : '' }}">

            <div class="parent-icon">
                <i class="{{ $menu->icon }}"></i>
            </div>

            <div class="menu-title">

                {{ $menu->name }}

            </div>

        </a>

        @include('includes.sidebar.submenu', [
            'children' => $menu->children,
        ])

    </li>
@else
    <li class="{{ $menu->isActive() ? 'mm-active' : '' }}">

        <a href="{{ $menu->route_name && Route::has($menu->route_name) ? route($menu->route_name) : $menu->url ?? '#' }}"
            class="{{ $menu->isActive() ? 'mm-active' : '' }}">
            

            <div class="parent-icon">
                <i class="{{ $menu->icon }}"></i>
            </div>

            <div class="menu-title">

                {{ $menu->name }}

            </div>

        </a>

    </li>
@endif
