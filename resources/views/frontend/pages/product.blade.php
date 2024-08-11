@extends('frontend.layouts.master')
@section('title', 'ECOSTASH - Harga Sampah')
@section('product-active', 'active')

@section('main-content')
    <style>
        .btn-outline-primary.active {
            color: white !important;
        }
    </style>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Jual Sampahmu</h1>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Kami Membantu Menjual Sampahmu</p>
                <h1 class="display-5 mb-5">Jemput Sampah dan Jadikan Cuan</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="img/service-1.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="img/icon/icon-1.png" alt="Icon">
                            </div>
                            <h4 class="mb-3">Pilah Sampahmu</h4>
                            <p class="mb-4">Pilahlah sampahmu untuk menjadi point yang nantinya akan ditukar menjadi
                                hadiah menarik</p>
                            <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="img/service-2.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="img/icon/icon-2.png" alt="Icon">
                            </div>
                            <h4 class="mb-3">Daur Ulang</h4>
                            <p class="mb-4">Kami akan melakukan daur ulang sampah yang kamu pilah</p>
                            <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="img/service-3.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="img/icon/icon-3.png" alt="Icon">
                            </div>
                            <h4 class="mb-3">Langkah Bumi Hijau</h4>
                            <p class="mb-4">Ini merupakan langkah awal untuk membangun kebiasaan baru, untuk membuat bumi
                                lebih hijau</p>
                            <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                        <h1 class="display-5 mb-3">Jual Sampahmu</h1>
                        <p>Dapatkan Pointnya dan Tukarkan Menjadi Hadiah !</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a id="catBtnall" class="btn btn-outline-primary border-2 active" data-bs-toggle="pill"
                                href="#tab-all" onclick="filter('cat_all')">Semua</a>
                        </li>
                        @foreach ($categories as $key => $cat)
                            <li class="nav-item me-2">
                                <a id="catBtn{{ $key }}" class="btn btn-outline-primary border-2"
                                    data-bs-toggle="pill" href="#tab-{{ $key }}"
                                    onclick="filter('cat_{{ $key }}')">{{ $cat }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>


            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @foreach ($products as $row)
                        <div class="col-xl-3 col-lg-4 col-md-6 productCatGroup cat_{{ $row->cat_id }}">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img src="{{ asset('/logonew.png') }}" class="img-fluid zoom w-100" alt="-">
                                </div>
                                <div class="text-center p-4">
                                    <h5 class="d-block h5 mb-2">
                                        {{ $row->title }}
                                    </h5>
                                    <span class="text-primary me-1">{{ Helper::rupiahFormatter($row->price) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function filter(id) {
            $('.productCatGroup').slideUp(300);

            setTimeout(() => {
                if (id == 'cat_all') {
                    $('.productCatGroup').slideDown(300);
                } else {
                    $(`.${id}`).slideDown(300)
                }
            }, 300);
        }
    </script>

    @include('frontend.pages.testimoni')


@endsection
