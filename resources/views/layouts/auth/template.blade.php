<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cho Travel | @yield('title')</title>
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/plugins/xzoom/xzoom.css">
    <link href="{{ url('assets/frontend') }}/fonts/Assistant/Assistant-Regular.ttf">
    <link href="{{ url('assets/frontend') }}/fonts/Playfair_Display/static/PlayfairDisplay-Regular.ttf">
    <link rel="stylesheet" href="{{ url('assets/frontend') }}/styles/main.css">
</head>

<body>
    <main class="login-container">
        <div class="container">
            <div class="row page-login d-flex align-items-center">
                <div class="section-left col-12 col-md-6">
                    <h1 class="mb-4">We explore the new <br> life much better</h1>
                    <img src="{{ url('assets/frontend') }}/images/login-left.png" alt="" class="w-75 d-none d-sm-flex">
                </div>
                <div class="section-right col-12 col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <a href="{{ url('/') }}">
                                    <img src="{{ url('assets/frontend') }}/images/logo-cho-travel.png" alt=""
                                        class="w-50 mb-4">
                                </a>
                            </div>
                            @if (session('type') == 'error')
                            <div class="alert alert-danger" role="alert">
                                {{ session('message') }}
                            </div>
                            @elseif (session('type') == 'success')
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                            @endif

                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ url('assets/frontend') }}/plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="{{ url('assets/frontend') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>