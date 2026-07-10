<div class="page-breadcrumb d-flex align-items-center mb-3">

    <div class="breadcrumb-title pe-3">
        {{ $title }}
    </div>

    <div class="ps-3">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb mb-0 p-0">

                <li class="breadcrumb-item">

                    <a href="{{ route('super-admin.dashboard') }}">
                        <i class="bx bx-home-alt"></i>
                    </a>

                </li>

                @isset($parent)

                    <li class="breadcrumb-item">
                        {{ $parent }}
                    </li>

                @endisset

                <li class="breadcrumb-item active">
                    {{ $current }}
                </li>

            </ol>

        </nav>

    </div>

</div>