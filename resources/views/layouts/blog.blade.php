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
    <link rel='stylesheet' href="{{asset('public/blog/css/header&footer.css') }}">
    <link rel="stylesheet" href="{{asset('public/blog/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/blog/css/toastr.min.css')}}">
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

                    <li class="dropdown">
                        <input type="search" class="form-control mr-sm-2 fa fa-search dropdown-toggle"
                               data-toggle="dropdown"
                               id="search_bar" name="query" autocomplete="off"
                               placeholder="Search" role="button"
                               aria-haspopup="true" aria-expanded="true">
                        <ul class="dropdown-menu" id="searchMenu"></ul>
                    </li>

                </form>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{{url('/')}}">Home</a></li>
                @guest
                    <li class="nav-item mr-sm-2">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#login">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    <!-- Login Modal-->

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
    @guest()
        <div id="login" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close"
                                data-dismiss="modal">&times;
                        </button>
                        <h4 class="modal-title">Login</h4>
                    </div>

                    <div class="modal-body">
                        {!! Form::open(['route' => 'login', 'method'=>'post']) !!}

                        <div class="form-group row">
                            <label for="email"
                                   class="col-sm-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-12 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label"
                                           for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit"
                                        class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link"
                                   href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                        <div class="panel">
                            <h3 class="h3">- OR -</h3>

                            <div class="card-body">

                                <a href="{{url('login/facebook')}}"
                                   class="btn btn-block btn-primary btn-facebook"><i
                                            class="fa fa-facebook"></i>
                                    Sign in using
                                    Facebook</a>
                                <a href="{{url('login/google')}}"
                                   class="btn btn-block btn-danger btn-google"><i
                                            class="fa fa-google-plus"></i>
                                    Sign in using
                                    Google+</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <span class="help-block pull-left">
                                <strong id="edit-error"></strong>
                            </span>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest
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
                    <li>Movies</li>
                    <li>Articles</li>
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
                            {{read_more($post->details, 10)}}...
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
        Copyright &copy; 2018 <span>{{\Config('app.name')}}</span> .Inc
    </div>
</section>

<!-- End Ultimate Footer Section -->
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

<script src="{{ asset('public/js/bootstrap-rating-input.js') }}"></script>
<script src="{{ asset('public/js/bootstrap-rating.js') }}"></script>
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
                        toastr.success('well done');
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
                    console.log(results);
                    if (results.responseJSON.errors) {
                        $.each(results.responseJSON.errors, function (index, val) {
                            toastr.info(val)
                        });
                    } else {
                        toastr.info(results)
                    }
                    formResults.removeClass().addClass('alert alert-danger').html(results.responseJSON.message);
                }
            })
        });


        /**
         * Auth user Likes a post
         */
        //like the post
        $('.like').on('click', function (e) {

            var post_id = $(this).data('post_id');
            var url = '{{url('/posts')}}/' + post_id + '/saveLike';
            var likesCount = $('#likesCount-' + post_id).text();
            var liked = $('#liked-' + post_id);
            $.ajax({
                type: 'POST',
                url: url,
                datatype: 'json',
                data: {
                    _token: '{{csrf_token()}}',
                },
                success: function (data) {
                    if (data.liked) {
                        likesCount++;
                        $('#likesCount-' + post_id).text(likesCount);
                        liked.html('<b> liked </b>')
                    } else if (data.deleted) {
                        likesCount--;
                        $('#likesCount-' + post_id).text(likesCount).css('color', 'black');
                        liked.html('')
                    } else if (data.redirect) {
                        window.location.href = data.redirect;
                    }
                },
                error: function (data) {
                }
            });
        });


        $('body').delegate('.post-menue .delete-post', 'click', function (e) {
            e.preventDefault();
            if (confirm('Are You Sure?')) {
                var id = $(this).attr('id');
                var url = '{{url('posts')}}/' + id;
                $.ajax({
                    url: url,
                    data: {
                        _token: '{{csrf_token()}}',
                    },
                    type: 'DELETE',
                    dataType: 'JSON',
                    beforeSend: function () {
                        toastr.info('Loading...');
                    },
                    success: function (results) {
                        $('#post_' + id).remove();
                        if (results.success) {
                            toastr.info(results.success);
                        }
                        if (results.post) {
                            toastr.info(results.success);
                        }
                    },
                    error: function (results) {
                        $.each(results.responseJSON.errors, function (index, val) {
                            toastr.info(val)
                        });
                    },
                })
            }
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