@extends('layouts.app')

@section('title', 'Forgot Password')

@section('content')
    <div class="bg py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <!-- Illustration Column -->
                <div class="col-md-5 d-none d-md-block text-center">
                    <img src="{{ asset('images/undraw_forgot-password_nttj.svg') }}" alt="Forgot Password Illustration"
                        class="img-fluid mb-4" style="max-height: 400px;">
                    <h4 class="mt-3 text-primary fw-bold">Forgot Your Password?</h4>
                    <p class="text-muted fs-6">Enter your email below and we will send you a reset link.</p>
                </div>

                <!-- Card Column -->
                <div class="col-md-6">
                    <div class="card shadow-lg border-0 rounded-lg">

                        <!-- Card Header -->
                        <div class="card-header text-center" style="background-color: #c1dcf9;">
                            <h4 class="mb-0">Reset Password</h4>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body p-4" style="background-color: #e6f0fa;">

                            <!-- Info Text -->
                            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </div>

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Form -->
                            <form method="POST" action="{{ route('web.password.email') }}" class="p-3">
                                @csrf

                                <!-- Email Address -->
                                <div class="mb-4">
    <!-- Label فوق الحقل -->
    <label for="email" class="form-label text-gray-700 dark:text-gray-200 fw-bold">
        {{ __('Email') }}
    </label>

    <!-- Input الحقل -->
    <input 
        id="email" 
        type="email" 
        name="email" 
        value="{{ old('email') }}" 
        required 
        autofocus
        placeholder="Enter your email"
        class="form-control w-100 rounded-md border border-gray-300 px-3 py-2 mt-1 focus:border-[#0d6efd] focus:ring focus:ring-[#c1dcf9] dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100"
    />

    <!-- Error Message -->
    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-600 dark:text-red-400"/>
</div>


                                <!-- Submit Button -->
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn text-white w-100"
                                        style="background-color: #0d6efd; padding: 10px 20px; border-radius: 8px; transition: background-color 0.3s;">
                                        {{ __('Email Password Reset Link') }}
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
