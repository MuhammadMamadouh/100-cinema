@extends('layouts.page')
@section('title', $post->title)
@section('css')
    <link href="{{asset('public/css/post-style.css')}}" rel="stylesheet" type="text/css" media="all"/>
@endsection
@section('content')
    <div class="mag-inner col-md-8 col-md-offset-1">
        <div class=" mag-innert-left">
            <div class="banner-bottom-left-grids">
                <div class="single-left-grid">
                    <img src="{{image_url($post->image)}}" width="730" height="470" alt="">
                    <h4>{{$post->title}}</h4>
                    {!! nl2br($post->details ) !!}
                    <div class="single-bottom">
                        <ul>
                            <li>
                                <a class="user like" data-post_id="{{$post->id}}">
                                    <span id="likesCount-{{$post->id}}">
                                        {{$post->likes()->count()}}
                                    </span>
                                    @auth
                                        <span id="liked-{{$post->id}}" style="cursor: pointer">
                                                Like
                                            @foreach($post->likes as $like)
                                                @if($like->user_id == auth()->user()->id)
                                                    <b>Liked</b>
                                                    @break
                                                @endif
                                            @endforeach
                                         </span>
                                    @endauth
                                </a>
                            </li>
                            <li><a href="#">@if(isset($post->category->name)){{$post->category->name}}@endif</a></li>
                            <li>{{$post->created_at}}</li>
                            <li><a href="#">@if(isset($post->user->name)){{$post->user->name}}@endif</a></li>
                            @can('update-post',$post)
                                <li><a href="{{route('posts.edit', $post->id)}}">Edit</a></li>
                            @endif
                            @can('delete-post',$post)
                                <li>
                                    <a href="{{ url("posts/$post->id") }}"
                                       onclick="event.preventDefault();
                                       if (confirm('Are you sure?')){
                                                     document.getElementById('delete-form').submit();}">
                                        Delete
                                    </a>

                                    <form id="delete-form" action="{{ url("posts/$post->id") }}" method="post"
                                          style="display: none;">
                                        {{ method_field('DELETE') }}
                                        @csrf
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!-- comments-section-starts -->
            <div class="comments-section">
                <div class="comments-section-head">
                    <div class="comments-section-head-text">
                        <h3>{{$post->comments->count()}} Comments</h3>
                    </div>
                    <div class="clearfix"></div>
                    @auth
                        <div class="reply-section">
                            <div class="reply-section-head">
                                <div class="reply-section-head-text">
                                    <h3>Leave Reply</h3>
                                </div>
                            </div>
                            <div class="blog-form">
                                <textarea title="add comment" class="form-control" id="commentBox"
                                          name="body"></textarea>
                            </div>
                        </div>
                    @endauth
                </div>

                <div class="comments-section-grids" id="comments">
                    @foreach($comments as $comment )
                        @include('front.post.comment')
                    @endforeach
                    {{$comments->links()}}
                </div>
            </div>

        </div>
        <div class="clearfix"></div>
    </div>
    @include('layouts.sidebar')
    <!--//end-mag-inner-->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog"
         aria-labelledby="editModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url' => '#', 'method'=> 'put','id'=>'frm-update']) !!}
                    <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                        {!! Form::label('body') !!}
                        {!! Form::textarea('body','',['class'=>'form-control input'], ['id'=> 'body']) !!}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger pull-right">Save changes
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#commentBox').on('keypress', function (e) {
            let comment = $('#commentBox').val().trim();

            if (e.keyCode === 13 && comment !== '') {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: '{{route('addComment', $post->id)}}',
                    data: {
                        body: $('#commentBox').val(), _token: '{{csrf_token()}}',
                    },
                    dataType: 'json'
                })
                    .done(function (data) {
                        $('#add-comment').each(function () {
                            this.reset();
                        });
                        $('#commentBox').val('');
                        $('#comments').prepend(data.comment);
                        console.log(data)
                    })
                    .fail(function (data) {
                        console.log(data.responseText);
                        $('#commentBox').text('');
                    })

            }
        });

        $('.pagination .page-link').on('click', function (e) {
            e.preventDefault();
            $('#load a').css('color', '#dfecf6');
            $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

            let url = $(this).attr('href');
            getComments(url);
            // window.history.pushState("", "", url);
        });
        $('.pagination .page-item[disabled=true]').attr('display', 'none');

        function getComments(url) {
            $.ajax({
                url: url
            }).done(function (data) {
                $('#comments').append(data);
            }).fail(function () {
                alert('comments could not be loaded.');
            });
        }


        let body = $('body');
        body.delegate('.comment-menue .edit-comment', 'click', function () {
            let id = $(this).attr('id');
            $.ajax({
                url: '{{url("comments")}}/' + id,
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function () {

                },
                success: (function (results) {
                    let review = results.comment;
                    $('#frm-update #body').val(review.body);
                    $('#frm-update').attr('action', '{{url('comments')}}/' + review.id);
                }),
                error: (function (results) {
                    $.each(results.responseJSON.errors, function (index, val) {
                        toastr.info(val)
                    });
                }),
            });

            $('#frm-update').on('submit', function (e) {

                e.preventDefault();

                let form = $('#frm-update');

                let url = form.attr('action');

                let data = $(this).serialize();

                $.ajax({
                    url: url,
                    data: data,
                    type: 'PUT',
                    dataType: 'JSON',
                    beforeSend: function () {

                    },
                    success: (function (results) {
                        console.log(results);
                        $('#edit_modal').modal('hide').fadeOut(1500);
                        form.each(function () {
                            this.reset();
                        });
                        if (results.body) {
                            $('#review-' + id).html(results.body);

                        }
                    }),
                    error: (function (results) {
                        $.each(results.responseJSON.errors, function (index, val) {
                            toastr.info(val)
                        });
                    }),
                });
            });
        });

        body.delegate('.comment-menue .delete-comment', 'click', function (e) {
            e.preventDefault();
            if (confirm('Are You Sure?')) {
                let id = $(this).attr('id');
                let url = '{{url('comments')}}/' + id;
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
                        $('#comment-' + id).fadeOut(2000).remove();
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

    </script>
@endsection
