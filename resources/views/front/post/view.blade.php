@extends('layouts.page')
@section('title', $post->title)
@section('css')
    <link href="{{asset('public/css/post-style.css')}}" rel="stylesheet" type="text/css" media="all"/>
@endsection
@section('content')
    <div class="mag-inner">
        <div class="col-md-8 mag-innert-left">
            <div class="banner-bottom-left-grids">
                <div class="single-left-grid">
                    <img src="{{image_url($post->image)}}" width="730" height="470" alt="">
                    <h4>{{$post->title}}</h4>
                    {!! nl2br($post->details ) !!}
                    <div class="single-bottom">
                        <ul>
                            <li><a href="#">@if(isset($post->category->name)){{$post->category->name}}@endif</a></li>
                            <li>{{$post->created_at}}</li>
                            <li><a href="#">@if(isset($post->user->name)){{$post->user->name}}@endif</a></li>
                            <li><a href="{{route('posts.edit', $post->slug)}}">{{$post->comments->count()}} Comments</a>
                            </li>
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
                </div>
                <div class="comments-section-grids" id="comments">
                    @foreach($comments as $comment )
                        <div class="comments-section-grid">
                            <div class="col-md-2 comments-section-grid-image">
                                <img src="{{image_url($comment->user->image)}}" class="img-responsive" alt=""/>
                            </div>
                            <div class="col-md-10 comments-section-grid-text">
                                <h4><a href="#">{{$comment->user->name}}</a></h4>
                                <label>{{$comment->created_at->diffForHumans()}} </label>
                                <p>{{$comment->body}}.</p>
                                <span><a href="#">Reply</a></span>
                                <i class="rply-arrow"></i>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endforeach
                    <div class="comments-section-grid comments-section-middle-grid">
                        <div class="col-md-2 comments-section-grid-image">
                            <img src="{{asset('images/beauty.jpg')}}" class="img-responsive" alt=""/>
                        </div>
                        <div class="col-md-10 comments-section-grid-text">
                            @auth
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                            data-toggle="dropdown">Dropdown Example
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">HTML</a></li>
                                        <li><a href="#">CSS</a></li>
                                        <li><a href="#">JavaScript</a></li>
                                    </ul>
                                </div>

                            @endif
                            <h4><a href="#">MARWA ELGENDY</a></h4>
                            <label>5/4/2014 at 22:00 </label>
                            <p>But I must explain to you how all this idea denouncing pleasure and praising pain was
                                born and I will give you a complete account of the system, and expound but because
                                those
                                who do not know how to pursue pleasure rationally encounter consequences.</p>
                            <span><a href="#">Reply</a></span>
                            <i class="rply-arrow"></i>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        @auth
            <!-- comments-section-ends -->
                <div class="reply-section">
                    <div class="reply-section-head">
                        <div class="reply-section-head-text">
                            <h3>Leave Reply</h3>
                        </div>
                    </div>
                    <div class="blog-form">

                        {!! Form::open(['url' => route('addComment', $post->id), 'method'=> 'post', 'id'=> 'add-comment']) !!}
                        {{--<input type="hidden" name="post_id" value="{{$post->id}}">--}}
                        {{--<input type="hidden" name="user_id"--}}
                        {{--value="{{\Auth::user()->id}}">--}}
                        <textarea class="form-control" id="commentBox" name="body"></textarea>
                        {!! Form::close() !!}
                    </div>
                </div>
            @endauth
        </div>
        <div class="col-md-4 mag-inner-right">
            <div class="connect">
                <h4 class="side">STAY CONNECTED</h4>
                <ul class="stay">
                    <li class="c5-element-facebook"><a href="#"><span class="icon"></span><h5>700</h5><span
                                    class="text">Followers</span></a></li>
                    <li class="c5-element-twitter"><a href="#"><span class="icon1"></span><h5>201</h5><span
                                    class="text">Followers</span></a></li>
                    <li class="c5-element-gg"><a href="#"><span class="icon2"></span><h5>111</h5><span class="text">Followers</span></a>
                    </li>
                    <li class="c5-element-dribble"><a href="#"><span class="icon3"></span><h5>99</h5><span
                                    class="text">Followers</span></a></li>

                </ul>
            </div>
            <h4 class="side">Popular Posts</h4>
            <div class="edit-pics">
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="../images/f4.jpg" class="img-responsive" alt=""/>

                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner two"><a href="#">New iPad App to stimulate your Guitar</a></h5>
                        <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                                    href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="../images/f1.jpg" class="img-responsive" alt=""/>

                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner two"><a href="#">New iPad App to stimulate your Guitar</a></h5>
                        <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                                    href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="../images/f1.jpg" class="img-responsive" alt=""/>

                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner two"><a href="#">New iPad App to stimulate your Guitar</a></h5>
                        <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                                    href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="../images/f4.jpg" class="img-responsive" alt=""/>

                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner two"><a href="#">New iPad App to stimulate your Guitar</a></h5>
                        <div class="td-post-date two"><i class="glyphicon glyphicon-time"></i>Feb 22, 2015 <a
                                    href="#"><i class="glyphicon glyphicon-comment"></i>0 </a></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!--//edit-pics-->
        </div>
        <div class="clearfix"></div>
    </div>
    <!--//end-mag-inner-->
@endsection
@section('js')
    <script>
        $('#commentBox').on('keypress', function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                var form = $('#add-comment');
                var data = form.serialize();
                var url = form.attr('action');
                var post = form.attr('method');
                // axios.post(url, {
                //     data: data,
                // })
                //     .then(function (response) {
                //         console.log(response);
                //     })
                //     .catch(function (error) {
                //         console.log(error);
                //     });
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
                        $('#commentBox').text('');
                        $('#comments').prepend(data.comment);
                        console.log(data)
                    })
                    .fail(function (data) {
                        console.log(data.responseText);
                        $('#commentBox').text('');
                    })

            }
        });

    </script>
@endsection
