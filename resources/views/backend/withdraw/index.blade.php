@extends('backend.layouts.master')
@section('withdraw-active', 'active')
@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary float-left">Withdraw Lists</h6>
            <a href="{{ route('withdraw.create') }}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
                data-placement="bottom" title="Create Withdraw"><i class="fas fa-plus"></i> Create Withdraw</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($withdraws && count($withdraws) > 0)
                    <table class="table table-bordered" id="withdraw-dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($withdraws as $withdraw)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $withdraw->user->name }}</td>
                                    <td>{{ Helper::rupiahFormatter($withdraw->amount) }}</td>
                                    <td>
                                        @if ($withdraw->status == 'submit')
                                            <span class="badge badge-success">Submit</span>
                                        @else
                                            <span class="badge badge-warning">Cancel</span>
                                        @endif
                                    </td>
                                    <td>{{ $withdraw->created_at }}</td>
                                    <td>
                                        @if ($withdraw->status == 'submit')
                                            <form method="POST" action="{{ route('withdraw.cancel', [$withdraw->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm dltBtn" data-id={{ $withdraw->id }}
                                                    style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip"
                                                    data-placement="bottom" title="Cancel"><i
                                                        class="fas fa-times"></i></button>
                                            </form>
                                        @else
                                            <span class="badge badge-warning">No Action</span>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <span style="float:right">{{ $withdraws->links() }}</span>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('backend/js/demo/datatables-demo.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#withdraw-dataTable').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": [4, 5]
                }]
            });

            // Sweet alert for delete confirmation
            $('.dltBtn').click(function(e) {
                e.preventDefault();
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
                swal({
                    title: "Are you sure?",
                    text: "Once canceled, this action cannot be undone!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    } else {
                        swal("Your withdraw is safe!", {
                            icon: "info",
                        });
                    }
                });
            });
        });
    </script>
@endpush
