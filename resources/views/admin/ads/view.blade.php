@extends('adminlte::page')
<!-- Main content -->
@section('content')
    <div class="container main_container">
        <div class="content_inner_bg row m0">
            <section class="about_person_area pad" id="about">
                <div class="row">
                    <div class="col-md-5">
                        <div class="person_img">
                            <img src="{{\Storage::url($movie->poster)}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row person_details">
                            <h3><span>{{$movie->title}}</span></h3>
                            <h4>
                                @if(isset($movieCategories))
                                    @foreach($movieCategories as $category)
                                        <a href="#">{{$category->name}}</a>
                                    @endforeach
                                @else
                                    <h3>This movie has not any category</h3>
                                @endif
                            </h4>

                            <button type="button" class="btn btn-info pull-right" data-toggle="modal"
                                    data-target="#edit_category">
                                Edit Categories
                            </button>
                            <div class="modal fade" id="edit_category" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-style-5">
                                                <form id="ins_method" class="form-horizontal" method="POST"
                                                      action="{{route('addCategory')}}">
                                                    {{ csrf_field() }}

                                                    <input name="movie_id" type="hidden" value="{{$movie->id}}">

                                                    <fieldset>
                                                        <legend><span class="number"></span> Movie Categories:</legend>
                                                        @foreach($categories as $category)

                                                            <label class="container">{{$category->name}}
                                                                <input name="categotries[]"
                                                                       @foreach($movieCategories as $movieCategory)
                                                                       @if($category->id === $movieCategory->id) checked
                                                                       @endif
                                                                       @endforeach
                                                                       value="{{$category->id}}" type="checkbox">
                                                                <span class="checkmark"></span>
                                                            </label>

                                                        @endforeach
                                                    </fieldset>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="lead">{{$movie->story}}</p>
                            <div class="person_information">
                                <ul>
                                    <li><a href="#">Playtime</a></li>
                                    <li><a href="#">Country</a></li>
                                    <li><a href="#">Rate</a></li>
                                    <li><a href="#">language</a></li>
                                    <li><a href="#">year</a></li>
                                    <li><a href="#">Directors</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#">{{$movie->playtime}}</a></li>
                                    <li><a href="#">{{$movie->country}}</a></li>
                                    <li><a href="#">{{$movie->rate}}</a></li>
                                    <li><a href="#">{{$movie->language}}</a></li>
                                    <li><a href="#">{{$movie->year}}</a></li>
                                    @foreach($directors as $director )
                                        <li><a href="{{url("/admin/cast/$director->cast_id")}}">{{$director->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <ul class="social_icon">
                                <li><a href="{{$movie->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="{{$movie->twitter}}" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$movie->instgram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li><a href="{{$movie->twitter}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="news_area pad" id="news">
                <div class="main_title">
                    <h2 class="pull-left">Trailer</h2>
                </div>
                <div class="news_inner_area">
                    <div class="row">
                        <div class="col-md-10">
                            <iframe class="pull-right" width="560" height="315"
                                    src="https://www.youtube.com/embed/{{$movie->trailer}}"
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </section>
            <section class="portfolio_area pad" id="portfolio">
                <div class="main_title">
                    <h2 class="pull-left">Crew</h2>
                    @if(auth()->guard('admin'))
                        <h2 class="pull-right"><a href="{{URL::current()}}/add_crew">AddCrew</a></h2>
                    @endif
                </div>
                {{--<div class="porfolio_menu">--}}
                {{--<ul class="causes_filter">--}}
                {{--<li class="active" data-filter="*"><a href="">All</a></li>--}}
                {{--<li data-filter=".photo"><a href="">Photography</a></li>--}}
                {{--<li data-filter=".design"><a href="">Design</a></li>--}}
                {{--<li data-filter=".marketing"><a href="">Marketing</a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                @if(isset($actors))
                    <div class="row">
                        <div class="portfolio_list_inner">
                            @foreach($actors as $actor)
                                <div class="col-md-4 photo marketing">
                                    <div class="portfolio_item">
                                        <div class="portfolio_img">
                                            <img src="{{\Storage::url($actor->image)}}" alt="">
                                        </div>
                                        <div class="portfolio_title">
                                            <a href="#"><h4>{{$actor->name}}</h4></a>
                                            <h5>{{$movie->job_name}}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="portfolio_title">
                        <a href="{{URL::current()}}/add_crew"> add crew<h4></h4></a>
                        <h5>You have not added any one of crew yet</h5>
                    </div>
                @endif
            </section>

            <section class="portfolio_area pad" id="portfolio">
                <div class="main_title">
                    <h2 class="pull-left">Reviews</h2>
                </div>
                <div class="comments">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <section class="comment-list">
                                    <article class="row">
                                        <div class="col-md-2 col-sm-2 hidden-xs">
                                            <figure class="thumbnail">
                                                <img class="img-responsive"
                                                     src="{{asset('public/test/images/amanda1.jpg')}}"
                                                     alt="amanda cerny">
                                                <figcaption class="text-center">Amanda Cerny</figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-10 col-sm-10">
                                            <div class="panel panel-default arrow left">
                                                <div class="panel-body">
                                                    <div class="comment-post">
                                                        <form>
                                        <textarea class="form-control form-group" id="commentBox"
                                                  placeholder="What are you doing right now?"></textarea>
                                                            <button type="submit"
                                                                    class="btn btn-success green pull-right"><i
                                                                        class="fa fa-share"></i> Share
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <!-- First Comment -->
                                    <article class="row">
                                        <div class="col-md-2 col-sm-2 hidden-xs">
                                            <figure class="thumbnail">
                                                <img class="img-responsive"
                                                     src="{{asset('public/test/images/amanda5.jpg')}}"
                                                     alt="amanda cerny">
                                                <figcaption class="text-center"><a href="#">Amanda Cerny</a>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-10 col-sm-10">
                                            <div class="panel panel-default arrow left">
                                                <div class="panel-body">
                                                    <header class="text-left">
                                                        <div class="comment-user"><i class="fa fa-user"></i> <a
                                                                    href="#">Amanda Cerny</a>
                                                        </div>
                                                        <time class="comment-date" datetime="16-12-2014 01:05"><i
                                                                    class="fa fa-clock-o"></i> Dec 16, 2014
                                                        </time>
                                                    </header>
                                                    <div class="comment-post">
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                            sed do
                                                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                            Ut
                                                            enim ad minim veniam, quis nostrud exercitation ullamco
                                                            laboris
                                                            nisi ut aliquip ex ea commodo consequat.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row">
                                        <div class="col-md-2 col-sm-2 hidden-xs">
                                            <figure class="thumbnail">
                                                <img class="img-responsive img-circle"
                                                     src="{{asset('public/test/images/amanda3.jpg')}}"
                                                     alt="amanda cerny">
                                                <figcaption class="text-center"><a href="#">Amanda Cerny</a>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-10 col-sm-10">
                                            <div class="panel panel-default arrow left">
                                                <div class="panel-body">
                                                    <header class="text-left">
                                                        <div class="comment-user"><i class="fa fa-user"></i> <a
                                                                    href="#">Amanda Cerny</a>
                                                        </div>
                                                        <time class="comment-date" datetime="16-12-2014 01:05"><i
                                                                    class="fa fa-clock-o"></i> Dec 16, 2014
                                                        </time>
                                                    </header>
                                                    <div class="comment-post">
                                                        <p class="lead">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                            sed do
                                                            eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                                            Ut
                                                            enim ad minim veniam, quis nostrud exercitation ullamco
                                                            laboris
                                                            nisi ut aliquip ex ea commodo consequat.
                                                        </p>
                                                    </div>
                                                    <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i
                                                                    class="fa fa-reply"></i> reply</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                    <article class="row">
                                        <div class="col-md-2 col-sm-2 hidden-xs">
                                            <figure class="thumbnail">
                                                <img class="img-responsive"
                                                     src="{{asset('public/test/images/amanda4.jpg')}}"
                                                     alt="amanda cerny">
                                                <figcaption class="text-center"><a href="#">Amanda Cerny</a>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-10 col-sm-10">
                                            <div class="panel panel-default arrow left">
                                                <div class="panel-body">
                                                    <header class="text-left">
                                                        <div class="comment-user"><i class="fa fa-user"></i> That Guy
                                                        </div>
                                                        <time class="comment-date" datetime="16-12-2014 01:05"><i
                                                                    class="fa fa-clock-o"></i> Dec 16, 2014
                                                        </time>
                                                    </header>
                                                    <div class="comment-post">
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                            sed do
                                                        </p>
                                                    </div>
                                                    <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i
                                                                    class="fa fa-reply"></i> reply</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                {{--<!-- Second Comment Reply -->--}}
                                {{--<article class="row">--}}
                                {{--<div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">--}}
                                {{--<figure class="thumbnail">--}}
                                {{--<img class="img-responsive"--}}
                                {{--src="{{asset('public/test/images/amanda1.jpg')}}" alt="amanda cerny">--}}
                                {{--<figcaption class="text-center">username</figcaption>--}}
                                {{--</figure>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-9 col-sm-9">--}}
                                {{--<div class="panel panel-default arrow left">--}}
                                {{--<div class="panel-heading right">Reply</div>--}}
                                {{--<div class="panel-body">--}}
                                {{--<header class="text-left">--}}
                                {{--<div class="comment-user"><i class="fa fa-user"></i> That Guy</div>--}}
                                {{--<time class="comment-date" datetime="16-12-2014 01:05"><i--}}
                                {{--class="fa fa-clock-o"></i> Dec 16, 2014--}}
                                {{--</time>--}}
                                {{--</header>--}}
                                {{--<div class="comment-post">--}}
                                {{--<p>--}}
                                {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do--}}
                                {{--eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut--}}
                                {{--enim ad minim veniam, quis nostrud exercitation ullamco laboris--}}
                                {{--nisi ut aliquip ex ea commodo consequat.--}}
                                {{--</p>--}}
                                {{--</div>--}}
                                {{--<p class="text-right"><a href="#" class="btn btn-default btn-sm"><i--}}
                                {{--class="fa fa-reply"></i> reply</a></p>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</article>--}}
                                <!-- Third Comment -->


                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </section>
@endsection