@extends('frontend.layouts.master')

@section('main-content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 pb-5">
                <!-- Account Sidebar-->
                <div class="author-card pb-3">
                    <div class="author-card-cover"
                        style="background-image: url(https://bootdey.com/img/Content/flores-amarillas-wallpaper.jpeg);"><a
                            class="btn btn-style-1 btn-white btn-sm" href="#" data-toggle="tooltip" title=""
                            data-original-title="You currently have 290 Reward points to spend"><i
                                class="fa fa-award text-md"></i>&nbsp;290 points</a></div>
                    <div class="author-card-profile">
                        <div class="author-card-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                alt="Daniel Adams">
                        </div>
                        <div class="author-card-details">
                            <h5 class="author-card-name text-lg">{{ $pengguna->nama_nasabah }}</h5><span
                                class="author-card-position">
                                Joined {{ $pengguna->created_at }}</span>
                        </div>
                    </div>
                </div>
                <div class="wizard">
                    <nav class="list-group list-group-flush">
                        <a class="list-group-item" href="{{ route('user.riwayat') }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="fe-icon-shopping-bag me-1 text-muted" href="/riwayat"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Riwayat</div>
                                </div><span class="badge badge-secondary">6</span>
                            </div>
                        </a>
                        <a class="list-group-item active" href="">
                            <i class="fe-icon-user text-muted"></i>
                            Profile Settings</a><a class="list-group-item" href="#"><i
                                class="fe-icon-map-pin text-muted"></i></a>
                    </nav>
                </div>
            </div>
            <!-- Profile Settings-->
            <div class="col-lg-8 pb-5">
                @if ($pengguna)
                    <form class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account-fn">Nama Nasabah</label>
                                <input class="form-control" type="text" name="nama_nasabah" id="account-fn"
                                    value="{{ $pengguna->nama_nasabah }}" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account-email">E-mail</label>
                                <input class="form-control" type="email" name="email" id="account-email"
                                    value="{{ $pengguna->email }}" disabled="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account-phone">Nomor Telepon</label>
                                <input class="form-control" type="text" name="nomor_telepon" id="account-phone"
                                    value="{{ $pengguna->nomor_telepon }}" required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account-pass">Jenis Kelamin</label>
                                <input class="form-control" type="text" name="jenis_kelamin" id="account-pass"
                                    value="{{ $pengguna->jenis_kelamin }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account-confirm-pass">Alamat</label>
                                <input class="form-control" type="text" name="alamat" id="account-confirm-pass"
                                    value="{{ $pengguna->alamat }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <hr class="mt-2 mb-3">
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="custom-control custom-checkbox d-block">
                                    <input class="custom-control-input" type="checkbox" id="subscribe_me" checked="">
                                    <label class="custom-control-label" for="subscribe_me">Subscribe me to
                                        Newsletter</label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('user.logout') }}" method="post">
                        @csrf
                        <button class="btn btn-style-1 btn-primary" type="submit">
                            Logout
                        </button>
                    </form>
                @else
                    <p>User not found.</p>
                @endif
            </div>
        </div>
    </div>
    {{-- @include('user.reward') --}}
@endsection
