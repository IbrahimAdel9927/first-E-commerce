<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ignorbs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
</head>
<body id="home-body">
    <nav class="navbar bg-dark border-bottom border-body navbar-expand-lg bg-body-tertiary mb-5" data-bs-theme="dark">
    <div class="container-fluid">
        @if (Auth::check() && Auth::user()->role == 'admin')
            <a class="navbar-brand me-4" href="{{ route('adminproducts.index') }}">ClickCart</a>
        @else
            <a class="navbar-brand me-4" href="{{ route('products.index') }}">ClickCart</a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link me-1" href="{{ route('products.index') }}"><i class="fas fa-home me-1"></i>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link me-1" href="{{ route('about.index') }}"><i class="fas fa-info-circle me-1"></i>About</a>
                </li>
            <li class="nav-item">
            <a class="nav-link me-1" href="{{ route('products.index') }}"><i class="fas fa-box me-1"></i>Products</a>
            </li>
            <li class="nav-item dropdown me-1">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-tags me-1"></i>Categories
                </a>
                <ul class="dropdown-menu">
                    @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{ route('products.by.category', $category->id) }}">{{ $category->category_name }}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
        @if (Auth()->user())
            <form class="d-flex" method="POST" action="{{ route('logout') }}">
                @csrf
                <input type="submit" class="btn btn-outline-light me-1 btn-margin-bottom" value="Logout"></input>
            </form>
        @else
            <a href="{{ route('login.index') }}" class="btn btn-outline-light me-1 btn-margin-bottom">Login</a>
        @endif
        <form class="d-flex" method="GET" role="search" action="{{ route('products.search') }}">
            @csrf
            <input class="form-control me-1 search-width" type="search" placeholder="Search Products" aria-label="Search" name="q">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
        @if (Auth()->user())
            <a href="{{ route('profile.index', Auth::user()->username) }}" class="btn btn-outline-light btn-margin-left"><i class="fas fa-user me-1"></i>profile</a>
        @endif
        </div>
    </div>
    </nav>
    <section class="home-body">
        @yield('user-products')
        @yield('product-details')
        @yield('about')
        @yield('profile')
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>