<script src="{{ url('assets') }}/frontend/libraries/jquery/jquery-3.4.1.min.js"></script>
<script src="{{ url('assets') }}/frontend/libraries/bootstrap/js/bootstrap.min.js"></script>

<script>
    document.querySelectorAll("a[href^='#']").forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth',
                timer: 2500
            });
        });
    });

    $(".nav-link").on("click", function () {
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });
</script>

@stack('custom-script')