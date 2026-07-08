<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Plugins -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>

<!-- Dashboard Plugins -->
<script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-knob/excanvas.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>

<script>
    $(function () {
        $(".knob").knob();
    });
</script>


<!-- DataTable JS -->
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

<!-- DataTable Buttons -->
{{-- <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script> --}}


<!-- DataTable Initialize -->
<script>
$(document).ready(function () {

    $('#usersTable').DataTable({

        lengthChange: true,

        buttons: [
            'copy',
            'excel',
            'pdf',
            'print'
        ]

    }).buttons().container()
      .appendTo('#usersTable_wrapper .col-md-6:eq(0)');

});
</script>


<!-- App JS -->
{{-- <script src="{{ asset('assets/js/index.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/app.js') }}"></script> --}}