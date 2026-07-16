@if($menu->children->count())

<li class="{{ $menu->isActive() ? 'mm-active' : '' }}">


    <a href="javascript:;" 
       class="has-arrow {{ $menu->isActive() ? 'mm-active' : '' }}">


        <div class="parent-icon">

            <i class="{{ $menu->icon }}"></i>

        </div>


        <div class="menu-title">

            {{ $menu->name }}


            @if($menu->isComingSoon())

                <span class="badge bg-warning text-dark ms-2">

                    <i class="bx bx-lock"></i>

                </span>

            @endif


        </div>


    </a>



    @include('includes.sidebar.submenu',[
        'children'=>$menu->children
    ])


</li>



@else


<li class="{{ $menu->isActive() ? 'mm-active' : '' }}">


@if($menu->isComingSoon())


<a href="javascript:void(0)"
   onclick="comingSoonAlert()">


@else


<a href="{{ $menu->getLink() }}">


@endif



<div class="parent-icon">

<i class="{{ $menu->icon }}"></i>

</div>



<div class="menu-title">


{{ $menu->name }}



@if($menu->isComingSoon())

<span class="badge bg-warning text-dark ms-2">

<i class="bx bx-lock"></i>

</span>


@endif



</div>


</a>


</li>


@endif