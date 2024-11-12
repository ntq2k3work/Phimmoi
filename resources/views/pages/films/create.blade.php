@extends('layouts.admin.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-8 col-lg-6 card p-4 shadow-sm">
        <h3 class="text-center mb-4 text-primary">Register Film</h3>

        <form action="{{ route('admin.films.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name" class="font-weight-bold">Film Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter film name" />
                @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- National -->
            <div class="form-group">
                <label for="national" class="font-weight-bold">Nationality</label>
                <input type="text" class="form-control" id="national" name="national" placeholder="Enter nationality" />
                @error('national')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Performer -->
            <div class="form-group">
                <label for="performer" class="font-weight-bold">Performer</label>
                <input type="text" class="form-control" id="performer" name="performer" placeholder="Enter performers" />
                @error('performer')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Director -->
            <div class="form-group">
                <label for="director" class="font-weight-bold">Director</label>
                <input type="text" class="form-control" id="director" name="director" placeholder="Enter director name" />
                @error('director')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Number of Episodes -->
            <div class="form-group">
                <label for="number_episodes" class="font-weight-bold">Number of Episodes</label>
                <input type="number" class="form-control" id="number_episodes" name="number_episodes" placeholder="Enter number of episodes" />
                @error('number_episodes')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Category -->
            <div class="form-group">
                <label for="category_id" class="font-weight-bold">Film Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <!-- Description -->
            <div class="form-group">
                <label for="description" class="font-weight-bold">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter film description"></textarea>
                @error('description')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('admin.films') }}" class="btn btn-danger text-white">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
