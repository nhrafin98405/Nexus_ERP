<!doctype html>
<html lang="en">

{{-- head  --}}

@include('includes.head')

{{-- head --}}

<body class="bg-theme bg-theme1">
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->

        @include('includes.sidebar')

        <!--end sidebar wrapper -->
        <!--start header -->


        @include('includes.header')

        <!--end header -->
        <!--start page wrapper -->

        <div class="page-wrapper">
            <div class="page-content">

                @yield('content')


            </div>
        </div>

        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->


        @include('includes.footer')

    </div>
    <!--end wrapper-->
    <!--start switcher-->

    @include('includes.switch')


    <!--end switcher-->
    <!-- Bootstrap JS -->

    @include('includes.scripts')

    <!-- Bootstrap JS -->
</body>

</html>
