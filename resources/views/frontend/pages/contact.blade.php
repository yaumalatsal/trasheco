@extends('frontend.layouts.master')
@section('title', 'TrashECO - Hubungi Kami')
@section('contact-active', 'active')

@section('main-content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/contact-bread.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="fas fa-phone"></span>
                        <h4>Phone</h4>
                        <p>08135555555</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="fas fa-map"></span>
                        <h4>Address</h4>
                        <p>Jl. Veteran No. 10</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="fas fa-clock"></span>
                        <h4>Open time</h4>
                        <p>10:00 am to 23:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="fas fa-envelope"></span>
                        <h4>Email</h4>
                        <p>Trasheco123@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map" style="width: 100%; max-width: 2000px; height: 400px; position: relative;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15805.485021750403!2d112.6175338!3d-7.9605309!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788281bdd08839%3A0xc915f268bffa831f!2sUniversitas%20Negeri%20Malang!5e0!3m2!1sid!2sid!4v1701224971512!5m2!1sid!2sid"
            style="border:0; width: 100%; height: 100%;" allowfullscreen="" loading="lazy" aria-hidden="false"
            tabindex="0"></iframe>
        <div class="map-inside" style="position: absolute; top: 20px; left: 20px;">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                {{-- <h4>Malang</h4>
                <ul>
                    <li>Phone: 08135555555</li>
                    <li>Add: Jl. Veteran No. 10</li>
                </ul> --}}
            </div>
        </div>
    </div>

    <!-- Map End -->
@endsection
