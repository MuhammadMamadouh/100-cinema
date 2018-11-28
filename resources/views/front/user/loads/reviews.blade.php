<div id="load" style="position: relative;">

    @foreach($reviews as $review)
        <article class="row" id="comment{{$review->id}}">
            <div class="col-md-2 col-sm-2 hidden-xs">
                <figure class="thumbnail">
                    <a href="{{url("movie/$review->movies_id")}}">
                        <img class="img-responsive" src="{{\Storage::url($review->poster)}}"
                             alt="{{$review->title}}">

                        <figcaption class="portfolio_title text-center"><a
                                    href="#">{{$review->title}}</a>
                        </figcaption>
                    </a>
                </figure>
            </div>
            <div class="col-md-10 col-sm-10">
                <div class="panel panel-default arrow left">
                    <div class="panel-body">
                        <div class="review-block-rate col-sm-4 pull-right">

                            @for($i=0; $i<$review->rate; $i++ )
                                <button type="button" class="btn btn-warning btn-xs"
                                        aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-star"
                                                              aria-hidden="true"></span>
                                </button>
                            @endfor
                            @for($i=0; $i<(5-$review->rate); $i++ )
                                <button type="button" class="btn btn-default btn-xs"
                                        aria-label="Left Align">
                                                        <span class="glyphicon glyphicon-star"
                                                              aria-hidden="true"></span>
                                </button>
                            @endfor
                        </div>
                        <header class="text-left">
                            <div class="comment-user"><i class="fa fa-user"></i>
                                <a href="#">{{$user->name}}</a>
                            </div>
                            <time id="time" class="comment-date" datetime="{{$review->created_at}}">
                                <i class="fa fa-clock-o"></i> {{$review->created_at}}
                            </time>
                        </header>
                        <div class="comment-post">
                            <div class="b-description_readmore js-description_readmore">{{$review->review}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
@endforeach
