@if(count($reviews) > 0)
    @foreach($reviews as $review)
        @include('front.movies.review')
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