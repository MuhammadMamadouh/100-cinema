<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head any other head content must come *after* these tags -->
    <title> title </title>
    <!-- Bootstrap -->
    <link href="{{asset('public/blog/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/blog/css/font-awesome.min.css')}}"/>
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('public/blog/css/animate.css')}}"/>
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{asset('public/blog/css/style.css')}}"/>
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
          rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Header -->
<header>
    <nav class="navbar">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">My Blog</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{ url('/')}}">Home</a>
                    </li>
                    <li>
                        <a href="#">About Us</a>
                    </li>
                    <li>
                        <a href="#">Contact Us</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Categories <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @auth()
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle user-dropdown" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                {{--<img src="{{\Storage::url(Auth::user()->image)}}" alt="" title="" class="user-image"/>--}}
                                {{--{{ auth()->user->name }}--}}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ url('/profile') }}">My Profile</a>
                                    <a href="{{ url('/profile/posts') }}">My posts</a>
                                    <a href="{{ url('/logout') }}">Logout</a>
                                </li>

                            </ul>
                        </li>
                    @endauth
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Sign Up</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>
<!--/ Header -->
<!-- Content -->
<div id="content">
@yield('content')
<!-- Widget -->
    <div class="col-sm-3 hidden-xs" id="widget">
        <!-- Social Widget -->
        <section class="box wow fadeInDown" data-wow-duration="2s" id="social-widget">
            <h3 class="heading">Social Media</h3>
            <div class="content">
                <a href="#" class="facebook">
                    <span class="fa fa-facebook"></span>
                </a>
                <a href="#" class="google">
                    <span class="fa fa-google-plus"></span>
                </a>
                <a href="#" class="twitter">
                    <span class="fa fa-twitter"></span>
                </a>
                <a href="#" class="youtube">
                    <span class="fa fa-youtube"></span>
                </a>
                <a href="#" class="instagram">
                    <span class="fa fa-instagram"></span>
                </a>
                <a href="#" class="pinterest">
                    <span class="fa fa-pinterest"></span>
                </a>
                <a href="#" class="rss">
                    <span class="fa fa-rss"></span>
                </a>
            </div>
        </section>
        <!--/ Social Widget -->
        <!-- Search Widget -->
        <section class="box wow fadeInDown" data-wow-duration="2s" id="search-widget">
            <h3 class="heading">Search Blog</h3>
            <div class="content">
                <form action="#">
                    <input type="text" name="search" class="input placeholder" placeholder="Search Blog"/>
                    <button class="button">Search</button>
                </form>
            </div>
        </section>
        <!--/ Search Widget -->
        <!-- Categories Widget -->
        <section class="box wow fadeInDown" data-wow-duration="2s" id="categories-widget">
            <h3 class="heading">Categories</h3>
            <div class="content">

                <a href="#">
                    <span class="name">name</span>
                    <span class="total-posts" title="Posts">posts</span>
                </a>

            </div>
        </section>
        <!--/ Categories Widget -->
        <!-- Popular Posts Widget -->
        <section class="box wow fadeInDown" data-wow-duration="2s" id="popular-posts-widget">
            <h3 class="heading">Popular Posts</h3>
            <div class="content">
                <a href="#">
                    Wildly Addictive Green Super Smoothie
                </a>
                <a href="#">
                    Bath in Rose Petals
                </a>
                <a href="#">
                    Orange Roulade with Mascar Filling
                </a>
                <a href="#">
                    China's Taste For Australian Products
                </a>
            </div>
        </section>
        <!--/ Popular Posts Widget -->
        <!-- Ads Widget -->
        <section id="ads-widget" class="wow fadeInDown" data-wow-duration="2s">

            <a href="#" class="ad" target="_blank">
                <img src="{{asset('public/images/users/1.jpg')}}" alt=""/>
            </a>
        </section>
        <!--/ Ads Widget -->
    </div>
    <!--/ Widget -->
    <!-- Left side column. contains the logo and sidebar -->

    <div class="clearfix"></div>
</div>
<!--/ Content -->
<!-- Footer -->
<footer>
    <div class="copyrights">
        &copy;2016 My Blog All Rights Reserved
    </div>
    <div class="social">
        <a href="#" class="facebook">
            <span class="fa fa-facebook"></span>
        </a>
        <a href="#" class="google">
            <span class="fa fa-google-plus"></span>
        </a>
        <a href="#" class="twitter">
            <span class="fa fa-twitter"></span>
        </a>
        <a href="#" class="youtube">
            <span class="fa fa-youtube"></span>
        </a>
        <a href="#" class="instagram">
            <span class="fa fa-instagram"></span>
        </a>
        <a href="#" class="pinterest">
            <span class="fa fa-pinterest"></span>
        </a>
        <a href="#" class="rss">
            <span class="fa fa-rss"></span>
        </a>
    </div>
</footer>
<!--/ Footer -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('public/blog/js/bootstrap.min.js')}} ?>"></script>
<!-- WOW JS -->
<script src="{{asset('public/blog/js/wow.min.js')}} ?>"></script>
<!-- Custom JS -->
<script src="{{asset('public/blog/js/custom.js')}} ?>"></script>
</body>
</html>