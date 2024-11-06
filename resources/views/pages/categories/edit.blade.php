@extends('layouts.admin.app')
@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-8 col-lg-6 card p-4">
        <h3 class="text-center mb-4">Update</h3>
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="text2">Name</label>
                <input type="text" class="form-control" id="text2" name="name" value="{{ $category->name }}" />
                @error('name')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-danger">
                    <a class="text-white" href="{{ route('admin.categories') }}">Cancel</a>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
