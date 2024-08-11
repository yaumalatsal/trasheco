@extends('frontend.layouts.master')
@section('title', 'ECOSTASH - Harga Sampah')
@section('reward-active', 'active')

@section('main-content')
    <style>
        .btn-outline-primary.active {
            color: white !important;
        }
    </style>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Tukarkan Poinmu</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Feature Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-light text-dark">Cara Mudah</span> Menukarkan Sampah Menjadi
                    Poin</h1>
                <p class="mb-5">Ikuti langkah-langkah berikut untuk menukarkan sampah yang Anda kumpulkan menjadi poin
                    yang bisa ditukarkan dengan berbagai hadiah menarik.</p>
            </div>
            <div class="row g-4 align-items-center">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="row g-5">
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-recycle fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Kumpulkan Sampah</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Kumpulkan sampah yang dapat didaur ulang seperti kertas, plastik, dan logam.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-qrcode fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Scan QR Code</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Kunjungi lokasi penukaran sampah, lalu scan QR code di tempat yang tersedia.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-trophy fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Dapatkan Poin</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Setelah sampah diverifikasi, Anda akan menerima poin yang langsung masuk ke akun
                                    Anda.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid animated pulse infinite" src="{{ asset('/img/reward.jpg') }}">
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-gift fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Tukar Poin</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Buka aplikasi Trashcamp, masuk ke bagian reward, dan tukarkan poin Anda dengan hadiah
                                    pilihan.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-users fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Lihat Riwayat</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Anda dapat memantau riwayat penukaran sampah dan poin yang sudah Anda
                                    kumpulkan.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-sign-out-alt fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Logout</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Jangan lupa logout setelah selesai menggunakan aplikasi untuk menjaga keamanan akun
                                    Anda.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Kami Membantu Menjual Sampahmu</p>
                <h1 class="display-5 mb-5">Tukarkan sampahmu dengan hadiah</h1>
            </div>
            <div class="row g-4">
                @foreach ($rewards as $row)
                    <div class="col-xl-3 col-lg-4 col-md-6 productCatGroup cat_{{ $row->cat_id }}">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img src="{{ asset('/logo.png') }}" class="img-fluid zoom w-100" alt="-">
                            </div>
                            <div class="text-center p-4">
                                <h5 class="d-block h5 mb-2">
                                    {{ $row->name }}
                                </h5>
                                <span class="text-primary me-1">{{ Helper::rupiahFormatter($row->price) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
