@extends('layouts.front')

@section('content')


    <section class="portfolio_area pad" id="portfolio">
        <div class="comments">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <section class="comment-list">
                            @auth
                                <p id="msg" style="display: none"></p>
                                <article class="row">

                                    <h4 class="modal-title">Create Post</h4>


                                    <div class="col-md-12 col-sm-12">
                                        <div class="panel panel-default arrow left">
                                            <div class="panel-body">
                                                <div class="comment-post">
                                                    {!! Form::open(['url' => url('posts'), 'method'=> 'post', 'id'=> 'frm-insert', 'files'=> true]) !!}
                                                    <input type="hidden" name="user_id"
                                                           value="{{\Auth::user()->id}}">
                                                    <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                                                        {!! Form::label('title') !!}
                                                        {!! Form::text('title','',['class'=>'form-control  input']) !!}
                                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                    </div>
                                                    <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                                                        {!! Form::label('details') !!}
                                                        {!! Form::textarea('details','',['class'=>'form-control  input']) !!}
                                                        <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                                    </div>
                                                    <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
                                                        {!! Form::label('image') !!}
                                                        {!! Form::file('image',['class'=>'form-control']) !!}
                                                        <span class="glyphicon glyphicon-camera form-control-feedback"></span>
                                                    </div>
                                                    <div>
                                                        <button type="submit"
                                                                class="btn btn-success green pull-right">
                                                            <i class="fa fa-share"></i> Share
                                                        </button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                    <button type="button"
                                                            class="btn btn-info submit-btn"
                                                            data-dismiss="modal">cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endauth
                            @guest
                                <article class="row">
                                    <div class="col-md-10 col-sm-10">
                                        <div class="panel panel-default arrow left">
                                            <div class="panel-body">
                                                <div class="comment-post">
                                                    <p class="lead">
                                                        <a href="{{url('/login')}}">Sign in </a>to can wrote
                                                        your review :)
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endguest
                            <div id="reviews">
                                @foreach($posts as $post)
                                    <article class="row" id="comment{{$post->id}}">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="panel panel-default arrow left">
                                                <div class="panel-body">
                                                    <header class="text-left">
                                                        <div class="col-md-2 col-sm-2 hidden-xs">
                                                            <figure class="thumbnail">

                                                                <img class="img-responsive"
                                                                     @if($post->user()->first()->image)
                                                                     src="{{\Storage::url($post->user()->first()->image)}}"
                                                                     alt="{{$post->user()->first()->image}}"
                                                                     @else
                                                                     src="{{asset('public/images/user.png')}}"
                                                                        @endif
                                                                >
                                                                <figcaption class="text-center"><a
                                                                            href="#">{{$post->user()->first()->name}}</a>
                                                                </figcaption>
                                                            </figure>
                                                        </div>
                                                        <div class="comment-user"><i class="fa fa-user"></i>
                                                            <h4>{{$post->title}}</h4>
                                                        </div>
                                                        <time class="comment-date" datetime="{{$post->created_at}}"><i
                                                                    class="fa fa-clock-o"></i> {{$post->created_at}}
                                                        </time>
                                                    </header>

                                                    <div class="comment-post">
                                                        <div class="b-description_readmore js-description_readmore">{{nl2br($post->details)}}</div>
                                                    </div>
                                                    <div class="post_image">
                                                        <img src="{{\Storage::url($post->image)}}"
                                                             class="img-responsive" style="max-height: 500px">
                                                    </div>
                                                    <div class="post-box-footer">
                                                        <a href="#" class="user col-md-6">
                                                            By:
                                                            <span class="main">{{$post->user()->first()->name}}</span>
                                                        </a>
                                                        <a href="#" class="category col-md-6">
                                                            In:
                                                            <span class="main">category</span>
                                                        </a>
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
            </div>
        </div>
    </section>


    <div id="myslide" class="carousel slide hidden-xs" data-ride="carousel">

        <ol class="carousel-indicators">
            <li data-target="#myslide" data-slide-to="0" class="active"></li>
            <li data-target="#myslide" data-slide-to="1"></li>
            <li data-target="#myslide" data-slide-to="2"></li>
            {{--<li data-target="#myslide" data-slide-to="3"></li>--}}
        </ol>

        <div class="carousel-inner">
            @foreach($movies as $movie)
                <div class="item ">
                    <img class="d-block w-100" src="{{\Storage::url($movie->poster)}}" width="1920"
                         height="600" alt="Pic 1">
                    <div class="carousel-caption hidden-xs">
                        <h2 class="h1">{{$movie->title}}</h2>
                        <p class="lead"></p>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="left carousel-control" href="#myslide" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>

        <a class="right carousel-control" href="#myslide" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    <!-- End Carousel -->
    {{--<section class="news_area pad" id="news">--}}
    {{--<div class="main_title">--}}
    {{--<h2 class="pull-left">Videos You May Like</h2>--}}
    {{--</div>--}}
    {{--<div class="news_inner_area">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--@if(isset($video->id->videoId))--}}
    {{--<iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$video->id->videoId}}"--}}
    {{--frameborder="5">--}}
    {{--</iframe>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}

@endsection
@push('js')
    <script type="text/javascript">
        $('.item:first-of-type').addClass('active')
    </script>
@endpush