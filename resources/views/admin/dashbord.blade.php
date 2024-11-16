<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/ignorbs.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>
<body>
    
    
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="toggle-btn">
            <i class="fas fa-bars"></i>
            <span class="links-text logo"> ClickCart</span>
        </div>
        <div class="sidebar-body">
            <a href="{{ route('products.index') }}"><span class="i-container"><i class="fas fa-home"></i></span> <span class="links-text"> Home</span></a>
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown"><span class="i-container"><i class="fas fa-box"></i></span> <span class="links-text"> Products</span></a>
            <ul class=" dropdown-menu dropdown-menu-show">
                <li><a class="dropdown-item" href="{{ route('adminproducts.index') }}">All products</a></li>
                @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{ route('adminproducts.by.category', $category->id) }}">{{ $category->category_name }} products</a></li>
                @endforeach
            </ul>
        
            <a href="{{ route('categories.index') }}"><span class="i-container"><i class="fas fa-tags"></i></span> <span class="links-text"> Categories</span></a>
        
            <a href="{{ route('about.index') }}"><span class="i-container"><i class="fas fa-info-circle"></i></span> <span class="links-text"> About</span></a>
            {{-- <a href="#contact"><span class="i-container"><i class="fas fa-phone-alt"></i></span> <span class="links-text"> Contact</span></a> --}}
        </div>
        <div class="sidebar-footer">
            <a href="{{ route('profile.index', Auth::user()->username) }}"><span class="i-container"><i class="fas fa-user"></i></span> <span class="links-text"> Profile</span></a>
            <form class="d-flex" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="side-btn">
                    <span class="i-container"><i class="fas fa-sign-out-alt"></i></span> <span class="links-text"> Logout</span>
                </button>
            </form>
            {{-- <a href="{{ route('logout') }}"><span class="i-container"><i class="fas fa-sign-out-alt"></i></span> <span class="links-text"> Logout</span></a> --}}
        </div>
    </div>
    
    <section class="dash-body position-relative">
        @yield('categories')
        @yield('create-category')
        @yield('edit-category')
        @yield('products')
        @yield('create-product')
        @yield('edit-product')
        @yield('show-product')
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src={{ asset('js/sidebar.js') }}></script>
</body>
</html>