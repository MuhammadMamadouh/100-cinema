<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('public/css/app.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/front.css') }}">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/responsive.css')}}">

</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <form class="form-inline col-md-5">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
            {{--</button>--}}

            <ul class="navbar-nav ">
                @guest
                    <li class="nav-item mr-sm-2">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{url('user/'. Auth::user()->id)}}" class="dropdown-item">profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    <li class="nav-item dropdown">

                    </li>
                @endguest
            </ul>

        </div>
    </nav>
    <div class="row">
        <div class="main-sidebar  col-md-3">
            <img src="{{asset('public/test/images/amanda4.jpg')}}" style="width: 100%">
            <img src="{{asset('public/test/images/amanda5.jpg')}}" style="width: 100%">
        </div>

        <div class="container">
            <main class="py-4 main col-md-10">
                {{--<div class="container">--}}
                @yield('content')

                {{--</div>--}}
            </main>
        </div>

    </div>

</div>
</body>
</html>
