<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Bootstrap 4 Design Number 1</title>
    <link rel="stylesheet" href="{{asset('public/newBlog/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/newBlog/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/newBlog/css/main.css')}}">
    <link rel='stylesheet' href="{{asset('public/blog/css/newstyle.css') }}">

    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/front.css')}}">

    {{--<link rel='stylesheet' href="{{asset('public/blog/css/default_theme.css') }}">--}}
    {{--<link rel='stylesheet' href="{{asset('public/blog/css/hover.css') }}">--}}
    {{--<link rel='stylesheet' href="{{asset('public/blog/css/animate.css') }}">--}}
</head>
<body>
<!-- Start Upper Bar -->
<div class="upper-bar">
    <div class="container">
        <div class="row">
            <div class="info col-sm text-center text-sm-left">
                <i class="fa fa-phone"></i> <span>0505050505</span>,
                <i class="fa fa-envelope-o"></i> Osama@Osama.Com
            </div>
            <div class="info col-sm text-center text-sm-right">
                <span>Let's Work Together!</span>
                <span class="get-quote">Get Quote</span>
            </div>
        </div>
    </div>
</div>
<!-- End Upper Bar -->
<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <span>Elite</span><span>Corp</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">About <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Work</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
@yield('content')

<!-- Start Footer -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="site-info">
                    <h2><span>Elite</span><span>Corp</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse </p>
                    <a href="#">Read More</a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="helpful-links">
                    <h2>Helpful Links</h2>
                    <div class="row">
                        <div class="col">
                            <ul class="list-unstyled">
                                <li>About</li>
                                <li>Portofolio</li>
                                <li>Team</li>
                                <li>Price</li>
                                <li>Privacy</li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="list-unstyled">
                                <li>FAQ</li>
                                <li>Blog</li>
                                <li>How it Work</li>
                                <li>Benefits</li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="contact">
                    <h2>Contact Us</h2>
                    <ul class="list-unstyled">
                        <li>54958 Levo Road Near Red Fort, U.S</li>
                        <li>Phone: 012-12345678</li>
                        <li>Email: <a href="mailto:info@elitecorp.com?subject=Contact">info@elitecorp.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer -->
<!-- Start Copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 text-center text-sm-left text-uppercase">
                Copyright 2017 EliteCorp &copy;
            </div>
            <div class="col-sm-6 text-center text-sm-right">
                <ul class="list-unstyled">
                    <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Copyright -->
<script src="{{asset('public/newBlog/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('public/newBlog/js/popper.min.js')}}"></script>
<script src="{{asset('public/newBlog/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/newBlog/js/main.js')}}"></script>
</body>
</html>