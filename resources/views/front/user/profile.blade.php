@extends('layouts.page')
<!-- Main content -->
@section('title', $user->name . '')
@section('css')
    <link rel="stylesheet" href="{{asset('blog/css/style.css')}}">
    <link href="{{asset('public/css/post-style.css')}}" rel="stylesheet" type="text/css" media="all"/>
@endsection

@section('content')
    <div class=" main_container col-md-9">
        <div class="container">
            <div class="mag-inner">
                <div class="col-md-10 mag-innert-left">
                    <!--/business-->
                    <div class="live-market">
                        <h3 class="tittle"><i class="glyphicon glyphicon-user"></i><span>Bio</span></h3>
                        <div class="bull">
                            <a href="#"><img src="{{image_url($user->image)}}" alt=""></a>
                        </div>
                        <div class="bull-text">
                            <a class="bull1">{{$user->name}}</a>
                            <p>  @auth
                                    @if( request()->route()->parameter('id') != auth()->user()->id)

                                        <button class="btn btn-danger follow" id="follow" data-id="{{$user->id}}"
                                                data-status=
                                                @if($user->isFollowedBy(auth()->user()->id))
                                                        "following">
                                            @else
                                                "follow">
                                            @endif
                                            @if($user->isFollowedBy(auth()->user()->id)) following @else follow <i
                                                    class="fa fa-plus"></i>@endif

                                        </button>
                                    @endif
                                    @if(request()->route()->parameter('id') == auth()->user()->id)
                                        <a href="{{url()->current()}}/edit" class="btn btn-danger">Edit
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endif
                                @else
                                    <a href="{{route('login')}}" class="btn btn-danger">follow
                                        <i class="fa fa-plus"></i>
                                    </a>
                                @endauth
                            </p>
                            <ul>
                                <li><a href="#"><h4>{{$user->short_bio}}</h4></a></li>
                                <li>{{$user->about}}</li>
                            </ul>
                            <div class="person_information">
                                <ul>
                                    <li><a href="#">Country : {{$user->country}}</a></li>
                                    <li><a href="{{$user->site}}">website : {{$user->site}}</a></li>
                                </ul>
                            </div>
                            <ul class="social_icon list-unstyled list-inline">
                                <li><a href="{{$user->facebook}}" target="_blank"><i
                                                class="fa fa-facebook fa-2x"></i></a></li>
                                <li><a href="{{$user->twitter}}" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
                                </li>
                                <li><a href="{{$user->instgram}}" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
                                </li>
                                <li><a href="{{$user->twitter}}" target="_blank"><i class="fa fa-youtube fa-2x"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="mag-bottom">
            <h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i><span>Posts</span>
                <a class="tittle  pull-right" href="{{URL::current() . '/posts'}}">More</a>
            </h3>


            <div class="portfolio_list_inner">
                @foreach($posts as $post)
                    @include('front.loads.posts')
                @endforeach
            </div>
        </div>
        <div class="mag-bottom">
            <h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i><a
                        href="{{URL::current() . '/reviews'}}">Reviews</a>
            </h3>

            <div class="portfolio_list_inner">

                @foreach($reviews as $review)
                    <article class="row" id="comment{{$review->id}}">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                                <a href='{{url('/movie')}}/{{$review->movie->id}}'>
                                    <img class="img-responsive" src="{{asset('uploading/'.$review->movie->poster)}}"
                                         alt="{{$review->movie->title}}">

                                    <figcaption class="portfolio_title text-center"><a
                                                href='{{url("movie/$review->movie->id")}}'>{{$review->movie->title}}</a>
                                    </figcaption>
                                </a>
                            </figure>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                    <div class="review-block-rate col-sm-4 pull-right">

                                        @for($i=0; $i<$review->rate; $i++ )
                                            <button type="button" class="btn btn-warning btn-xs"
                                                    aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-star"
                                                              aria-hidden="true"></span>
                                            </button>
                                        @endfor
                                        @for($i=0; $i<(5-$review->rate); $i++ )
                                            <button type="button" class="btn btn-default btn-xs"
                                                    aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-star"
                                                              aria-hidden="true"></span>
                                            </button>
                                        @endfor
                                    </div>
                                    <header class="text-left">
                                        <div class="comment-user"><i class="fa fa-user"></i>
                                            <a href="#">{{$user->name}}</a>
                                        </div>
                                        <time id="time" class="comment-date" datetime="{{$review->created_at}}">
                                            <i
                                                    class="fa fa-clock-o"></i>{{$review->created_at->diffForHumans()}}
                                        </time>
                                    </header>
                                    <div class="comment-post">
                                        <div class="b-description_readmore js-description_readmore">{{$review->review}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>


@endsection
@section('js')
    <script src="{{asset('js/jquery.morelines.min.js')}}"></script>

    <script type="text/javascript">

        $('.follow').on('click', function (e) {
            id = $(this).data('id');
            status = $(this).data('status');
            if (status === 'follow') {
                url = '{{url('user/follow')}}';
                console.log(url);
                $.ajax({
                    type: 'POST',
                    url: '{{url('user/follow/')}}',
                    datatype: 'json',
                    data: {
                        _token: '{{csrf_token()}}',
                        id: id,
                    },
                    success: function (data) {
                        if (data.exception) {
                            toastr.warning('there is something error');
                        }
                        $('#follow').data('status', 'following').text('following');
                    },
                    error: function (data) {

                        console.log(data)
                    }
                });
            } else if (status === 'following') {
                url = '{{url('user/deleteFollow')}}';
                console.log(url);
                $.ajax({
                    type: 'POST',
                    url: url,
                    datatype: 'json',
                    data: {
                        _token: '{{csrf_token()}}',
                        id: id,
                    },
                    success: function (data) {
                        if (data.exception) {
                            toastr.warning('there is something error');
                        }
                        $('#follow').data('status', 'follow').text('follow');
                    },
                    error: function (data) {

                        toastr.danger('there is something error');
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection