@extends('layouts.blog')
@section('title', $post->title)
@section('content')

    <div class=" main_container col-md-9 pad">
        <div class="content_inner_bg m0">
            @include('front.loads.posts')
            <div class="comments">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <section class="comment-list">
                                @auth
                                    <p id="msg" style="display: none"></p>
                                    <article class="row">
                                        <div class="col-sm-2 hidden-xs">
                                            <figure class="thumbnail">
                                                <img class="img-responsive"
                                                     src="{{asset('storage/' . auth()->user()->image)}}"
                                                     alt="{{auth()->user()->id}}">
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
                                                        <textarea class="form-control input" id="commentBox"
                                                                  name="comment"></textarea>
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
                                                            @loginBtn to can wrote
                                                            your review :)
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endguest
                                <div id="loading"></div>
                                <div id="comments">

                                    @include('front.post.comments')
                                </div>
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
                console.log(url);
                getComments(url);
                window.history.pushState("", "", url);
            });

            function getComments(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    $('#loading').html(data);
                }).fail(function () {
                    alert('Comments could not be loaded.');
                });
            }


            $('#commentBox').on('keypress', function (e) {
                if (e.keyCode == 13) {
                    e.preventDefault();
                    var form = $('#add-comment');
                    var data = form.serialize();
                    var url = form.attr('action');
                    var post = form.attr('method');
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: data,
                        dataType: 'json'
                    })

                        .done(function (data) {
                            $('#add-comment').each(function () {
                                this.reset();
                            });
                            $('#commentBox').text('');
                            $('#comments').prepend(data.comment);
                        })
                        .fail(function (data) {
                            $('#commentBox').text('');
                        })

                }
            });

            $('body').delegate('.comment-menue .delete-comment', 'click', function (e) {
                e.preventDefault();
                if (confirm('Are You Sure?')) {
                    var id = $(this).attr('id');
                    var url = '{{url('comments')}}/' + id;
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
                            $('#comment-' + id).remove();
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

            $('body').delegate('.comment-menue .edit-comment', 'click', function () {
                var id = $(this).attr('id');
                console.log(id);
                $('#frm-update-' + id).on('submit', function (e) {

                    e.preventDefault();

                    var form = $('#frm-update-' + id);

                    var url = form.attr('action');

                    var data = $(this).serialize();


                    $.ajax({
                        url: url,
                        data: data,
                        type: 'POST',
                        dataType: 'JSON',
                        beforeSend: function () {

                        },
                        success: (function (results) {
                            console.log(results);
                            $('#edit_modal' + id).modal('hide').fadeOut(1500);
                            form.each(function () {
                                this.reset();
                            });
                            if (results.comment) {
                                $('#comment-text-' + id).html(results.comment);
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
        });


    </script>
@endsection