@if($menu->children->count())

    <li>

        <a href="javascript:;" class="has-arrow">

            <div class="parent-icon">
                <i class="{{ $menu->icon }}"></i>
            </div>

            <div class="menu-title">

                {{ $menu->name }}

            </div>

        </a>

        @include('includes.sidebar.submenu', [
            'children' => $menu->children
        ])

    </li>

@else

    <li>

        <a href="{{ $menu->route_name ? route($menu->route_name) : url($menu->url) }}">

            <div class="parent-icon">
                <i class="{{ $menu->icon }}"></i>
            </div>

            <div class="menu-title">

                {{ $menu->name }}

            </div>

        </a>

    </li>

@endif