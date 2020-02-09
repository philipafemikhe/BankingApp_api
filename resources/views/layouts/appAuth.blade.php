<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kaiglo Ng</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/kaigloCustom.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel kaigloNav" style="padding-top: 0px; padding-bottom: 0px; padding-right: 0px">
            <div class="container" style="padding: 0px; margin: 0px">
                <span style="font-size: 10px">
                    <a class="navbar-brand" href="{{ url('/') }}">
                       <img src="{{asset('/resources/muli-logo-white.png')}}">
                    </a>
                </span>

                <div class="authLinkBar">
                   <a href="{{url('/home')}}" class="authLink">Upload Product</a>
                   <a href="{{url('/store')}}" class="authLink">Store</a>

                   <a class="authLink" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                   <a href="{{url('cart/view')}}" class="authLink" style="padding-right: 0px"><img src="{{asset('/resources/shopping-cart.png')}}"></a>
                   <?php
                    $catElementCount = App\Cart::where('user_id', Auth::id())->where('status','unpaid')->count();
                    // $catElementCount = App\User::where('id', Auth::id())->count();
                   ?>
                   <sup id="cartCount" style="color: #ff644c; font-weight: bold;">{{ $catElementCount }}</sup>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
     <div class="col-md-12" style="font-size:12px; margin-top:4em; color:#5b5b5b">
        <center><p>&copy; Copyright protect 2019 .. This file cannot be shared....Design by @Philip Afemikhe</p></center>
    </div>
</body>
</html>
