<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cho Travel</title>

    @include('layouts.frontend.style')
</head>

<body>
    <!-- Navbar -->
    <div class="container-fluid">
        <nav class="row navbar fixed-top navbar-expand-lg navbar-light bg-white">
            <a href="#" class="navbar-brand">
                <img class="ml-3" src="{{ url('assets') }}/frontend/images/logo-cho-travel.png" alt="Logo NOMADS">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navb">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2"><a href="#header" class="nav-link active">Home</a></li>
                    <li class="nav-item mx-md-2"><a href="#popular" class="nav-link">Paket Travel</a></li>
                    <li class="nav-item mx-md-2"><a href="#testimonial-title" class="nav-link">Testimonial</a></li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                            <i class="fas fa-user"></i> LeeMinCho
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropdown-item text-center">
                                <img src="frontend/images/Testimonial-1.png" class="img rounded" width="35px">
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">My Transaction</a>
                        </div>
                    </li>
                </ul>
                <!-- Mobile Button -->
                <form method="GET" action="{{ url('login') }}" class="form-inline d-sm-block d-md-none">
                    <button type="submit" class="btn btn-login my-2 my-sm-0">Masuk</button>
                </form>
                <!-- Desktop Button -->
                <form method="GET" action="{{ url('login') }}" class="form-inline my-2 my-lg-0 d-none d-md-block mr-3">
                    <button type="submit" class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">Masuk</button>
                </form>
            </div>
        </nav>
    </div>

    @yield('content')

    <!-- Footer -->
    <footer class="section-footer mt-5 border-top">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <h5 class="text-center">FOLLOW US</h5>
                    <div class="row mt-3">
                        <div class="col-lg-12 text-center">
                            <a href="#">
                                <i class="fab fa-2x fa-facebook-f"></i>
                            </a> &emsp;
                            <a href="#">
                                <i class="fab fa-2x fa-instagram"></i>
                            </a> &emsp;
                            <a href="#">
                                <i class="fab fa-2x fa-twitter"></i>
                            </a> &emsp;
                            <a href="#">
                                <i class="fab fa-2x fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <h5><i class="fas fa-phone"></i> CONTACT US</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Surakarta, Indonesia</a></li>
                        <li><a href="#">0821-222-1123</a></li>
                        <li><a href="#">support@chotravel.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="copyright">
            <div class="row border-top justify-content-center align-items-center pt-4 pb-4">
                <div class="col-sm-12 text-gray-500 font-weight-light text-center">
                    2019 Copyright Cho Travel - All Right Reserved - Made in Surakarta
                </div>
            </div>
        </div>
    </footer>

    @include('layouts.frontend.script')
</body>

</html>