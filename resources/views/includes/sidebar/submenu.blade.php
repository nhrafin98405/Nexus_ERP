<ul>

    @foreach($children as $child)

        @if($child->children->count())

            <li>

                <a href="javascript:;" class="has-arrow">

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

            <li>

               <a href="{{ $child->route_name ? route($child->route_name) : url($child->url) }}">

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