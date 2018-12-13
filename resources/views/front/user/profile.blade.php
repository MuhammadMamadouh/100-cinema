@extends('layouts.blog')
<!-- Main content -->
@section('title', $user->name . '')
@section('content')

    <div class=" main_container col-md-9">
        <div class="content_inner_bg row m0">

            <section class="about_person_area pad" id="about">
                <div class="row">
                    <div class="col-md-2">
                        <div class="person_img">
                            <img src="{{\Storage::url($user->image)}}" alt="{{$user->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row person_details">
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

                            <p>{{$user->about}}</p>
                            <div class="person_information">
                                <ul>
                                    <li><a href="#">Birth date : </a></li>
                                    <li><a href="#">Country : {{$user->country}}</a></li>
                                    <li><a href="#">Address</a></li>
                                    <li><a href="#">Phone</a></li>
                                    <li><a href="#">Skype</a></li>
                                    <li><a href="#">Email</a></li>
                                    <li><a href="#">Website</a></li>
                                </ul>
                                <ul>
                                    {{--<li><a href="#">{{$user->date_of_birth}}</a></li>--}}
                                    <li><a href="#"></a></li>
                                    <li><a href="#">23 High Hope Blvd, Some City, Some Country</a></li>
                                    <li><a href="#">+88 01911854378</a></li>
                                    <li><a href="#">sumon.backpiper</a></li>
                                    <li><a href="#">{{$user->site}}</a></li>

                                </ul>
                            </div>
                            <ul class="social_icon">
                                {{--<li><a href="{{$user->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>--}}
                                {{--<li><a href="{{$user->twitter}}" target="_blank"><i--}}
                                {{--class="fa fa-twitter"></i></a></li>--}}
                                {{--<li><a href="{{$user->instgram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>--}}
                                {{--<li><a href="{{$user->twitter}}" target="_blank"><i class="fa fa-youtube"></i></a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-linkedin"></i></a></li>--}}

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
                        <article class="post" id="post_{{$post->id}}">
                            <div class="col-md-12 col-sm-12">
                                <div class="panel panel-default arrow left">
                                    <div class="panel-body">
                                        <header class="text-left">
                                            <div class="col-md-2 col-sm-2 hidden-xs">
                                                <figure class="thumbnail">

                                                    <img class="img-responsive"
                                                         @if($post->user()->first()->image)
                                                         src="{{\Storage::url($post->user()->first()->image)}}"
                                                         alt="{{$user->image}}"
                                                         @else
                                                         src="{{asset('public/images/user.png')}}"
                                                            @endif
                                                    >
                                                    <figcaption class="text-center"><a
                                                                href="#">{{$user->name}}</a>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="post-user">
                                                <h3 class="post-title">{{$post->title}}</h3>
                                            </div>
                                            <time class="post-date" datetime="{{$post->created_at}}"><i
                                                        class="fa fa-clock-o"></i> {{$post->created_at}}
                                            </time>
                                        </header>

                                        <div class="post-details">
                                            {{nl2br($post->details)}}
                                        </div>
                                        <div class="post-image">
                                            <img src="{{\Storage::url($post->image)}}"
                                                 class="img-responsive" style="max-height: 800px">
                                        </div>
                                        <div class="post-box-footer">
                                            <a href="#" class="user col-md-6">
                                                By:
                                                <span class="main">{{$user->name}}</span>
                                            </a>
                                            <a href="#" class="category col-md-6">
                                                <span class="main">Comments</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
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
                                    <a href="{{url("movie/$review->movies_id")}}">
                                        <img class="img-responsive" src="{{\Storage::url($review->poster)}}"
                                             alt="{{$review->title}}">

                                        <figcaption class="portfolio_title text-center"><a
                                                    href="#">{{$review->title}}</a>
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


        var last = $('#time').attr('dateTime');
        // var current = new Date().getVarDate;
        // console.log(last);
        // console.log('date is ' + current);

        // var date1 = new Date(last);
        // var date2 = new Date();
        // // console.log(date2.getTime() - date1.getTime());
        // var timeDiff = Math.abs(date2.getTime() - date1.getTime());
        // // console.log('date is ' + timeDiff);
        //
        // var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
        // var diffHours = Math.ceil(timeDiff / (1000 * 3600));
        // // console.log('dif hours ' + diffHours);
        // // console.log('dif days ' + diffDays);
        //
        // if (diffHours < 24 && diffDays < 1) {
        //     $('#time').text(diffHours + 'hr');
        //     console.log(diffHours + ' hr');
        // } else if (diffDays > 10 && diffHours > 24) {
        //     $('#time').text(diffDays + 'days ago');
        //     console.log('days');
        // } else {
        //     $('#time').text(diffDays + 'days ago');
        //     console.log('years');
        // }
        // console.log('diff is ' + current - new Date(last).getTime());

    </script>
@endsection