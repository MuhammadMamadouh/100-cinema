@extends('layouts.blog')
@section('title', $post->title)
@section('content')

    <div class=" main_container col-md-9 pad">
        <div class="content_inner_bg m0">

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
                                {{htmlspecialchars_decode($post->details)}}
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
            <div class="comments">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <section class="comment-list">
                                @auth
                                    <p id="msg" style="display: none"></p>
                                    <article class="row">
                                        <div class="col-md-2 col-sm-2 hidden-xs">
                                            <figure class="thumbnail">
                                                <img class="img-responsive"
                                                     src="{{\Storage::url(auth()->user()->image)}}"
                                                     alt="amanda cerny">
                                                <figcaption class="text-center">{{\Auth::user()->name}}</figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-10 col-sm-10">
                                            <div class="panel panel-default arrow left">
                                                <div class="panel-body">
                                                    <div class="comment-post">
                                                        {!! Form::open(['url' => route('addComment', $post->id), 'method'=> 'post', 'id'=> 'add-comment']) !!}
                                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                                        <input type="hidden" name="user_id"
                                                               value="{{\Auth::user()->id}}">
                                                        <textarea class="form-control input-lg" id="commentBox"
                                                                  name="comment"></textarea>

                                                        <button type="submit" class="btn btn-danger green pull-right">
                                                            <i class="fa fa-share"></i>
                                                        </button>
                                                        {!! Form::close() !!}
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
                                <div id="loading"></div>
                                @include('front.post.comments')
                                {{$comments->links()}}
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $('.pagination .page-link').on('click', function (e) {
                e.preventDefault();
                $('#load a').css('color', '#dfecf6');
                $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

                var url = $(this).attr('href');
                console.log(url)
                getPosts(url);
                window.history.pushState("", "", url);
            });

            function getPosts(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    console.log(data)
                    $('#loading').html(data);
                }).fail(function () {
                    alert('Articles could not be loaded.');
                });
            }


            $('#add-comment').on('submit', function (e) {
                e.preventDefault();
                $('#msg').show();
                var data = $(this).serialize();
                var url = $(this).attr('action');
                var post = $(this).attr('method');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    dataType: 'json'
                })

                    .done(function (data) {
                        $(this).resetForm();
                        $('#commentBox').text('');
                        $('#comments').load('<?php echo url("/posts/$post->id/comments")?>');
                    })
                    .fail(function (data) {
                        $('#commentBox').text('');
                        $('#comments').load('<?php echo url("/posts/$post->id/comments")?>');
                    })
            });
        });

        $("#input-id").rating();


    </script>
@endsection