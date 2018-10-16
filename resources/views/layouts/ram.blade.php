<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/fav-icon.png" type="image/x-icon"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>RAMIREZ - Resume / CV / </title>


    {{--<link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/Ionicons/css/ionicons.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('public/front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{asset('public/front/css/style.css')}}">
    {{--<link rel="stylesheet" href="{{asset('public/front/css/newstyle.css')}}">--}}
    <link rel="stylesheet" href="{{asset('public/front/css/responsive.css')}}">
    <link rel="stylesheet" href="{{ asset('public/front/css/default_theme.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/hover.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('public/front/css/front.css') }}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="light_bg" data-spy="scroll" data-target="#bs-example-navbar-collapse-1" data-offset="80"
      data-scroll-animation="true">


<!--================ Frist hader Area =================-->
<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#about">ABOUT ME </a></li>
                    <li><a href="#skill">Skill</a></li>
                    <li><a href="#education">Education</a></li>
                    <li><a href="#service">SERVICES</a></li>
                    <li><a href="#portfolio">PORTFOLIO</a></li>
                    <li><a href="#news">News</a></li>
                    <li><a href="#contact">CONTACT</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
</header>
<!--================End Footer Area =================-->

<!--================Total container Area =================-->
<div class="container main_container">
    <div class="content_inner_bg row m0">
        @yield('content')
    </div>
</div>
<!--================End Total container Area =================-->

<!--================footer Area =================-->
<footer class="footer_area">
    <div class="footer_inner">
        <div class="container">
            <img src="img/footer-logo.png" alt="">
            <ul class="social_icon">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="footer_copyright">
        <div class="container">
            <div class="pull-left">
                <h5>
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        All rights reserved | This template is made with <i class="fa fa-heart-o"
                                                                            aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </h5>
            </div>
            <div class="pull-right">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">ABOUT ME </a></li>
                    <li><a href="#">Skill</a></li>
                    <li><a href="#">Education</a></li>
                    <li><a href="#">SERVICES</a></li>
                    <li><a href="#">PORTFOLIO</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">CONTACT</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--================End footer Area =================-->

<div class="envalab-style-switch" id="switch-style">
    <div class="switch-button" id="toggle-switcher"><i class="fa fa-gears"></i></div>
    <div class="switched-options">
        <div class="config-title">Color Panel</div>
        <ul class="styles">
            <li>
                <a href=# onclick='return setActiveStyleSheet("default"),!1' title="default"></a>
            </li>
            <li>
                <a href=# onclick='return setActiveStyleSheet("orange"),!1' title="orange"></a>
            </li>
            <li>
                <a href=# onclick='return setActiveStyleSheet("pink"),!1' title="pink"></a>
            </li>
            <li>
                <a href=# onclick='return setActiveStyleSheet("violet"),!1' title="violet"></a>
            </li>
            <li>
                <a href=# onclick='return setActiveStyleSheet("blue"),!1' title="blue"></a>
            </li>
            <li>
                <a href=# onclick='return setActiveStyleSheet("past"),!1' title="past"></a>
            </li>
        </ul>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-2.1.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<!-- Extra plugin js -->
<script src="vendors/counter-up/waypoints.min.js"></script>
<script src="vendors/counter-up/jquery.counterup.min.js"></script>
<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="vendors/isotope/isotope.pkgd.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>

<script src="vendors/style-switcher/styleswitcher.js"></script>
<script src="vendors/style-switcher/switcher-active.js"></script>

<script src="vendors/animate-css/wow.min.js"></script>

<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="js/gmaps.min.js"></script>

<!-- contact js -->
<script src="js/jquery.form.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/contact.js"></script>

<script src="js/theme.js"></script>
</body>
</html>