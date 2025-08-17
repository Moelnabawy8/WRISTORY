@php
    $guard = null;
    $user = null;

    if (Auth::guard('admin')->check()) {
        $guard = 'admin';
        $user = Auth::guard('admin')->user();
    } elseif (Auth::guard('seller')->check()) {
        $guard = 'seller';
        $user = Auth::guard('seller')->user();
    } elseif (Auth::guard('web')->check()) {
        $guard = 'web';
        $user = Auth::guard('web')->user();
    }
@endphp
<div class="hero_area">
    <!-- header -->
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span>WRISTORY</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route("home") }}">Home <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('watches.index') }}">Our Watches</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact us</a>
                            </li>
                             @if(!$guard)
                    <!-- Guest -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('web.login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('web.register') }}">Register</a></li>
                @else
                                <!-- Dropdown User Menu -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $user->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                        <a class="dropdown-item"href="{{ route($guard.'.profile.edit') }}">
                                            {{ __('Profile') }}
                                        </a>
                                        <form method="POST"  action="{{ route($guard.'.logout') }}" class="m-0">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>
                                </li>

                                <!-- Cart Link -->
                                <li class="nav-item ms-3">
                                    <a href="{{ route('cart.index') }}" class="btn btn-outline-primary">
                                        🛒 السلة
                                        <span class="badge bg-danger">
                                            {{ \App\Models\Cart::where('user_id', auth()->id())->count() }}
                                        </span>
                                    </a>
                                </li>
                            @endif
                        </ul>

                    </div>
                </div>
            </nav>
        </div>
    </header>
