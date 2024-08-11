@extends('backend.layouts.master')
@section('faculty-active', 'active')

@section('main-content')
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header">Edit Faculty</h5>
            <div class="card-body">
                <form method="post" action="{{ route('faculty.update', $faculty->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="inputName" class="col-form-label">Name <span class="text-danger">*</span></label>
                        <input id="inputName" type="text" name="name" placeholder="Enter name"
                            value="{{ $faculty->name }}" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control">
                            <option value="active" {{ $faculty->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $faculty->status == 'inactive' ? 'selected' : '' }}>Inactive
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
    @endsection
