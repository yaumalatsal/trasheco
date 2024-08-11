@extends('user.layouts.master')
@section('title', 'ECOSTASH || REWARD LIST')
@section('reward-active', 'active')

@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('user.layouts.notification')
            </div>
        </div>
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary float-left">Reward Lists</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($rewards && count($rewards) > 0)
                    <table class="table table-bordered" id="reward-dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Point Needed</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($rewards as $reward)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $reward->name }}</td>
                                    <td>{{ $reward->price }}</td>
                                    <td>
                                        @if ($reward->request_status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif ($reward->request_status == 'approve')
                                            <span class="badge badge-success">Approved</span>
                                        @elseif ($reward->request_status == 'decline')
                                            <span class="badge badge-danger">Declined</span>
                                        @else
                                            <a class="btn btn-primary btn-request"
                                                href="{{ route('rewards.request', $reward->id) }}">Request</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span style="float:right">{{ $rewards->links() }}</span>
                @else
                    <h6 class="text-center">No Withdraws found!!! Please create Withdraw</h6>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>


    <!-- Page level custom scripts -->
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
@endpush
