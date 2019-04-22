@extends('layouts.page')
@section('title', strtoupper($movie->title))

@section('content')

    <div class="reviews-section ">
        <h3 class="head">Movie Reviews</h3>
        <div class="col-md-9 reviews-grids">
            <div class="review">
                <div class="movie-pic">
                    <a href="#"><img src="{{image_url($movie->poster)}}" alt=""/></a>
                </div>
                <div class="review-info">
                    <a class="span" href="#">{{strtoupper($movie->title)}} <i>Movie Review</i></a>
                    <p class="dirctr"><a href=""></a></p>
                    {{--<p class="ratingview">Critic's Rating:</p>--}}
                    {{--<div class="rating">--}}
                    {{--<span>☆</span>--}}
                    {{--<span>☆</span>--}}
                    {{--<span>☆</span>--}}
                    {{--<span>☆</span>--}}
                    {{--<span>☆</span>--}}
                    {{--</div>--}}
                    {{--<p class="ratingview">--}}
                    {{--&nbsp{{5}}/5--}}
                    {{--</p>--}}
                    <div class="clearfix"></div>
                    {{--<p class="ratingview c-rating">Avg Readers' Rating:</p>--}}
                    {{--<div class="rating c-rating">--}}
                    {{--<span>☆</span>--}}
                    {{--<span>☆</span>--}}
                    {{--<span>☆</span>--}}
                    {{--<span>☆</span>--}}
                    {{--<span>☆</span>--}}
                    {{--</div>--}}
                    {{--<p class="ratingview c-rating">--}}
                    {{--&nbsp; 3.3/5</p>--}}
                    {{--<div class="clearfix"></div>--}}
                    <div class="yrw">
                        {{--<div class="dropdown-button">--}}
                        {{--<select class="dropdown" tabindex="9" data-settings='{"wrapperClass":"flat"}'>--}}
                        {{--<option value="0">Your rating</option>--}}
                        {{--<option value="1">1.Poor</option>--}}
                        {{--<option value="2">1.5(Below average)</option>--}}
                        {{--<option value="3">2.Average</option>--}}
                        {{--<option value="4">2.5(Above average)</option>--}}
                        {{--<option value="5">3.Watchable</option>--}}
                        {{--<option value="6">3.5(Good)</option>--}}
                        {{--<option value="7">4.5(Very good)</option>--}}
                        {{--<option value="8">5.Outstanding</option>--}}
                        {{--</select>--}}
                        {{--</div>--}}

                        <div class="wt text-center">
                            <a href="#" class="play-icon popup-with-zoom-anim"
                               href="#small-dialog">WATCH THIS TRAILER</a>
                        </div>
                        <div id="small-dialog" class="mfp-hide">
                            <iframe src="https://www.youtube.com/embed/{{$movie->trailer}}" frameborder="0"
                                    allowfullscreen></iframe>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <p class="info">CAST:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @forelse($movie->actors()->limit(3)->get() as $actor)
                            <a href='{{route("crew.show",$actor->id)}}'>{{$actor->name}}</a>

                        @empty
                            have not actors yet
                        @endforelse
                        <a href="{{route('movie.crew', $movie)}}"> ... more</a>
                    </p>
                    <p class="info">DIRECTION:
                        &nbsp;&nbsp;&nbsp;&nbsp; @forelse($movie->directors as $actor)
                            <a href='{{route("crew.show",$actor->id)}}'>{{$actor->name}}</a>
                        @empty
                            have not actors yet
                        @endforelse
                    </p>
                    <p class="info">GENRE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        @forelse($movie->categories as $category)
                            <a href="{{url("movie/category/$category->name")}}">{{$category->name}}</a>
                        @empty
                            have not category yet
                        @endforelse
                    </p>
                    <p class="info">DURATION:&nbsp;&nbsp;&nbsp; &nbsp; {{$movie->playtime}} min</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="single">

                <p>STORY</p>:{{$movie->story}}
            </div>
            @auth
                <div class="reply-section">
                    <div class="reply-section-head">
                        <div class="reply-section-head-text">
                            <h3>add your AWSOME review</h3>
                        </div>
                    </div>
                    <div class="blog-form">
                        <textarea title="add comment" class="form-control" id="commentBox"></textarea>
                    </div>
                </div>
        @endauth
        <!-- comments-section-starts -->
            <div class="comments-section">
                <div class="comments-section-head">
                    <div class="comments-section-head-text">
                        <h3 id="total-comments">{{$movie->reviews->count()}} reviews</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="comments-section-grids" id="comments">
                    @foreach($reviews as $review )
                        @include('front.movies.review')
                    @endforeach
                </div>
                {{$reviews->links()}}
            </div>
            <!-- comments-section-ends -->
        </div>

        @include('layouts.sidebar')
        <div class="clearfix"></div>
    </div>
    <div class="">
        <ul id="flexiselDemo1">
            <li><img src="{{asset('public/images/r1.jpg')}}" alt=""/></li>
            <li><img src="{{asset('public')}}/images/r2.jpg" alt=""/></li>
        </ul>
        <script type="text/javascript">
            $(window).load(function () {

                $("#flexiselDemo1").flexisel({
                    visibleItems: 6,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: false,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint: 480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint: 640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint: 768,
                            visibleItems: 3
                        }
                    }
                });
            });
        </script>

    </div>

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
                        {!! Form::label('review') !!}
                        {!! Form::textarea('review','',['class'=>'form-control input']) !!}
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
    <link href="{{asset('public/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all"/>

    <script>
        $(document).ready(function () {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: true,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });
            $("#flexiselDemo1").flexisel({
                visibleItems: 6,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: false,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 2
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 3
                    }
                }
            });
            $('.pagination .page-link').on('click', function (e) {
                e.preventDefault();
                $('#load a').css('color', '#dfecf6');
                $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');
                let url = $(this).attr('href');
                getReviews(url);

            });

            function getReviews(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    $('#comments').append(data);
                }).fail(function () {
                    alert('Reviews could not be loaded.');
                });
            }

            $('#commentBox').on('keypress', function (e) {
                let review = $('#commentBox').val().trim();
                if (e.keyCode === 13 && review !== '') {
                    e.preventDefault();
                    if (review === '') return;
                    $.ajax({
                        type: 'POST',
                        url: '{{route('reviews.store')}}',
                        data: {
                            review: review,
                            movie: '{{$movie->id}}',
                            _token: '{{csrf_token()}}',
                        },
                        dataType: 'json'
                    })
                        .done(function (data) {
                            $('#commentBox').text('');
                            $('#comments').prepend(data.comment);
                        })
                        .fail(function (data) {
                            $('#commentBox').text('');
                        })
                }
            });

            let body = $('body');
            body.delegate('.comment-menue .edit-comment', 'click', function () {
                let id = $(this).attr('id');
                $.ajax({
                    url: '{{url("reviews")}}/' + id,
                    data: '',
                    type: 'GET',
                    dataType: 'JSON',
                    beforeSend: function () {
                    },
                    success: (function (results) {
                        console.log(results.review);
                        let review = results.review;
                        $('#frm-update #review').val(review.review);
                        $('#frm-update').attr('action', '{{url('reviews')}}/' + review.id);
                    }),
                    error: (function (results) {
                        $.each(results.responseJSON.errors, function (index, val) {
                            toastr.info(val)
                        });
                    }),
                });
            });
            $('#frm-update').on('submit', function (e) {
                e.preventDefault();
                let form = $('#frm-update');
                let url = '{{url("reviews")}}/' + id;
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
                        if (results.review) {
                            $('#review-' + id).html(results.review);
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
    </script>
    <script src="{{asset('public/js/jquery.magnific-popup.js')}}" type="text/javascript"></script>
@endsection