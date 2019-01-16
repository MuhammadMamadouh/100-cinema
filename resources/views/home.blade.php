@extends('layouts.blog')

@section('content')

    <!-- Start Carousel -->

    <div id="myslide" class="carousel slide hidden-xs" data-ride="carousel">

        <ol class="carousel-indicators">
            <li data-target="#myslide" data-slide-to="0" class="active"></li>
            <li data-target="#myslide" data-slide-to="1"></li>
            <li data-target="#myslide" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            @foreach($movies as $movie)
                <div class="item">
                    <img src="{{\Storage::url($movie->poster)}}" width="1920" height="600" alt="Pic 1">
                    <div class="carousel-caption hidden-xs">
                        <h2 class="h1"><a href="{{url("movie/$movie->id")}}">{{$movie->title}}</a></h2>
                        <p class="lead">{{read_more($movie->story, 20)}}</p>
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

    <div class=" main_container col-md-9">

        @auth
            <div class="option-box">
                <div class="color-option">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#create_post">
                        Create Post
                    </button>
                </div>
                <i class="fa fa-pencil fa-3x gear-check"></i>
                <!-- Modal -->
                <div class="modal fade" id="create_post" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
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
                                </div>
                                <div class="modal-footer">
                                    <button type="submit"
                                            class="btn btn-danger pull-right">
                                        <i class="fa fa-share"></i> Share
                                    </button>
                                </div>
                                {!! Form::close() !!}

                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close
                                </button>
                                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
        @guest
            <div class="pad">
                <article class="row">
                    <div class="col-md-10 col-sm-10">
                        <div class="panel panel-default arrow left">
                            <div class="panel-body">
                                <div class="comment-post">
                                    <p class="lead">
                                        @loginBtn to can write
                                        your awesome article :)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        @endguest
        @auth
            <section class="portfolio_area pad following_posts" id="portfolio">
                @foreach($posts as $post)
                    @include('front.loads.posts')
                @endforeach
            </section>
        @endauth
        <section class="portfolio_area pad" id="portfolio">
            <div class="main_title">
                <h2 class="pull-left">
                    <a href="#"> Most Liked Posts</a></h2>
            </div>
            @foreach($mostLikedPosts as $post)
                @include('front.loads.posts')
            @endforeach
        </section>
        @if(isset($channelVideo->id->videoId))
            <section class="portfolio_area pad" id="posts">
                <div class="main_title">
                    <h2 class="pull-left">
                        <a href="#">Videos From Our Channels</a></h2>
                </div>
                <div class="portfolio_list_inner">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$channelVideo->id->videoId}}"
                            frameborder="0"></iframe>
                </div>
            </section>
        @endif
        @if(isset($youtubeVideo->id->videoId))
            <section class="portfolio_area pad" id="posts">
                <div class="main_title">
                    <h2 class="pull-left">
                        <a href="#">Youtube Suggestions</a></h2>
                </div>
                <div class="portfolio_list_inner">
                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$youtubeVideo->id->videoId}}"
                            frameborder="0"></iframe>
                </div>
            </section>
        @endif
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $('.item:first-of-type').addClass('active')
    </script>
@endpush
