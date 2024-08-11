@extends('backend.layouts.master')
@section('reward-active', 'active')

@section('main-content')
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header">Edit Reward</h5>
            <div class="card-body">
                <form method="post" action="{{ route('reward.update', $reward->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="inputName" class="col-form-label">Name <span class="text-danger">*</span></label>
                        <input id="inputName" type="text" name="name" placeholder="Enter name"
                            value="{{ $reward->name }}" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description" name="description">{{ $reward->description }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-form-label">Price <span class="text-danger">*</span></label>
                        <input id="price" type="number" name="price" placeholder="Enter price"
                            value="{{ $reward->price }}" class="form-control">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="stock" class="col-form-label">Stock <span class="text-danger">*</span></label>
                        <input id="stock" type="number" name="stock" placeholder="Enter stock"
                            value="{{ $reward->stock }}" class="form-control">
                        @error('stock')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                            <option value="active" {{ $reward->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $reward->status == 'inactive' ? 'selected' : '' }}>Inactive
                            </option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $('#lfm').filemanager('image');

        $(document).ready(function() {
            $('#description').summernote({
                placeholder: "Write detail Description.....",
                tabsize: 2,
                height: 150
            });
        });
    </script>
@endpush
