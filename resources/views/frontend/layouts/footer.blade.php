    <!-- Footer Start -->
    <div class="container-fluid copyright py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-justify mb-3 mb-md-0">
                    <a class="border-bottom" href="#">TrashEco</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- jQuery and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css">


    <!-- Template Javascript -->
    <script src="{{ asset('resources/js/main.js') }}"></script>
    <script src="{{ asset('resources/js/produkmain.js') }}"></script>
    <script src="{{ asset('resources/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('resources/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('resources/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('resources/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('resources/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('resources/lib/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('resources/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('resources/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    @stack('scripts')
