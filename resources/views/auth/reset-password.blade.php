@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="bg py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <!-- Illustration Column -->
                <div class="col-md-5 d-none d-md-block text-center">
                    <img src="{{ asset('images/undraw_enter-password_1kl4.svg') }}" alt="Reset Password Illustration"
                        class="img-fluid mb-4" style="max-height: 400px;">
                    <h4 class="mt-3 text-primary fw-bold">Reset Your Password</h4>
                    <p class="text-muted fs-6">Enter your new password below to reset it.</p>
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

                            <form method="POST" action="{{ route('web.password.store') }}" class="p-4">
                                @csrf

                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <!-- Email Address -->
                                <div class="mb-3">
                                    <x-input-label for="email" :value="__('Email')" class="form-label" />
                                    <x-text-input id="email"
                                        class="form-control w-100 rounded px-3 py-2 border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                                        type="email" name="email" :value="old('email', $request->email)" required autofocus
                                        autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="text-danger mt-1" />
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <x-input-label for="password" :value="__('Password')" class="form-label" />
                                    <x-text-input id="password"
                                        class="form-control w-100 rounded px-3 py-2 border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                                        type="password" name="password" required autocomplete="new-password" />
                                    <x-input-error :messages="$errors->get('password')" class="text-danger mt-1" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-3">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />
                                    <x-text-input id="password_confirmation"
                                        class="form-control w-100 rounded px-3 py-2 border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"
                                        type="password" name="password_confirmation" required autocomplete="new-password" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mt-1" />
                                </div>

                                <!-- Submit Button -->
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn text-white"
                                        style="background-color: #0d6efd; padding: 10px 20px; border-radius: 8px; transition: background-color 0.3s;">
                                        {{ __('Reset Password') }}
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
