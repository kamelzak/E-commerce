<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title')</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    @yield('extra-scripts')

    <style>
        body {
        background-color: #f0f0f0;
        }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      .badge2 {
            display: inline-block;
            min-width: 16px; /* pixel unit */
            padding: 2px 6px; /* pixel unit */
            border-radius: 50%;
            font-size: 15px;
            text-align: center;
            background: #16ace0;
            color: #fefefe;
        }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/blog.css')}}" rel="stylesheet" />

</head>
<body>
    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <a class="link-secondary" href="{{ route('cart.index') }}">Cart <span class="badge2">{{ Cart::count() }}</span></a>
            </div>
            <div class="col-4 text-center">
                <h5 class="blog-header-logo text-dark">E-Commerce</h5>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="link-secondary" href="#" aria-label="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
                </a>
                <a class="btn btn-sm btn-outline-info" href="#">Sign up</a>
            </div>
            </div>
        </header>

        <div class="blog-header py-2">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link text-dark" href="{{ route('welcome') }}">Home</a>
                        <a class="nav-link text-dark" href="{{ route('products.index') }}">Shop</a>
                        <a class="nav-link text-dark" href="#">Blog</a>
                        <a class="nav-link text-dark" href="#">About us</a>
                    </div>
                </div>
            </nav>
        </div>
 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            
            @yield('content')
            
        </div>

        <footer class="blog-footer" style="background-color: #f0f0f0;">
            <p>E-commerce app built with laravel by <a href="https://github.com/kamelzak">@KamelZak</a>.</p>
        </footer>

    </div>

    @yield('extra-js')

</body>
</html>
