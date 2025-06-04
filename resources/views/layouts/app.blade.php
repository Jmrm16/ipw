<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Aseguradora-IPW')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap 5 CSS ✅ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- OwlCarousel CSS -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @yield('styles')
</head>

<body>

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Main content --}}
    @yield('content')

    {{-- Footer --}}
    @include('partials.footer')

    <!-- Scripts -->

    <!-- jQuery ✅ (solo una vez) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- OwlCarousel -->
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Otros plugins -->
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>

    <!-- Bootstrap Bundle JS ✅ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.marquee.min.js') }}"></script>
    <script src="{{ asset('js/form-validations.js') }}"></script>

    @yield('scripts')
</body>
</html>
