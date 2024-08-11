@extends('frontend.layouts.master')

@section('main-content')
    <div class="container mb-4 main-container">
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
                            <h5 class="author-card-name text-lg">Daniel Adams</h5><span class="author-card-position">Joined
                                February 06, 2017</span>
                        </div>
                    </div>
                </div>
                <div class="wizard">
                    <nav class="list-group list-group-flush">
                        <a class="list-group-item active" href="#">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="fa fa-shopping-bag me-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Riwayat</div>
                                </div><span class="badge badge-secondary">6</span>
                            </div>
                        </a>
                        <a class="list-group-item" href="{{ route('user.profile') }}" target="__blank">
                            <i class="fa fa-user text-muted"></i>
                            Profile Settings
                        </a>
                    </nav>
                </div>
            </div>


            <!-- Orders Table-->
            <div class="col-lg-8 pb-5">
                <div class="d-flex justify-content-end pb-3">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Jenis Sampah</th>
                                    <th>Sampah</th>
                                    <th>Berat(Kg)</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Penjemputan</th>
                                    {{-- <th>Points</th>
                                    <th>Foto Bukti</th>
                                    <th>Status</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jemputSampah as $row)
                                    <tr>
                                        <td>{{ $row->produk->nama }}</td>
                                        <td>{{ $row->jumlah }}</td>
                                        <td>Rp. {{ $row->total_harga }}</td>
                                        <td>{{ $row->alamat_samper }}</td>
                                        <td>{{ $row->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
