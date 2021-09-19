@extends('layouts.auth.template')

@section('title')
Register
@endsection

@section('content')
<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Nick Name</label>
        <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control @if ($errors->has('name'))
            is-invalid
        @endif">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="text" value="{{ old('email') }}" name="email" id="email" class="form-control @if ($errors->has('email'))
            is-invalid
        @endif">
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password"
            class="form-control @if ($errors->has('password')) is-invalid @endif">
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
            class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif">
        @error('password_confirmation')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-login btn-block">
        Sign Up
    </button>
    <p class="text-center mt-4">
        <a href="{{ url('login') }}">Already Have account?</a>
    </p>
</form>
@endsection