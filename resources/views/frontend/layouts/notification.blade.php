@if (session('success'))
    <div
        class="alert alert-success alert-dismissable fade show text-center d-flex justify-content-center align-items-center">
        <button class="close bg-transparent border-0 fs-5 text-success" data-dismiss="alert" aria-label="Close">×</button>
        {{ session('success') }}
    </div>
@endif


@if (session('error'))
    <div
        class="alert alert-danger alert-dismissable fade show text-center d-flex justify-content-center align-items-center">
        <button class="close bg-transparent border-0 fs-5 text-danger" data-dismiss="alert" aria-label="Close">×</button>
        {{ session('error') }}
    </div>
@endif
