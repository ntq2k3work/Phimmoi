@extends('layouts.admin.app')
@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-8 col-lg-6 card p-4">
        <h3 class="text-center mb-4">Register</h3>
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email2">Email</label>
                <input type="email" class="form-control" id="email2" name="email" placeholder="Enter Email" />
                @error('email')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                @error('password')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" />
                @error('password_confirmation')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" />
                @error('phone_number')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" />
                @error('name')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" class="form-control" id="birthday" name="birthday" />
                @error('birthday')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" />
                @error('address')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Gender</label><br />
                <div class="d-flex">
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="1" />
                        <label class="form-check-label" for="flexRadioDefault1">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="0" checked />
                        <label class="form-check-label" for="flexRadioDefault2">Female</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="-1"  />
                        <label class="form-check-label" for="flexRadioDefault2">Other</label>
                    </div>
                </div>
                @error('gender')
                    <small class="form-text text-muted text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">Avatar</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="avatar" />
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-success">Create</button>
                <button type="button" class="btn btn-danger">
                    <a class="text-white" href="{{ route('admin.users') }}">Cancel</a>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
