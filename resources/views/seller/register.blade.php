@extends('layouts.app')

@section('title', 'Seller Register')

@section('content')
<div class="bg py-5">
  <div class="container">
    <div class="row justify-content-center align-items-center">

      <!-- Illustration Column -->
      <div class="col-md-5 d-none d-md-block">
        <div class="text-center">
          <img src="{{ asset('images/undraw_sign-up_z2ku.svg') }}"
               alt="Registration Illustration" class="img-fluid" style="max-height: 400px;">
          <h4 class="mt-3 text-primary">Join Our Community</h4>
          <p class="text-muted">Create your account and get started today</p>
        </div>
      </div>

      <!-- Form Column -->
      <div class="col-md-6">
        <div class="card shadow-lg border-0">

          <!-- Card Header -->
          <div class="card-header text-center" style="background-color: #c1dcf9;">
            <h4 class="mb-0">Seller Register</h4>
          </div>

          <!-- Card Body -->
          <div class="card-body p-4" style="background-color: #e6f0fa;">
            <form method="POST" action="{{ route('seller.register') }}">
              @csrf

              <!-- Name -->
              <div class="form-group mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input id="name" type="text" 
                       class="form-control @error('name') is-invalid @enderror" 
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Email -->
              <div class="form-group mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Password -->
              <div class="form-group mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                  <input id="password" type="password" 
                         class="form-control @error('password') is-invalid @enderror" 
                         name="password" required autocomplete="new-password">
                  
                </div>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Confirm Password -->
              <div class="form-group mb-4">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <div class="input-group">
                  <input id="password-confirm" type="password" class="form-control" 
                         name="password_confirmation" required autocomplete="new-password">
                  
                </div>
              </div>

              <!-- Register Button -->
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-lg py-2" 
                        style="background-color: #c1dcf9; color: #0d6efd; font-weight: 600;">
                  <i class="fa fa-user-plus me-2"></i> Register
                </button>
              </div>
            </form>

            <!-- Login Link -->
            <div class="text-center mt-3">
              <p class="mb-0">Already have an account? 
                <a href="{{ route('seller.login') }}" 
                   style="color: #0d6efd; font-weight: 500; text-decoration: underline;">
                   Login
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
