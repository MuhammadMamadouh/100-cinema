<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <!-- IE Compatibility Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- First Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', ''))</title>
    <link rel='stylesheet' href="{{asset('public/blog/css/bootstrap.css') }}">
    <link rel='stylesheet' href="{{asset('public/blog/css/font-awesome.min.css') }}">
    <link rel='stylesheet' href="{{asset('public/blog/css/newstyle.css') }}">

    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/front.css')}}">

    <link rel='stylesheet' href="{{asset('public/blog/css/default_theme.css') }}">
    <link rel='stylesheet' href="{{asset('public/blog/css/hover.css') }}">
    <link rel='stylesheet' href="{{asset('public/blog/css/animate.css') }}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700'>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>


<!-- Start Our Navbar -->

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#ournavbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand wobble-horizontal" href="{{url('/')}}">C<span>E</span></a>
        </div>

        <div class="collapse navbar-collapse" id="ournavbar">
            <div class="col-md-5 dropdown search-box">
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
                <li class="active"><a href="{{url('/')}}">Home</a></li>
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

<!-- Start Our Content-->
<div class="row">

    @yield('content')
    @include('layouts.sidebar')
</div>

<!-- End Our Content-->

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
                <ul class="list-unstyled social-list">
                    <li><img src="{{asset('public/blog/images/social-bookmarks/facebook.png') }}" width="48" height="48"
                             alt="Facebook"/></li>
                    <li><img src="{{asset('public/blog/images/social-bookmarks/gplus.png') }}" width="48" height="48"
                             alt="Google Plus"/></li>
                    <li><img src="{{asset('public/blog/images/social-bookmarks/twitter.png') }}" width="48" height="48"
                             alt="Twitter"/></li>
                    <li><img src="{{asset('public/blog/images/social-bookmarks/pinterest.png') }}" width="48"
                             height="48" alt="Pinterest"/></li>
                    <li><img src="{{asset('public/blog/images/social-bookmarks/rss.png') }}" width="48" height="48"
                             alt="Rss"/></li>
                    <li><img src="{{asset('public/blog/images/social-bookmarks/email.png') }}" width="48" height="48"
                             alt="Email"/></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6">
                <h3>Popular Articles</h3>

                @foreach($mostLikedPosts as $post)
                    <div class="media">
                        <a class="pull-left" href="{{url("posts/$post->id")}}">
                            <img class="media-object" src="{{\Storage::url($post->image) }}" width="64"
                                 height="64" alt="Image 01"/>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">
                                {{$post->title}}
                            </h4>
                            This Is Some Text About Programming Describe The Media Of Bootstrap 3.2.0
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="col-lg-4">
                <h3>Our Awesome Work</h3>
                <img class="img-thumbnail" src="{{asset('public/blog/images/work/01.jpg') }}" width="150" height="100"
                     alt="Image 01"/>
                <img class="img-thumbnail" src="{{asset('public/blog/images/work/02.jpg') }}" width="150" height="100"
                     alt="Image 02"/>
                <img class="img-thumbnail" src="{{asset('public/blog/images/work/03.jpg') }}" width="150" height="100"
                     alt="Image 03"/>
                <img class="img-thumbnail" src="{{asset('public/blog/images/work/04.jpg') }}" width="150" height="100"
                     alt="Image 04"/>
            </div>
        </div>
    </div>
    <div class="copyright text-center">
        Copyright &copy; 2014 <span>Your Template Name</span> .Inc
    </div>
</section>

<!-- End Ultimate Footer Section -->

<!-- Start Section Loading -->

{{--<div class="loading-overlay">--}}
{{--<div class="spinner">--}}
{{--<div class="double-bounce1"></div>--}}
{{--<div class="double-bounce2"></div>--}}
{{--</div>--}}
{{--</div>--}}

<!-- End Section Loading -->

<!-- Start Scroll To Top -->

<div id="scroll-top">
    <i class="fa fa-chevron-up fa-3x"></i>
</div>

<!-- End Scroll To Top -->


<script src="{{asset('public/blog/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{asset('public/blog/js/bootstrap.min.js') }}"></script>
<script src="{{asset('public/blog/js/plugins.js') }}"></script>
<script src="{{ asset('public/js/toastr.min.js') }}"></script>
<script src="{{asset('public/js/jquery.morelines.min.js')}}"></script>
{!! Toastr::render() !!}
<script src="{{asset('public/blog/js/wow.min.js') }}"></script>
<script>new WOW().init();</script>
<script src="{{asset('public/blog/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('public/js/myFunctions.js') }}"></script>
<script type="text/javascript">


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {

        $('#frm-insert').on('submit', function (e) {

            e.preventDefault();

            var form = $('#frm-insert');

            var url = form.attr('action');

            var data = new FormData(form[0]);

            var formResults = $('#add-error');

            $.ajax({
                url: url,
                data: data,
                type: 'POST',
                dataType: 'json',
                beforeSend: function () {
                    formResults.removeClass().addClass('alert alert-info').html('Loading...');
                },
                cache: false,
                processData: false,
                contentType: false,
                success: function (results) {
                    if (results.success) {
                        formResults.removeClass().addClass('alert alert-success').html(results.success);
                        $('#add_modal').modal('hide').fadeOut(1500);
                        $('#msg').html(data.success).fadeOut(2000);
                        toastr.success('well done')
                        $('#posts').DataTable().draw(true);
                        $('#frm-insert').each(function () {
                            this.reset();
                        });
                    }
                    if (results.redirectTo) {
                        window.location.href = results.redirectTo;
                    }

                },
                error: function (results) {
                    $.each(results.responseJSON.errors, function (index, val) {
                        toastr.info(val)
                    });
                    formResults.removeClass().addClass('alert alert-danger').html(results.responseJSON.message);
                }
            })
        });
    });
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
@stack('js')
@yield('js')

</body>
</html>