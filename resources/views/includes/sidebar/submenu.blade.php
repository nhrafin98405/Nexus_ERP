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

                        @if($child->isComingSoon())
                            <span class="badge bg-warning ms-2">
                                Coming Soon
                            </span>
                        @endif

                    </div>

                </a>

                @include('includes.sidebar.submenu', [
                    'children' => $child->children
                ])

            </li>

        @else

            <li class="{{ $child->isActive() ? 'mm-active' : '' }}">

                <a href="{{ $child->getLink() }}"
                   @if($child->target) target="{{ $child->target }}" @endif
                   class="{{ $child->isActive() ? 'mm-active' : '' }}">

                    <div class="parent-icon">
                        <i class="{{ $child->icon }}"></i>
                    </div>

                    <div class="menu-title">

                        {{ $child->name }}

                        @if($child->isComingSoon())
                            <span class="badge bg-warning ms-2">
                                Coming Soon
                            </span>
                        @endif

                    </div>

                </a>

            </li>

        @endif

    @endforeach

</ul>

<script>

function comingSoonAlert(){

    alert(
        "This module is coming soon 🚀"
    );

}

</script>