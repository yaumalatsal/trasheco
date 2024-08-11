@extends('frontend.layouts.master')
@section('title', 'Jemput Sampah')
@section('jemput', 'active')
@section('main-content')
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Layanan Jemput Sampah</h1>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <p class="section-title pr-5">
                        <span class="pr-2">Jemput Sampah by ECOSTASH</span>
                    </p>
                    <h1 class="mb-4">Sekarang Jemput Sampah Jadi Lebih Mudah</h1>
                    <p>Mudahkan aktivitas keseharian mu dengan menggunakan ECOSTASH Jemput Sampah. Rumah nyaman, Sampah
                        Beres!</p>
                    <ul class="list-inline m-0">
                        <li class="py-2">
                            <i class="fa fa-check text-success me-3"></i>Jemput Sampah Langsung Depan Rumahmu
                        </li>
                        <li class="py-2">
                            <i class="fa fa-check text-success me-3"></i>Penjemputan Sampah Menggunakan Truk Sampah
                        </li>
                        <li class="py-2">
                            <i class="fa fa-check text-success me-3"></i>Biaya Penjemputan Murah
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-secondary text-center p-4">
                            <h1 class="text-white m-0">Buat Penjemputan Sampahmu</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form action="{{ route('layanan.pickup.save') }}" method="POST" class="form-horizontal">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 label-control">Nama pengguna</label>
                                        <div class="card-body">
                                            <input type="text" class="form-control" placeholder="Nama Nasabah"
                                                name="nama_nasabah" value="{{ $user->nama_nasabah ?? '' }}" readonly>
                                            <input type="hidden" name="id_pengguna" value="{{ $user->id }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Produk</label>
                                            <select class="form-control" name="id_produk">
                                                @foreach ($produks as $produk)
                                                    <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 label-control">Jumlah Unit</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" placeholder="Jumlah Unit"
                                                    name="jumlah" value="{{ old('jumlah') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 label-control">Alamat Penjemputan</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" placeholder="Alamat"
                                                    name="alamat_samper" value="{{ $user->alamat }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href="{{ route('samper.index') }}" class="btn btn-danger float-right">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
    @include('penggunas.testimoni')
@endsection
