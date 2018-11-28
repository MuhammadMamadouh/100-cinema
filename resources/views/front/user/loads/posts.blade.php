<div id="load" style="position: relative;"></div>

@foreach($posts as $post)
    <?php
    $user = \App\User::find($post->user_id);
    ?>
    <article class="post" id="post_{{$post->id}}">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default arrow left">
                <div class="panel-body">
                    <header class="text-left">
                        <div class="col-md-2 col-sm-2 hidden-xs">
                            <figure class="thumbnail">

                                <img class="img-responsive"
                                     @if($user->image)
                                     src="{{\Storage::url($user->image)}}"
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
                        {{nl2br($post->details)}}
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
@endforeach