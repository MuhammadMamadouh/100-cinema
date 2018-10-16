<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Classic</title>
    <!-- Bx SLider Css File -->

    {{--<link rel="stylesheet" href="{{asset('public/test/css/jquery.bxslider.css')}}">--}}
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/test/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/test/css/mycss.css')}}">
</head>
<body>

<div class="upper-bar">
    <div class="container">
        <div class="row">
            <div class="info col-sm">
                <i class="fa fa-phone"></i> <span>0505050505</span>,
                <i class="fa fa-envelope-o"></i> Osama@Osama.Com
            </div>
            <div class="info col-sm">
                <span>Lets work together</span>
                <span class="get-quote">Get Quote</span>
            </div>
        </div>
    </div>
</div>

{{--Start Navbar--}}
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <span>Elite</span><span>Crop</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="main-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
{{--End Navbar--}}
<div class="slider">
    <div id="main-slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            <div class="carousel-item carousel-one active">
                <div class="overlay">
                    <h1>We’re an Independent <br>Design and <span>Development</span> <br>Agency.</h1>
                </div>
                <img class="d-block w-100" src="{{asset('public/test/images/amanda1.jpg')}}" alt="First slide">

            </div>
            <div class="carousel-item carousel-two ">
                <div class="overlay">
                    <h1>We’re an Independent <br>Design and <span>Development</span> <br>Agency.</h1>
                </div>
                <img class="d-block w-100" src="{{asset('public/test/images/amanda4.jpg')}}" alt="First slide">

            </div>
            <div class="carousel-item carousel-three ">
                <div class="overlay">
                    <h1>We’re an Independent <br>Design and <span>Development</span> <br>Agency.</h1></div>
                <img class="d-block w-100" src="{{asset('public/test/images/amanda2.jpg')}}" alt="First slide">
            </div>
        </div>
    </div>
</div>
<div class="features text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <i class="fa fa-home fa-2x rounded-circle"></i>
                <h3>Great Idea</h3>
                <p>Lorem ipsum dolor sit amet, sectetur adipisicing elit, eiusmod tempor incididunalquis nostrud
                    exercitation</p>
            </div>
            <div class="col-sm-6 col-lg-3">
                <i class="fa fa-home fa-2x rounded-circle"></i>
                <h3>Great Idea</h3>
                <p>Lorem ipsum dolor sit amet, sectetur adipisicing elit, eiusmod tempor incididunalquis nostrud
                    exercitation</p>
            </div>
            <div class="col-sm-6 col-lg-3">
                <i class="fa fa-home fa-2x rounded-circle"></i>
                <h3>Great Idea</h3>
                <p>Lorem ipsum dolor sit amet, sectetur adipisicing elit, eiusmod tempor incididunalquis nostrud
                    exercitation</p>
            </div>
            <div class="col-sm-6 col-lg-3">
                <i class="fa fa-home fa-2x rounded-circle"></i>
                <h3>Great Idea</h3>
                <p>Lorem ipsum dolor sit amet, sectetur adipisicing elit, eiusmod tempor incididunalquis nostrud
                    exercitation</p>
            </div>
        </div>
    </div>
</div>

<div class="overview text-center">
    <div class="container">
        <h2 class="h1">company overview</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. lvoluptatem.</p>
        <h4>Let's start today</h4>
        <button>view</button>
    </div>
</div>
<!-- Start Featured Work -->
<div class="featured-work text-center">
    <div class="container">
        <h2>Featured Work</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. lvoluptatem.</p>
        <ul class="list-unstyled row">
            <li class="col-md active" data-class="all">All</li>
            <li class="col-md" data-class=".websites">Websites</li>
            <li class="col-md" data-class=".logos">Logos</li>
            <li class="col-md" data-class=".graphic">Graphic</li>
            <li class="col-md" data-class=".marketing">Marketing</li>
            <li class="col-md" data-class=".videos">vidoes</li>
        </ul>
    </div>
    <div class="shuffle-imgs">
        <div class="row">
            <div class="col-md">
                <img class="websites" src="{{asset('public/test/images/amanda1.jpg')}}">
            </div>
            <div class="col-md">
                <img class="videos" src="{{asset('public/test/images/amanda9.jpg')}}">
            </div>
            <div class="col-md">
                <img class="marketing" src="{{asset('public/test/images/amanda3.jpg')}}">
            </div>
            <div class="col-md">
                <img class="videos" src="{{asset('public/test/images/amanda4.jpg')}}">
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <img class="marketing" src="{{asset('public/test/images/amanda5.jpg')}}">
            </div>
            <div class="col-md">
                <img class="graphic" src="{{asset('public/test/images/amanda6.jpg')}}">
            </div>
            <div class="col-md">
                <img class="websites" src="{{asset('public/test/images/amanda0.jpg')}}">
            </div>
            <div class="col-md">
                <img class="graphic" src="{{asset('public/test/images/amanda8.jpg')}}">
            </div>
        </div>
    </div>
