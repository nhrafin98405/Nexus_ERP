<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- jQuery -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<!-- Core Plugins -->
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>

<!-- App -->
<script src="{{ asset('assets/js/app.js') }}"></script>

<!-- ApexCharts -->
<script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>

<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>

<!-- Vector Map -->
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<!-- Easy Pie Chart -->
<script src="{{ asset('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>

<!-- Sparkline -->
<script src="{{ asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>

<!-- Knob -->
<script src="{{ asset('assets/plugins/jquery-knob/excanvas.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>

<script>
    $(function () {
        $('.knob').knob();
    });
</script>

<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

<script>
$(function () {

    if ($('#usersTable').length) {

        $('#usersTable').DataTable({
            responsive: true,
            pageLength: 10,
            ordering: true,
            searching: true,
            autoWidth: false
        });

    }

});
</script>

<!-- BS Stepper Plugin -->
<script src="{{ asset('assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>

<!-- Dashboard JS -->
@if(request()->routeIs('super-admin.dashboard'))
    <script src="{{ asset('assets/js/index.js') }}"></script>
@endif

{{-- Page Specific Scripts --}}
@stack('scripts')