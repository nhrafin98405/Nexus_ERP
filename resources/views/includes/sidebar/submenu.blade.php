<ul>

    @foreach($children as $child)

        @if(!$child->canAccess() && !$child->hasVisibleChildren())
            @continue
        @endif

        @if($child->children->count())

            <li class="{{ $child->isActive() ? 'mm-active' : '' }}">

                <a href="javascript:;"
                   class="has-arrow {{ $child->isActive() ? 'mm-active' : '' }}">

                    <div class="parent-icon">
                        <i class="{{ $child->icon }}"></i>
                    </div>

                    <div class="menu-title">
                        {{ $child->name }}
                    </div>

                </a>

                @include('includes.sidebar.submenu', [
                    'children' => $child->children
                ])

            </li>

        @else

            <li class="{{ $child->isActive() ? 'mm-active' : '' }}">

                <a href="{{ $child->route_name && Route::has($child->route_name)
    ? route($child->route_name)
    : ($child->url ?: '#') }}"
                   class="{{ $child->isActive() ? 'mm-active' : '' }}">

                    <div class="parent-icon">
                        <i class="{{ $child->icon }}"></i>
                    </div>

                    <div class="menu-title">
                        {{ $child->name }}
                    </div>

                </a>

            </li>

        @endif

    @endforeach

</ul>