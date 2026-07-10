<ul class="metismenu" id="menu">

    @foreach($sidebarMenus as $menu)

        @if(!$menu->canAccess() && !$menu->hasVisibleChildren())
            @continue
        @endif

        @include('includes.sidebar.menu-item', [
            'menu' => $menu
        ])

    @endforeach

</ul>