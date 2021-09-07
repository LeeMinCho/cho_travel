<!-- jQuery -->
<script src="{{ url('assets/backend') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('assets/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="{{ url('assets/backend') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="{{ url('assets/backend') }}/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- Ekko Lightbox -->
<script src="{{ url('assets/backend') }}/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('assets/backend') }}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('assets/backend') }}/dist/js/demo.js"></script>

<script>
    $('.select2').select2({
        theme: 'bootstrap4'
    });

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true
        });
    });
</script>

@livewireScripts

@stack('custom-scripts')