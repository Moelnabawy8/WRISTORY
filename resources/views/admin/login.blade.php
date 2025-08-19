@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
    <div class="bg py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <!-- Illustration Column -->
                <div class="col-md-5 d-none d-md-block">
                    <div class="text-center">
                        <img src="{{ asset('images/undraw_login_weas.svg') }}" alt="Login Illustration" class="img-fluid"
                            style="max-height: 400px;">
                        <h4 class="mt-3 text-primary">Welcome Back!</h4>
                        <p class="text-muted">Enter your credentials to access your account</p>

                    </div>
                </div>

                <!-- Form Column -->
                <div class="col-md-6">
                    <div class="card shadow-lg border-0 rounded-lg">

                        <!-- Card Header -->
                        <div class="card-header text-center" style="background-color: #c1dcf9;">
                            <h4 class="mb-0">Admin Login</h4>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body p-4" style="background-color: #e6f0fa;">
                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf

                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="form-group mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Login Button -->
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-lg py-2"
                                        style="background-color: #c1dcf9; color: #0d6efd; font-weight: 600;">
                                        Login
                                    </button>
                                </div>
                            </form>

                            <!-- Register Link -->
                            <div class="text-center mt-3">
                                <p class="mb-0">Don't have an account?
                                    <a href="{{ route('admin.register') }}"
                                        style="color: #0d6efd; font-weight: 500; text-decoration: underline;">
                                        Register
                                    </a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
