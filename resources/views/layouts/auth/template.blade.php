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
    @yield('content')

    <script src="{{ url('assets/frontend') }}/plugins/jquery/jquery-3.4.1.min.js"></script>
    <script src="{{ url('assets/frontend') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>