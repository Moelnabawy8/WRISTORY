@extends('layouts.app')

@section('title', 'Verify Email')

@section('content')
<div class="bg py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center">

            <!-- Illustration Column -->
            <div class="col-md-5 d-none d-md-block text-center">
                <img src="{{ asset('images/undraw_email_verification.svg') }}" 
                     alt="Email Verification Illustration" 
                     class="img-fluid mb-4" 
                     style="max-height: 400px;">
                <h4 class="mt-3 text-primary fw-bold">Verify Your Email</h4>
                <p class="text-muted fs-6">Please check your inbox and click the verification link we just sent.</p>
            </div>

            <!-- Card Column -->
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-lg">

                    <!-- Card Header -->
                    <div class="card-header text-center" style="background-color: #c1dcf9;">
                        <h4 class="mb-0">Email Verification</h4>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4" style="background-color: #e6f0fa;">

                        <!-- Message -->
                        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif

                        <!-- Actions -->
                        <div class="mt-4 d-flex flex-column flex-sm-row justify-content-center gap-2">
                            <!-- Resend Verification Email -->
                            <form method="POST" action="{{ route('seller.verification.send') }}" class="w-100 w-sm-auto">
                                @csrf
                                <x-primary-button class="w-100 w-sm-auto">
                                    {{ __('Resend Verification Email') }}
                                </x-primary-button>
                            </form>

                            <!-- Log Out -->
                            <form method="POST" action="{{ route('seller.logout') }}" class="w-100 w-sm-auto mt-2 mt-sm-0">
                                @csrf
                                <button type="submit" 
                                        class="btn btn-link text-decoration-underline text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md w-100 w-sm-auto">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
