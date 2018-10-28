@extends('adminlte::page')
@section('adminlte_css')
    <link href="{{ asset('public/vendor/adminlte/dist/css/skins/skin-blue' . '.min.css')}} "
          rel="stylesheet">
    {{--<link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">--}}

    {{--<link href="{{asset('public/css/imdb.css')}}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/newstyle.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/front.css')}}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>


    @stack('css')
    @yield('css')
@stop

@section('body_class', 'skin-blue' . (config('adminlte.layout') ? [
    'boxed' => 'layout-boxed',
    'fixed' => 'fixed',
    'top-nav' => 'layout-top-nav'
][config('adminlte.layout')] : '') . ' sidebar-collapse ')


@section('body')
    {{--<header class="main-header">--}}
    {{--@if(config('adminlte.layout') == 'top-nav')--}}
    {{--<nav class="navbar navbar-fixed-top bg-dark">--}}
    {{--<div class="container">--}}
    {{--<div class="navbar-header">--}}
    {{--<a href="#" class="navbar-brand">--}}
    {{--100Cinema--}}
    {{--</a>--}}

    {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"--}}
    {{--data-target="#navbar-collapse">--}}
    {{--<i class="fa fa-bars"></i>--}}
    {{--</button>--}}
    {{--</div>--}}

    {{--<form class="form-inline col-md-5">--}}
    {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
    {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
    {{--</form>--}}
    {{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
    {{--<div class="collapse navbar-collapse pull-left" id="navbar-collapse">--}}
    {{--<ul class="nav navbar-nav">--}}
    {{--<li class="nav-item"></li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<!-- /.navbar-collapse -->--}}
    {{--@else--}}
    <!-- Logo -->


    {{--</header>--}}
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ournavbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand wobble-horizontal" href="#">100 <span>Cinema</span></a>
            </div>

            <div class="collapse navbar-collapse" id="ournavbar">


                <div class="col-md-5 dropdown">
                    <form class="form-inline" id="searchForm" method="get" action="{{url('/search')}}" role="search">
                        {{--{{csrf_field()}}--}}
                        <input type="search" class="form-control mr-sm-2 fa fa-search dropdown-toggle"
                               data-toggle="dropdown"
                               id="search_bar" name="query" autocomplete="off"
                               placeholder="Search" aria-label="Search">
                        <div class="dropdown" id="SearchDropdown">
                            <ul class="dropdown-menu" role="menu" id="searchMenu"></ul>
                        </div>
                    </form>

                </div>
                <ul class="nav navbar-nav navbar-right">

                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="faq.html">FAQ</a></li>
                    @guest
                        <li class="nav-item mr-sm-2">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{auth()->user()->name}}
                                <span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{url('user/'. Auth::user()->id)}}">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div> <!-- End Of The Container -->
    </nav>

    <!-- End Our Navbar -->
    <div class="row">

    @if(config('adminlte.layout') != 'top-nav')
        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
    @endif

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper col-lg-9">
            @if(config('adminlte.layout') == 'top-nav')
                <div class="container">
                @endif


                <!-- Content Header (Page header) -->
                    <section class="content-header">
                        @yield('content_header')
                    </section>

                    <!-- Main content -->
                    <section class="content">
                        @include('vendor.adminlte.messages')
                        @yield('content')

                    </section>

                    <!-- End Ultimate Footer Section -->
                    <!-- /.content -->
                    @if(config('adminlte.layout') == 'top-nav')
                </div>
                <!-- /.container -->
            @endif
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- Start Ultimate Footer Section -->

    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <h3>Sitemap</h3>
                    <ul class="list-unstyled three-columns">
                        <li>Home</li>
                        <li>About</li>
                        <li>Company</li>
                        <li>Code</li>
                        <li>Design</li>
                        <li>Host</li>
                        <li>Solutions</li>
                        <li>Sitemap</li>
                        <li>Contact</li>
                    </ul>
                    {{--<ul class="list-unstyled social-list">--}}
                    {{--<li><img src="images/social-bookmarks/facebook.png" width="48" height="48"--}}
                    {{--alt="Facebook"/></li>--}}
                    {{--<li><img src="images/social-bookmarks/gplus.png" width="48" height="48"--}}
                    {{--alt="Google Plus"/></li>--}}
                    {{--<li><img src="images/social-bookmarks/twitter.png" width="48" height="48"--}}
                    {{--alt="Twitter"/></li>--}}
                    {{--<li><img src="images/social-bookmarks/pinterest.png" width="48" height="48"--}}
                    {{--alt="Pinterest"/></li>--}}
                    {{--<li><img src="images/social-bookmarks/rss.png" width="48" height="48"--}}
                    {{--alt="Rss"/></li>--}}
                    {{--<li><img src="images/social-bookmarks/email.png" width="48" height="48"--}}
                    {{--alt="Email"/></li>--}}
                    {{--</ul>--}}
                </div>
                <div class="col-lg-4 col-md-6">
                    <h3>Latest Articles</h3>

                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="{{asset('public/test/images/amanda1.jpg')}}"
                                 width="64" height="64" alt="Image 02"/>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                Programming
                            </h4>
                            This Is Some Text About Programming Describe The Media Of Bootstrap 3.2.0
                        </div>
                    </div>

                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="{{asset('public/test/images/amanda1.jpg')}}"
                                 width="64" height="64" alt="Image 02"/>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                Coding
                            </h4>
                            This Is Some Text About Programming Describe The Media Of Bootstrap 3.2.0
                        </div>
                    </div>

                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="{{asset('public/test/images/amanda1.jpg')}}"
                                 width="64" height="64" alt="Image 02"/>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                Web Design
                            </h4>
                            This Is Some Text About Programming Describe The Media Of Bootstrap 3.2.0
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <h3>Our Awesome Work</h3>
                    <img class="" src="{{asset('public/test/images/amanda1.jpg')}}"
                         width="150" height="100" alt="Image 01"/>
                    <img class="" src="{{asset('public/test/images/amanda4.jpg')}}"
                         width="150" height="100" alt="Image 01"/>
                    <img class="" src="{{asset('public/test/images/amanda3.jpg')}}"
                         width="150" height="100" alt="Image 01"/>
                    <img class="" src="{{asset('public/test/images/amanda2.jpg')}}"
                         width="150" height="100" alt="Image 01"/>
                </div>
            </div>
        </div>
        <div class="copyright text-center">
            Copyright &copy; 2014 <span>Your Template Name</span> .Inc
        </div>
    </section>

    <!-- ./wrapper -->
@stop

@section('adminlte_js')

    <script src="{{ asset('public/vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap-rating-input.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap-rating.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('public/js/jquery.morelines.min.js')}}"></script>
    <script src="{{ asset('public/js/myFunctions.js') }}"></script>

    @stack('js')
    @yield('js')

@stop
