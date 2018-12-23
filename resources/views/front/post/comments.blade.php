@if(count($comments) > 0)
    @foreach($comments as $comment)
        <article class="row" id="comment">
            <div class="col-md-2 col-sm-2 hidden-xs">
                <figure class="thumbnail">
                    <img class="img-responsive"
                         @if($comment->user()->first()->image)
                         src="{{\Storage::url($comment->user()->first()->image)}}"
                         @else
                         src="{{asset('public/images/user.png')}}"
                            @endif
                    >
                    <figcaption class="text-center"><a
                                href="#">{{$comment->user()->first()->name}}</a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-10 col-sm-10">
                <div class="panel panel-default arrow left">
                    <div class="panel-body">
                        <header class="text-left">
                            <div class="comment-user"><i class="fa fa-user"></i>
                                <a href="#">{{$comment->user()->first()->name}}</a>
                            </div>
                            <time class="comment-date" datetime="16-12-2014 01:05"><i
                                        class="fa fa-clock-o"></i> {{$comment->created_at}}
                            </time>
                        </header>
                        <div class="comment-post">
                            <div class="b-description_readmore js-description_readmore">{{preg_replace('/<br\s?\/?>/i','\n\r',$comment->comment)}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
@endif