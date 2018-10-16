@extends('layouts.front')
<!-- Main content -->
@section('title', $user->name . '')
@section('content')
    <div class=" main_container">
        <div class="content_inner_bg row m0">
            <section class="about_person_area pad" id="about">
                <div class="row">
                    <div class="col-md-3">
                        <div class="person_img">
                            <img src="{{\Storage::url($user->image)}}" alt="{{$user->name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row person_details">
                            <h3><span>{{$user->name}}</span></h3>
                            @auth
                                @if( request()->route()->parameter('id') != auth()->user()->id)
                                    <button class="btn btn-danger">follow
                                        <i class="fa fa-plus"></i>
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

            {{--<section class="portfolio_area pad" id="portfolio">--}}
            {{--<div class="main_title">--}}
            {{--<h2 class="pull-left">Reviews</h2>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
            {{--<div class="portfolio_list_inner">--}}

            {{--@foreach($reviews as $review)--}}
            {{--<div class="col-md-3 photo marketing" id="movie_id?{{$review->id}}">--}}
            {{--<div class="portfolio_item">--}}
            {{--<div class="portfolio_img">--}}
            {{--<img src="{{\Storage::url($review->poster)}}" alt="{{$review->title}}">--}}
            {{--</div>--}}
            {{--<div class="portfolio_title">--}}
            {{--<a href="{{url("movie/$review->movies_id/#comment$review->id")}}">--}}
            {{--<h4>{{$review->title}}</h4></a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</section>--}}
            <section class="portfolio_area pad" id="portfolio">
                <div class="main_title">
                    <h2 class="pull-left">Reviews</h2>
                </div>
                <div class="row">
                    <div class="portfolio_list_inner">

                        @foreach($reviews as $review)
                            {{--<div class="col-md-3 photo marketing card" id="movie_id?{{$review->id}}">--}}
                            {{--<div class="portfolio_item">--}}
                            {{--<div class="portfolio_img card-img-top">--}}
                            {{--<img src="{{\Storage::url($review->poster)}}" alt="{{$review->title}}">--}}
                            {{--</div>--}}
                            {{--<div class="portfolio_title">--}}
                            {{--<a href="{{url("movie/$review->movies_id/#comment$review->id")}}">--}}
                            {{--<h4>{{$review->title}}</h4></a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-12 photo marketing card" id="movie_id?{{$review->id}}">--}}
                            {{--<div class="row">--}}
                            {{--<div class="card portfolio_item col-md-2" style="width: 18rem;">--}}
                            {{--<img class=" img-thumbnail" src="{{\Storage::url($review->poster)}}"--}}
                            {{--alt="Card image cap">--}}
                            {{--<div class="card-body portfolio_title">--}}
                            {{--<h5 class="card-title ">{{$review->title    }}</h5>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="profile-reviews col-md-9 ">--}}
                            {{--<h3>{{$user->name}}</h3>--}}
                            {{--<p class="card-text">{{substr($review->review, 0, 120)}}</p>--}}
                            {{--<a href="{{url("movie/$review->movies_id")}}" class="btn btn-danger pull-right">READ MORE</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{----}}

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
                                                <time id="time" class="comment-date" datetime="{{$review->created_at}}"><i
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
                </div>
            </section>
        </div>
    </div>
@endsection
@push('js')
    <script>

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

        var date1 = new Date(last);
        var date2 = new Date();
        console.log(date2.getTime() - date1.getTime());
        var timeDiff = Math.abs(date2.getTime() - date1.getTime());
        console.log('date is ' + timeDiff);

        var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
        var diffHours = Math.ceil(timeDiff / (1000 * 3600));
        console.log('dif hours ' + diffHours);
        console.log('dif days ' + diffDays);

        if(diffHours < 24 && diffDays < 1) {
            $('#time').text(diffHours + 'hr');
            console.log(diffHours + ' hr');
        }else if(diffDays > 10&& diffHours > 24) {
            $('#time').text(diffDays + 'days ago');
            console.log('days');
        }else {
            $('#time').text(diffDays + 'days ago');
            console.log('years');
        }
        // console.log('diff is ' + current - new Date(last).getTime());

    </script>
@endpush