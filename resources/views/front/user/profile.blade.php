@extends('layouts.blog')
<!-- Main content -->
@section('title', $user->name . '')
@section('content')

    <div class=" main_container col-md-9">
        <section class="about_person_area pad" id="about">
            <div class="row">
                <div class="col-md-2">
                    <div class="person_img">
                        <img src="{{\Storage::url($user->image)}}" alt="{{$user->name}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="person_details">
                        <h3><span>{{$user->name}}</span></h3>
                        @auth
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
                            <button class="btn btn-danger">follow
                                <i class="fa fa-plus"></i>
                            </button>
                        @endauth

                        <p class="lead">{{$user->about}}</p>
                        <div class="person_information">
                            <ul>
                                <li><a href="#">Birth date : </a></li>
                                <li><a href="#">Country : {{$user->country}}</a></li>
                                <li><a href="{{$user->site}}">website : {{$user->site}}</a></li>
                            </ul>
                        </div>
                        <ul class="social_icon">
                            <li><a href="{{$user->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$user->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$user->instgram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{$user->twitter}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="portfolio_area pad" id="posts">
            <div class="main_title">
                <h2 class="pull-left">
                    <a href="{{URL::current() . '/posts'}}">Posts</a></h2>
            </div>
            <div class="portfolio_list_inner">
                @foreach($posts as $post)
                    @include('front.loads.posts')
                @endforeach
            </div>
        </section>
        <section class="portfolio_area pad" id="reviews">
            <div class="main_title">
                <h2 class="pull-left">
                    <a href="{{URL::current() . '/reviews'}}"> Reviews</a></h2>
            </div>
            <div class="portfolio_list_inner">

                @foreach($reviews as $review)
                    <article class="row" id="comment{{$review->id}}">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">
                                <a href='{{url("movie/$review->movie->id")}}'>
                                    <img class="img-responsive" src="{{\Storage::url($review->movie->poster)}}"
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
                                                    class="fa fa-clock-o"></i>
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
        </section>
    </div>


@endsection
@section('js')
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
        $('.js-description_readmore').moreLines({
            linecount: 1,
            // default CSS classes
            baseclass: 'b-description',
            basejsclass: 'js-description',
            classspecific: '_readmore',

            // custom text
            buttontxtmore: "read more",
            buttontxtless: "read less",

            // animation speed in milliseconds
            animationspeed: 250
        });


    </script>
@endsection