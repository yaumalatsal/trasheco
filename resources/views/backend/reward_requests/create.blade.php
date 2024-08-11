@extends('backend.layouts.master')
@section('reward_requests-active', 'active')

@section('main-content')
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header">Add Reward Request</div>
        <div class="card-body">
            <form method="post" action="{{ route('reward_requests.store') }}">
                @csrf
                <div class="form-group">
                    <label for="user_id">User <span class="text-danger">*</span></label>
                    <select name="user_id" id="user_id" class="form-control">
                        <option value="">--Select User--</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="reward_id">Reward <span class="text-danger">*</span></label>
                    <select name="reward_id" id="reward_id" class="form-control">
                        <option value="">--Select Reward--</option>
                        @foreach ($rewards as $reward)
                            <option value="{{ $reward->id }}">{{ $reward->name }}</option>
                        @endforeach
                    </select>
                    @error('reward_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="qty">Quantity <span class="text-danger">*</span></label>
                    <input type="number" name="qty" id="qty" class="form-control" value="{{ old('qty') }}"
                        min="1">
                    @error('qty')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#reward_id').select2({
                placeholder: '--Select Reward--',
                allowClear: true
            });
            $('#user_id').select2({
                placeholder: '--Select User--',
                allowClear: true
            });
        });
    </script>
@endpush
