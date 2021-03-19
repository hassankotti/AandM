<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') . '- Home' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <a class="navbar-brand" href="#">A&M Store</a>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Left Side Of Navbar -->
                <ul class="mr-auto navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categoreis
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @forelse($categoreis as $category)
                                <form method="get" action="{{ route('home') }}">
                                    <input type='hidden' value='{{ $category->id }}' name='category_id'>
                                    <input type="submit" class="dropdown-item" value="{{ $category->name }}">
                                </form>
                            @empty
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">No Categories</a>
                            </div>
                        @endforelse
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Profile</a>
                    </li>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    <form class="my-2 form-inline my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="my-2 btn btn-outline-primary my-sm-0" type="submit"><span
                                class="fa fa-search"></span></button>
                    </form>
                    <!-- Authentication Links -->
                    @guest
                        <li class="text-white nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="text-white nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        @if (Route::has('cart.store'))
                            <li class="nav-item">
                                <a href="{{ route('cart') }}" title="Cart" class="text-white nav-link ">
                                    <span class="">{{ __('Cart') }}</span>
                                    <span class="fa fa-shopping-cart ">
                                        <span class="badge badge-primary">{{ $myCartCount }}</span>
                                    </span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="text-white nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="ml-2 mr-2 fa fa-user"></span>{{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    {{ __('Profile') }}
                                </a>

                                <a class="dropdown-item" href="{{ url('/admin') }}">
                                    {{ __('Login AS Admin') }}
                                </a>
                            </div>
                        </li>

                    @endguest
                </ul>
            </div>
    </div>
    </nav>
    <main class="mt-10">
        @yield('content')
    </main>
    @include('layouts.shared.footer')
</body>

</html>
