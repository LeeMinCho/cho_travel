<!-- jQuery -->
<script src="{{ url('assets/backend') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('assets/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Summernote -->
<script src="{{ url('assets/backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Select2 -->
<script src="{{ url('assets/backend') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="{{ url('assets/backend') }}/plugins/sweetalert2/sweetalert2.all.min.js"></script>
{{-- Moment JS --}}
<script src="{{ url('assets/backend') }}/plugins/moment/moment.min.js"></script>
<!-- date-range-picker -->
<script src="{{ url('assets/backend') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('assets/backend') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
{{-- jquery mask igorescobar --}}
<script src="{{ url('assets/backend') }}/plugins/jquery-mask/dist/jquery.mask.min.js">
</script>
<!-- Ekko Lightbox -->
<script src="{{ url('assets/backend') }}/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('assets/backend') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('assets/backend') }}/dist/js/demo.js"></script>

<script>
    $('.select2').select2({
        theme: 'bootstrap4',
    });

    $(".money").mask("#,##0", {reverse: true});

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true
        });
    });
</script>

@livewireScripts

@stack('custom-scripts')