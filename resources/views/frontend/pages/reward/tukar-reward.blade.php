<div class="site-section">
    <div class="container">

        <div class="row mb-5">
            <div class="col-md-9 order-2">

                <div class="row">
                    <div class="col-md-12 mb-5">
                        <div class="float-md-left mb-4">
                            <h2 class="text-black h5">Tukarkan Hadiahmu</h2>
                        </div>
                    </div>

                    @foreach ($rewards as $reward)
                        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                            <div class="block-4 text-center border">
                                <figure class="block-4-image">
                                    <a href="#">
                                        <img src="{{ asset('storage/img/rewards/' . $reward->gambar_reward) }}"
                                            alt="Image placeholder" class="img-fluid">
                                    </a>
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3>{{ $reward->nama_reward }}</h3>
                                    <p class="mb-0">{{ $reward->deskripsi }}</p>
                                    <p class="text-primary font-weight-bold">{{ $reward->point_required }} Poin</p>

                                    @if ($reward->stok > 0)
                                        <a href="{{ route('redeem-reward', $reward->id) }}"
                                            class="btn btn-primary btn-sm">Tukar Sekarang</a>
                                    @else
                                        <button class="btn btn-secondary btn-sm disabled">Habis</button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
