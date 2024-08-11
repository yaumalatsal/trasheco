@extends('backend.layouts.master')

@section('title', 'Create Withdraw')
@section('withdraw-active', 'active')

@section('main-content')
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header">Create Withdraw</h5>
            <div class="card-body">
                <form method="post" action="{{ route('withdraw.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="userId" class="col-form-label">User <span class="text-danger">*</span></label>
                        <select id="userId" name="user_id" class="form-control">
                            <option value="">--Select User--</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="amount" class="col-form-label">Amount <span class="text-danger">*</span></label>
                        <input id="amount" type="number" class="form-control" name="amount"
                            value="{{ old('amount') }}">
                        @error('amount')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#userId').select2({
                    placeholder: '--Select User--',
                    allowClear: true
                });
            });
        </script>
    @endpush
