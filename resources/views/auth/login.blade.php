@extends('layouts.auth.template')

@section('title')
Login
@endsection

@section('content')
<form action="{{ route('login') }}" method="POST">
    @csrf
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
            class="form-control @if ($errors->has('email')) is-invalid @endif">
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="rememberToken" name="rememberToken">
        <label for="rememberToken" class="form-check-label">Remember Me</label>
    </div>
    <button type="submit" class="btn btn-login btn-block">
        Sign In
    </button>
    <p class="text-center mt-4">
        {{-- <a href="{{  }}">Forgot Password?</a> --}}
        <a href="{{ url('register') }}">Don't have account?</a>
    </p>
</form>
@endsection