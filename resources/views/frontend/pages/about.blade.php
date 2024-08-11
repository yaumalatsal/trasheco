@extends('frontend.layouts.master')
@section('title', 'TrashECO - Tentang Kami')
@section('about-active', 'active')

@section('main-content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Tukarkan Poinmu</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Feature Start -->
    <div class="container-fluid feature bg-light pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 pt-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Tentang Kami</h4>
                <h1 class="display-4 mb-4">Trasheco: Solusi Cerdas untuk Pengelolaan Sampah di Kampus</h1>
                <p class="mb-0">Trasheco hadir sebagai bank sampah berbasis kampus yang mempermudah mahasiswa dan staf
                    untuk menukarkan sampah menjadi poin yang dapat ditukar dengan berbagai hadiah menarik. Mari bergabung
                    dalam gerakan hijau ini dan jadikan kampus kita lebih bersih dan ramah lingkungan.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-recycle fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Layanan Semi Digital</h4>
                        <p class="mb-4">Trasheco memungkinkan Anda untuk mengelola sampah dengan mudah dan efisien melalui
                            platform digital.</p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-trophy fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Hadiah Menarik</h4>
                        <p class="mb-4">Tukar poin yang Anda kumpulkan dari sampah dengan hadiah eksklusif dan berbagai
                            insentif lainnya.</p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-leaf fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Dukungan Lingkungan</h4>
                        <p class="mb-4">Dengan berpartisipasi di Trasheco, Anda turut serta dalam menjaga kelestarian
                            lingkungan kampus.</p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="feature-item p-4 pt-0">
                        <div class="feature-icon p-4 mb-4">
                            <i class="fa fa-users fa-3x"></i>
                        </div>
                        <h4 class="mb-4">Komunitas Peduli</h4>
                        <p class="mb-4">Bergabunglah dengan komunitas peduli lingkungan di kampus yang aktif menggalakkan
                            pengelolaan sampah berkelanjutan.</p>
                        <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Pelajari Lebih Lanjut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Feature Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="text-primary mb-3"><span class="fw-light text-dark">Kenalan dengan</span> TrashEco</h1>
                <p class="mb-5">TrashEco adalah solusi inovatif untuk pengelolaan sampah di lingkungan kampus. Kami
                    membantu mahasiswa dan staf kampus untuk mengubah sampah menjadi sesuatu yang lebih berharga, sambil
                    mendukung keberlanjutan dan kebersihan kampus. Dengan menggunakan platform digital kami, mengelola
                    sampah menjadi lebih mudah dan menguntungkan.</p>
            </div>
            <div class="row g-4 align-items-center">
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                    <div class="row g-5">
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-recycle fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Peduli Lingkungan</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Kami berkomitmen untuk menjaga kebersihan kampus dan mengurangi jejak karbon dengan
                                    pengelolaan sampah yang efektif.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-leaf fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Berbasis Teknologi</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Platform digital kami memudahkan pengguna untuk mengelola sampah mereka, menukarnya
                                    dengan poin, dan mendapatkan hadiah.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-gift fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Reward Menarik</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Pengguna bisa menukarkan poin hasil pengelolaan sampah dengan berbagai hadiah menarik
                                    melalui aplikasi kami.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid animated pulse infinite" src="{{ asset('logo.png') }}">
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-handshake fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Kolaborasi</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Kami bekerja sama dengan berbagai pihak untuk mewujudkan lingkungan kampus yang lebih
                                    hijau dan bersih.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-users fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Dukungan Komunitas</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>TrashEco didukung oleh komunitas yang peduli dengan lingkungan dan siap membuat
                                    perubahan positif.</span>
                            </div>
                        </div>
                        <div class="col-12 d-flex">
                            <div class="btn-square rounded-circle border flex-shrink-0" style="width: 80px; height: 80px;">
                                <i class="fa fa-award fa-2x text-primary"></i>
                            </div>
                            <div class="ps-3">
                                <h5>Kualitas Terbaik</h5>
                                <hr class="w-25 bg-primary my-2">
                                <span>Kami memberikan layanan dengan standar kualitas terbaik untuk memastikan kepuasan
                                    pengguna.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->

    <!-- Team Start -->
    <div class="container-fluid team py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Team</h4>
                <h1 class="display-4 mb-4">Meet Our Expert Team Members</h1>
                <p class="mb-0">Tim Trasheco terdiri dari sekelompok individu yang berdedikasi dan berpengalaman dalam
                    bidang lingkungan, teknologi, dan manajemen. Dengan latar belakang yang beragam namun saling melengkapi,
                    kami berkomitmen untuk menghadirkan solusi inovatif dalam pengelolaan sampah di kampus. Tim kami
                    berfokus pada pengembangan platform digital yang memudahkan mahasiswa dan staf dalam mengelola sampah
                    secara efektif, sambil terus mengedepankan nilai-nilai keberlanjutan dan tanggung jawab sosial. Bersama,
                    kami siap membawa perubahan positif menuju kampus yang lebih bersih dan hijau.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('img/team-1.jpg') }}" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">Thirafi Ilmam</h4>
                            <p class="mb-0">Hustler</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('img/team-2.jpg') }}" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">Rivan Adi Kurniawan</h4>
                            <p class="mb-0">Hacker</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('img/team-3.jpg') }}" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">Mohamad Dzaki Yaumal Atsal</h4>
                            <p class="mb-0">Hacker</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="team-item">
                        <div class="team-img">
                            <img src="{{ asset('img/team-4.jpg') }}" class="img-fluid rounded-top w-100" alt="">
                            <div class="team-icon">
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-2" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-primary btn-sm-square rounded-pill mb-0" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="team-title p-4">
                            <h4 class="mb-0">Sinta Anduanifa Rosada</h4>
                            <p class="mb-0">Hipster</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


@endsection
