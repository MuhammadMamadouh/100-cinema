<?php
$user = \App\User::find($post->user_id);
?>
<article class="post" id="post_{{$post->id}}">

    <div class="panel panel-default arrow left">
        <header class="col-sm-2 hidden-xs">
            <div class="">
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
        </header>
        <div class="panel-body col-sm-10">
            <div class="post-user">
                <h3 class="post-title">{{$post->title}}</h3>
            </div>
            <time class="post-date"><i class="fa fa-clock-o"></i> {{$post->created_at->diffForHumans()}}
            </time>

            <div class="post-details">
                {!! nl2br($post->details) !!}
            </div>
        </div>
        <div class="post-image">
            <img src="{{\Storage::url($post->image)}}"
                 class="img-responsive" style="max-height: 500px">
        </div>
        <div class="post-box-footer">
            <a class="user btn btn-default like" data-post_id="{{$post->id}}">
                <span id="likesCount-{{$post->id}}">
                    {{$post->likes()->count()}}
                </span>
                <i class="fa fa-thumbs-up "></i>
                <span id="liked-{{$post->id}}">
                    @foreach($post->likes as $like)
                        @if(auth()->check())
                            @if($like->user_id == auth()->user()->id)
                                <b>Liked</b>
                                @break
                            @endif
                        @endif
                    @endforeach
                </span>
            </a>
            <a href="{{route('posts.show', $post->id)}}" class="category col-md-6">
                <span class="main">{{$post->comments->count()}} comments</span>
            </a>
            <a href="#" class="user col-md-4">
                <iframe src="https://www.facebook.com/plugins/share_button.php?href=http://localhost/imdb/posts/{{$post->id}}&layout=button&size=small&mobile_iframe=true&appId=195198244755555&width=59&height=20"
                        width="59" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowTransparency="true" allow="encrypted-media"></iframe>

            </a>
        </div>
    </div>
</article>