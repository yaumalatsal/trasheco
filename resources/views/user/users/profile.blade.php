@extends('user.layouts.master')

@section('title', 'Admin Profile')

@section('main-content')

    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class=" font-weight-bold">Profile</h4>
            <ul class="breadcrumbs">
                <li><a href="{{ route('admin') }}" style="color:#999">Dashboard</a></li>
                <li><a href="" class="active text-primary">Profile Page</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col"></div>
                <div class="col-12 col-md-10 col-lg-7 col-xl-5">
                    <div class="card">
                        <div class="image">
                        </div>
                        <div class="card-body ms-2 pt-0 d-flex flex-column justify-content-center align-items-center">
                            <img class="card-img-top img-fluid roundend-circle "
                                style="border-radius:50%;height:80px;width:80px;margin:auto;position: absolute;margin-top: -150px;"
                                src="{{ asset('logo.png') }}" alt="profile picture">
                            <h5 class="card-title text-left mt-5"><small><i class="fas fa-user"></i>
                                    {{ $profile->name }}</small>
                            </h5>
                            <p class="card-text text-left"><small><i class="fas fa-envelope"></i>
                                    {{ $profile->email }}</small></p>
                            <p class="card-text text-left"><small class="text-muted"><i class="fas fa-hammer"></i>
                                    {{ $profile->role }}</small></p>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>

@endsection

<style>
    .breadcrumbs {
        list-style: none;
    }

    .breadcrumbs li {
        float: left;
        margin-right: 10px;
    }

    .breadcrumbs li a:hover {
        text-decoration: none;
    }

    .breadcrumbs li .active {
        color: red;
    }

    .breadcrumbs li+li:before {
        content: "/\00a0";
    }

    .image {
        background: url('{{ asset('logo.png') }}');
        height: 150px;
        background-position: center;
        background-attachment: cover;
        position: relative;
    }

    .image img {
        position: absolute;
        top: 55%;
        left: 35%;
        margin-top: 30%;
    }

    i {
        font-size: 14px;
        padding-right: 8px;
    }
</style>

@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@endpush
