@extends('backend.layouts.master')
@section('reward_requests-active', 'active')
@section('main-content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Reward Requests</h6>
            <div>
                <a href="{{ route('rewardRequests.exportPdf') }}" class="btn btn-info btn-sm"><i class="fas fa-download"></i>
                    Export to PDF</a>
                <a href="{{ route('reward_requests.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add
                    Request</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="rewardRequestTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Reward</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rewardRequests as $rewardRequest)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rewardRequest->user->name }}</td>
                                <td>{{ $rewardRequest->reward->name }}</td>
                                <td>{{ $rewardRequest->qty }}</td>
                                <td>{{ ucfirst($rewardRequest->status) }}</td>
                                <td>
                                    @if ($rewardRequest->status == 'pending')
                                        <a href="{{ route('reward_requests.approve', $rewardRequest->id) }}"
                                            class="btn btn-success btn-sm">Approve</a>
                                        <a href="{{ route('reward_requests.decline', $rewardRequest->id) }}"
                                            class="btn btn-danger btn-sm">Decline</a>
                                    @else
                                        <span class="badge badge-info">{{ ucfirst($rewardRequest->status) }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <span style="float:right">{{ $rewardRequests->links() }}</span>
            </div>
        </div>
    </div>
@endsection
