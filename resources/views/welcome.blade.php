@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="bg py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <!-- Illustration Column -->
                <div class="col-md-5 d-none d-md-block text-center">
                    <img src="{{ asset('images/undraw_watch-application_uw0p.svg') }}" alt="Registration Illustration"
                        class="img-fluid mb-3" style="max-height: 400px;">
                    <h4 class="mt-3 text-primary fw-bold text-center">Welcome to Our Platform</h4>
                    <p class="text-muted fs-6 text-center">Sign up today and explore all the features we offer</p>
                </div>

                <!-- Forms Column -->
                <div class="col-md-6">
                    <div class="card shadow-lg border-0 rounded-lg">

                        <!-- Card Header -->
                        <div class="card-header text-center" style="background-color: #c1dcf9;">
                            <h4 class="mb-0">Welcome</h4>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body p-4" style="background-color: #e6f0fa;">

                            <!-- User Section -->
                            <div class="mb-3 p-3 border-bottom rounded">
                                <p class="px-2 py-1 text-xs text-gray-500 mb-2">User</p>
                                <a href="{{ route('web.login') }}"
                                    class="d-block px-3 py-2 mb-2 rounded hover:bg-[#c1dcf9] hover:text-[#0d6efd]">
                                    Login
                                </a>
                                <a href="{{ route('web.register') }}"
                                    class="d-block px-3 py-2 rounded hover:bg-[#c1dcf9] hover:text-[#0d6efd]">
                                    Register
                                </a>
                            </div>

                            <!-- Admin Section -->
                            <div class="mb-3 p-3 border-bottom rounded">
                                <p class="px-2 py-1 text-xs text-gray-500 mb-2">Admin</p>
                                <a href="{{ route('admin.login') }}"
                                    class="d-block px-3 py-2 mb-2 rounded hover:bg-[#c1dcf9] hover:text-[#0d6efd]">
                                    Login
                                </a>
                                <a href="{{ route('admin.register') }}"
                                    class="d-block px-3 py-2 rounded hover:bg-[#c1dcf9] hover:text-[#0d6efd]">
                                    Register
                                </a>
                            </div>

                            <!-- Seller Section -->
                            <div class="p-3 rounded">
                                <p class="px-2 py-1 text-xs text-gray-500 mb-2">Seller</p>
                                <a href="{{ route('seller.login') }}"
                                    class="d-block px-3 py-2 mb-2 rounded hover:bg-[#c1dcf9] hover:text-[#0d6efd]">
                                    Login
                                </a>
                                <a href="{{ route('seller.register') }}"
                                    class="d-block px-3 py-2 rounded hover:bg-[#c1dcf9] hover:text-[#0d6efd]">
                                    Register
                                </a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
