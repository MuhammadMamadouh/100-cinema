<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @yield('css')
    <link href="{{asset('public/css/bootstrap.css')}}" rel='stylesheet' type='text/css'/>
    <!-- Custom Theme files -->
    <link href="{{asset('public/css/flexslider.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <!-- Custom Theme files -->
    <script src="{{asset('public/js/jquery.min.js')}}"></script>
    <link rel='stylesheet' href="{{asset('blog/css/font-awesome.min.css') }}">

<!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Cinema Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>
</head>
<body>
<!-- header-section-starts -->
<div class="full">
    <div class="menu">
        <ul>
            <li><a href="{{url('/')}}">
                    <div class="hm"><i class="home1"></i><i class="home2"></i></div>
                </a></li>
            @auth
                <li><a href="{{route('profile', auth()->user()->id)}}">
                        <div class="cat"></i><i class="fa fa-user fa-3x"></i></div>
                    </a>
                </li>
            @endauth
            <li><a class="active" href="{{route('posts.create')}}" title="create post">
                    <div class="cat"><i class="fa fa-pencil-square-o fa-3x"></i></div>
                </a></li>
            <li><a href="404.html">
                    <div class="bk"><i class="booking"></i><i class="booking1"></i></div>
                </a></li>
            <li><a href="contact.html">
                    <div class="cnt"><i class="contact"></i><i class="contact1"></i></div>
                </a></li>
        </ul>
    </div>

    <div class="main">
        <div class="review-content">
            <div class="top-header span_top">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="public/images/logo.png" alt=""/>
                    </a>
                    <p>{{config('app.name')}}</p>
                </div>
                <div class="collapse navbar-collapse" id="ournavbar">

                    <ul class="nav navbar-nav navbar-right">

                        @guest
                            <li class="nav-item mr-sm-2">
                                <a class="nav-link" href="#" data-toggle="modal"
                                   data-target="#login">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>

                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="fa fa-bell">
                                    <span class="badge badge-danger" id="new-notifications">
                                        {{count(auth()->user()->unreadNotifications)}}
                                    </span>
                                </span>
                                </a>
                                <ul class="dropdown-menu col-md-7 notifications-menu" role="menu"></ul>
                            </li>
                        @endguest
                        <div class="col-md-8 dropdown search-box ">
                            <form class="form-inline" id="searchForm" method="get" action="{{url('/search')}}"
                                  role="search">
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
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
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
            @include('messages')
            @yield('content')
        </div>
    </div>
</div>
<div class="clearfix"></div>
<script type="text/javascript">
    $(window).load(function () {
        $("#flexiselDemo1").flexisel({
            visibleItems: 6,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: false,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 2
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 3
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 3
                }
            }
        });
    });
</script>
{{--<script type="text/javascript" src="{{asset('public/js/bootstrap.js')}}"></script>--}}

<script type="text/javascript" src="{{asset('public/js/sweet-alert.js')}}"></script>


<script src="{{asset('blog/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{asset('blog/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{asset('public/js/jquery.flexisel.js')}}"></script>
<script src="{{asset('blog/js/plugins.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{asset('js/jquery.morelines.min.js')}}"></script>
{!! Toastr::render() !!}
<script src="{{asset('blog/js/wow.min.js') }}"></script>
<script>new WOW().init();</script>
<script src="{{asset('blog/js/jquery.nicescroll.min.js') }}"></script>

<script src="{{ asset('js/bootstrap-rating-input.js') }}"></script>
<script src="{{ asset('js/bootstrap-rating.js') }}"></script>
{{--<script src="{{ asset('js/myFunctions.js') }}"></script>--}}
<script src="{{ asset('js/pusher.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {

        $('#frm-insert').on('submit', function (e) {

            e.preventDefault();

            let form = $('#frm-insert');

            let url = form.attr('action');

            let data = new FormData(form[0]);

            let formResults = $('#add-error');

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

            let post_id = $(this).data('post_id');
            let url = '{{url('/posts')}}/' + post_id + '/saveLike';
            let likesCount = $('#likesCount-' + post_id).text();
            let liked = $('#liked-' + post_id);
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
                let id = $(this).attr('id');
                let url = '{{url('posts')}}/' + id;
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
        $('.notifications-menu').load('<?php echo url('notifications')?>');
        setInterval(function () {
            $('#new-notifications').load('<?php echo url('notifications/unread/count')?>');
            $('.notifications-menu').load('<?php echo url('notifications')?>')
        }, 10000);
    });


    $('#search_bar').on('keyup', function () {
        let input = $(this).val().trim();
        if (input !== '') {
            let query = input.replace(' ', '+');
            $('#searchMenu').load('{{url('/')}}/search?query=' + query)
        }
    })

</script>
@yield('js')
</body>
</html>