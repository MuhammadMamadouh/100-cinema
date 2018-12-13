@if(count($reviews) > 0)
    @foreach($reviews as $review)
        <article class="row" id="comment{{$review->id}}">
            <div class="col-md-2 col-sm-2 hidden-xs">
                <figure class="thumbnail">

                    <img class="img-responsive"
                         @if($review->user_image != null)
                         src="{{\Storage::url($review->user_image)}}" alt="{{$review->user_name}}"
                         @else
                         src="{{asset('public/images/user.png')}}"
                            @endif
                    >
                    <figcaption class="text-center"><a href="#">{{$review->user_name}}</a>
                    </figcaption>
                </figure>
            </div>
            <div class="col-md-10 col-sm-10">
                <div class="panel panel-default arrow left">
                    <div class="panel-body">
                        <div class="review-block-rate col-sm-4 pull-right">

                            @for($i=0; $i<$review->rate; $i++ )
                                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                            @endfor
                            @for($i=0; $i<(5-$review->rate); $i++ )
                                <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                            @endfor
                        </div>
                        <header class="text-left">
                            <div class="comment-user"><i class="fa fa-user"></i>
                                <a href="#">{{$review->user_name}}</a>
                            </div>
                            <time class="comment-date" datetime="16-12-2014 01:05"><i
                                        class="fa fa-clock-o"></i> {{$review->created_at}}
                            </time>
                        </header>

                        <div class="comment-post">
                            <div class="b-description_readmore js-description_readmore">
                                {!! htmlspecialchars_decode($review->review) !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
@else
    <article class="row">
        <div class="col-md-10 col-sm-10">
            <div class="panel panel-default arrow left">
                <div class="panel-body">
                    <div class="comment-post">
                        <p class="lead">
                            This movie has not any reviews yet,
                            be the first one
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endif

<script type="text/javascript">

    $(function () {

        $('.js-description_readmore').moreLines({
            linecount: 1,
            // default CSS classes
            baseclass: 'b-description',
            basejsclass: 'js-description',
            classspecific: '_readmore',

            // custom text
            buttontxtmore: "read more",
            buttontxtless: "read less",

            // animation speed in milliseconds
            animationspeed: 500

        });
    });


</script>
