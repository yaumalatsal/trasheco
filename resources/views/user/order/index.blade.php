@extends('user.layouts.master')
@section('title', 'ECOSTASH || ORDER LIST')
@section('order-active', 'active')
@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('user.layouts.notification')
            </div>
        </div>
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary float-left">Order Lists</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (count($orders) > 0)
                    <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Order No.</th>
                                <th>Name</th>
                                <th>Total Amount</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $no = 1;
                            @endphp
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->user->name }} </td>
                                    <td>{{ Helper::rupiahFormatter($order->total_amount, 2) }}</td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span style="float:right">{{ $orders->links() }}</span>
                @else
                    <h6 class="text-center">No orders found!!! Please order some products</h6>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
    <script>
        $('#order-dataTable').DataTable();
    </script>
@endpush
