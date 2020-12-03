@extends('frontend.App.app')
@section('title')
    Admin Login
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-{{ session('type') }}">{{ session('message') }}</div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3>Register From <small>Admin</small></h3>
        </div>
        <div class="card-body">
            <form action="{{ route('user.store.register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter Name">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter E-mail address">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter password">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="confirm-password">Password</label>
                    <input type="password" id="confirm-password" name="ConfirmPassword" class="form-control" value="{{ old('ConfirmPassword') }}" placeholder="Enter Confirm password">
                </div>
                <div class="custom-file col-sm-4 mb-3">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="image">Profile Image</label>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Register">
                </div>
            </form>
        </div>
    </div>
@endsection