</div>
<!-- Start Latest Posts -->
<div class="latest-posts">
    <div class="container">
        <h2 class="text-center">Latest Posts</h2>
        <p class="section-description text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. lvoluptatem.</p>
        <div class="row">
            <!-- Start Grid Column -->
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('public/test/images/amanda0.jpg')}}" alt=""/>
                    <div class="card-body">
                        <h4 class="card-title">Lorem Ipsum is simply dummy text ofthe printing and</h4>
                        <h6 class="card-subtitle mb-2 text-muted">March 24 2017</h6>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. lvoluptatem.</p>
                        <a href="#" class="card-link">Read More</a>
                    </div>
                </div>
            </div>
            <!-- End Grid Column -->
            <!-- Start Grid Column -->
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('public/test/images/amanda8.jpg')}}" alt=""/>
                    <div class="card-body">
                        <h4 class="card-title">Lorem Ipsum is simply dummy text ofthe printing and</h4>
                        <h6 class="card-subtitle mb-2 text-muted">March 24 2017</h6>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. lvoluptatem.</p>
                        <a href="#" class="card-link">Read More</a>
                    </div>
                </div>
            </div>
            <!-- End Grid Column -->
            <!-- Start Grid Column -->
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="{{asset('public/test/images/amanda1.jpg')}}" alt=""/>
                    <div class="card-body">
                        <h4 class="card-title">Lorem Ipsum is simply dummy text ofthe printing and</h4>
                        <h6 class="card-subtitle mb-2 text-muted">March 24 2017</h6>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. lvoluptatem.</p>
                        <a href="#" class="card-link">Read More</a>
                    </div>
                </div>
            </div>
            <!-- End Grid Column -->
        </div>
    </div>
</div>
<!-- End Latest Posts -->

<!-- Start Testimonials -->
<div class="testimonials">
    <div class="overlay"></div>
    <div class="container">
        <div id="testimonials" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#testimonials" data-slide-to="0" class="active"></li>
                <li data-target="#testimonials" data-slide-to="1"></li>
                <li data-target="#testimonials" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-caption d-none d-block">
                        <img src="{{asset('public/test/images/amanda8.jpg')}}" alt="...">
                        <h3>Mohamed Faragallah</h3>
                        <span>Company CEO</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nq</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption d-none d-block">
                        <img src="{{asset('public/test/images/amanda8.jpg')}}" alt="...">
                        <h3>Ahmed Mosaad</h3>
                        <span>Company Manager</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nq</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption d-none d-block">
                        <img src="{{asset('public/test/images/amanda8.jpg')}}" alt="...">
                        <h3>John Skeet</h3>
                        <span>Free Lancer</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nq</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#testimonials" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#testimonials" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<!-- End Testimonials -->

<!-- Start Pricing Table -->
<div class="pricing-table text-center">
    <div class="container">
        <h2>Pricing Table</h2>
        <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. lvoluptatem.</p>
        <div class="row">
            <!-- Start Grid Column -->
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Small Business</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Lorem Ipsum</h6>
                        <p class="card-text">$99/<span>Year</span></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Lorem Ipsum</li>
                            <li class="list-group-item">Lorem Ipsum</li>
                            <li class="list-group-item">Lorem Ipsum</li>
                            <li class="list-group-item">Lorem Ipsum</li>
                            <li class="list-group-item">Lorem Ipsum</li>
                        </ul>
                        <a href="#" class="card-link">Read More</a>
                    </div>
                </div>
            </div>
            <!-- End Grid Column -->
            <!-- Start Grid Column -->
            <div class="col-md-6 col-lg-4">
                <div class="card corporate">
                    <div class="card-body">
                        <h4 class="card-title">Corporate</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Lorem Ipsum</h6>
                        <p class="card-text">$199/<span>Year</span></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Lorem Ipsum</li>
                            <li class="list-group-item">Lorem Ipsum</li>
                            <li class="list-group-item">Lorem Ipsum</li>
                            <li class="list-group-item">Lorem Ipsum</li>
                            <li class="list-group-item">Lorem Ipsum</li>
                        </ul>
                        <a href="#" class="card-link">Read More</a>
                    </div>
                </div>
            </div>
            <!-- End Grid Column -->
            <!-- Start Grid Column -->
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Enterprise</h4>
                        <h6 class="card-subtitle mb-2 text-muted">Lorem Ipsum</h6>
                        <p class="card-text">$299/<span>Year</span></p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Lorem Ipsum</li>
                            <li class="list-group-item">Lorem Ipsum</li>
                            <li class="list-group-item">Lorem Ipsum</li>
                            <li class="list-group-item">Lorem Ipsum</li>
                            <li class="list-group-item">Lorem Ipsum</li>
                        </ul>
                        <a href="#" class="card-link">Read More</a>
                    </div>
                </div>
            </div>
            <!-- End Grid Column -->
        </div>
    </div>
</div>
<!-- End Pricing Table -->
<script src="{{asset('public/test/js/jquery-1.11.3.min.js')}}"></script>
<script src="{{asset('public/test/js/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('public/js/jquery.elimore.min.js')}}"></script>
<script src="{{asset('public/test/js/jquery.mixitup.js')}}"></script>
<script src="{{asset('public/test/js/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/test/js/myjs.js')}}"></script>

</body>
</html>