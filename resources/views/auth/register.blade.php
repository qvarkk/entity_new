@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <form method="post" action="{{ route('auth.create') }}">
        @csrf
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" name="name" class="form-control" id="inputName"
                   placeholder="Enter full name" value="{{ old('name') }}">
            @error('name')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input type="email" name="email" class="form-control" id="inputEmail"
                   placeholder="Enter email" value="{{ old('email') }}">
            @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
            @error('password')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="inputPasswordConfirmation">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="form-control" id="inputPasswordConfirmation" placeholder="Confirm Password">
            @error('password_confirmation')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        @error('error')
            <span class="form-text text-danger mb-3">{{ $message }}</span>
        @enderror
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
@endsection
