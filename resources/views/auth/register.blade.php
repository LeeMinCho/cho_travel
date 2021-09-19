@extends('layouts.auth.template')

@section('title')
Register
@endsection

@section('content')
<main class="login-container">
    <div class="container">
        <div class="row page-login d-flex align-items-center">
            <div class="section-left col-12 col-md-6">
                <h1 class="mb-4">We explore the new <br> life much better</h1>
                <img src="{{ url('assets/frontend') }}/images/login-left.png" alt="" class="w-75 d-none d-sm-flex">
            </div>
            <div class="section-right col-12 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ url('assets/frontend') }}/images/logo-cho-travel.png" alt="" class="w-50 mb-4">
                        </div>
                        @if (session('type') == 'error')
                        <div class="alert alert-danger" role="alert">
                            {{ session('message') }}
                        </div>
                        @endif
                        <form action="{{ route('register') }}" method="POST">
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
                                <a href="#">Forgot Password?</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection