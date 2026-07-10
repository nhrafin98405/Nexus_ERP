<ul class="metismenu" id="menu">

    @foreach($sidebarMenus as $menu)

        @include('includes.sidebar.menu-item', [
            'menu' => $menu
        ])

    @endforeach

</ul>