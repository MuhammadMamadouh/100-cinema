@extends('layouts.blog')
@section('content')
    <div class=" main_container col-md-9">
        <div class="content_inner_bg row m0">

            <section class="portfolio_area pad" id="portfolio">
                <div class="main_title">
                    <h2 class="pull-left">
                        <a href="#"> Most Liked Posts</a></h2>
                </div>
                <div class="portfolio_list_inner" id="loads">
                    @foreach($posts as $post)
                        @include('front.loads.posts')
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </section>
        </div>
    </div>
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
                                             alt="profile_picture">
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

                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $('#comments').load('<?php echo url("/posts/$post->id/comments")?>');
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
@endpush