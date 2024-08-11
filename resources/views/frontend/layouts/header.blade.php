<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TrashECO </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->



    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{ asset('logonew.png') }}" alt="Logo" style="height: 40px; width: auto;">
        </a>

        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0">TrashECO</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">

                <a href="/home" class="nav-item nav-link @yield('home-active')">Home</a>
                <a href="/product" class="nav-item nav-link @yield('product-active')">Katalog Sampah</a>
                <a href="/reward" class="nav-item nav-link @yield('reward-active')">Katalog Hadiah</a>
                <a href="/about" class="nav-item nav-link @yield('about-active')">Tentang Kami</a>
                <a href="/contact" class="nav-item nav-link @yield('contact-active')">Hubungi Kami</a>

            </div>
            <a href="{{ route('admin-profile') }}"
                class=" btn btn-primary py-4 px-lg-4 rounded-0 responsive-login-btn">Akun</a>
            {{-- @auth
                   <!-- User is authenticated -->

               @else
                   <!-- User is not authenticated -->
                   <a href="/login" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Akun<i
                           class="fa fa-arrow-right ms-3"></i></a>
               @endauth
               {{-- <a href="/login" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Akun<i
                       class="fa fa-arrow-right ms-3"></i></a> --}}
        </div>

    </nav>
    <!-- Navbar End -->
