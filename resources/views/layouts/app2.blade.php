<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="img/fav-icon.png" type="image/x-icon"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ config('app.name', '100 Cinema') }}</title>

    <!-- Icon css link -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Font Awesome -->
    {{--<link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">--}}
    <!-- Styles -->

    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700'>
    <!--[if lt IE 9]>
    <!--<script src="js/html5shiv.min.js"></script>-->
    <!--<script src="js/respond.min.js"></script>-->
    <!--[endif]-->

    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/newstyle.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('public/css/default_theme.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/hover.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css.css') }}">
</head>

<body data-spy="scroll" data-target="#bs-example-navbar-collapse-1" data-offset="80"
      data-scroll-animation="true">
{{--<div id="main-header">--}}
    {{--<nav class="navbar navbar-dark bg-dark">--}}
        {{--<div class="container">--}}
            {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                {{--{{ config('app.name', 'Laravel') }}--}}
            {{--</a>--}}
            {{--<form class="form-inline col-md-5">--}}
                {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
                {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
            {{--</form>--}}
            {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
            {{--<span class="navbar-toggler-icon"></span>--}}
            {{--</button>--}}

            {{--<ul class="navbar-nav ">--}}
                {{--@guest--}}
                    {{--<li class="nav-item mr-sm-2">--}}
                        {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                    {{--</li>--}}
                {{--@else--}}
                    {{--<li class="nav-item dropdown">--}}
                        {{--<a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button"--}}
                           {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                            {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                        {{--</a>--}}

                        {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                            {{--<a href="{{url('user/'. Auth::user()->id)}}" class="dropdown-item">profile</a>--}}
                            {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                               {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                {{--{{ __('Logout') }}--}}
                            {{--</a>--}}

                            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                {{--@csrf--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--<li class="nav-item dropdown">--}}

                    {{--</li>--}}
                {{--@endguest--}}
            {{--</ul>--}}

            {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
                {{--<!-- Left Side Of Navbar -->--}}
                {{--<ul class="navbar-nav mr-auto">--}}
                {{--</ul>--}}

                {{--<!-- Right Side Of Navbar -->--}}
                {{--<ul class="navbar-nav ml-auto">--}}
                    {{--<!-- Authentication Links -->--}}
                    {{--@guest--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item">--}}
                            {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                        {{--</li>--}}
                    {{--@else--}}
                        {{--<li class="nav-item dropdown">--}}
                            {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"--}}
                               {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
                                {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                            {{--</a>--}}

                            {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                                {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
                                   {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                    {{--{{ __('Logout') }}--}}
                                {{--</a>--}}

                                {{--<form id="logout-form" action="{{ route('logout') }}" method="POST"--}}
                                      {{--style="display: none;">--}}
                                    {{--@csrf--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                    {{--@endguest--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</nav>--}}
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ournavbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand wobble-horizontal" href="#">Elzero <span>Inc.</span></a>
        </div>
        <div class="collapse navbar-collapse" id="ournavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Programming</a></li>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Desktop</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Web Hosting</a></li>
                    </ul>
                </li>
                <li><a href="#">Map</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div> <!-- End Of The Container -->
</nav>

<!-- End Our Navbar -->
    <main class="py-4">

        @yield('content')
    </main>
</div>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="js/jquery.nicescroll.min.js"></script>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('public/js/jquery-2.1.4.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap-rating.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script src="{{asset('public/js/jquery.morelines.min.js')}}"></script>
<script src="{{ asset('public/js/plugins.js') }}"></script>
<script src="{{ asset('public/js/wow.min.js') }}"></script>
<script src="{{ asset('public/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('public/js/myFunctions.js') }}"></script>

</body>
</html>
