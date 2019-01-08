@extends('layouts.blog')
<!-- Main content -->
@section('title', strtoupper($movie->title) . '-' . config('app.name'))
@section('content')
    <div class="main_container col-md-9">
        <div class="content_inner_bg row m0">
            <section class="about_person_area pad" id="about">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="person_img">
                            <img src="{{\Storage::url($movie->poster)}}" alt="{{$movie->title}}">
                        </div>
                    </div>
                    <div class="col-sm-10">

                        <div class="col-sm-6">
                            <div class="row person_details">
                                <h3><span>{{$movie->title}}</span></h3>
                                <h4>
                                    @if(isset($movieCategories))
                                        @foreach($movieCategories as $category)
                                            <a href="{{url("movie/category/$category->name")}}">{{$category->name}}</a>
                                        @endforeach
                                    @else
                                        <h3>This movie has not any category</h3>
                                    @endif
                                </h4>
                                <div class="person_information">
                                    <ul>
                                        <li><a href="{{url("movie/year/$movie->year")}}"><b>{{$movie->year}}</b></a>|
                                            Playtime: <a
                                                    href="{{url("movie/playtime/$movie->playtime")}}"><b>{{$movie->playtime}}</b>
                                            </a>|
                                            Country: <a
                                                    href="{{url("movie/country/$movie->country")}}"><b>{{$movie->country}}</b></a>
                                            | lang: <a href="{{url("movie/language/$movie->language")}}">
                                                <b>{{$movie->language}}</b></a></li>
                                        <li>Directors: @foreach($directors as $director )
                                                <a href="{{url("/crew/$director->cast_id")}}"><b>{{$director->name}}</b></a>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="rating-block">
                                <h4>Average user rating</h4>
                                <h2 class="bold padding-bottom-7">{{$avgRating}}
                                    <small>/ 5</small>
                                </h2>
                                @for($i=0; $i<$avgRating; $i++ )
                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                @endfor
                                @for($i=0; $i<(5-$avgRating); $i++ )
                                    <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="h3">Story</h3>
                    </div>
                    <div class="panel-body">
                        <p class="col-sm-11">{{$movie->story}}</p>
                    </div>
                </div>
            </section>

            <section class="about_person_area pad" id="news">
                <br>
                <div class="main_title">
                    <h2 class="pull-left">Trailer</h2>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <iframe class="pull-right" width="100%" height="315"
                                    src="https://www.youtube.com/embed/{{$movie->trailer}}"
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </section>
            <section class="portfolio_area pad" id="portfolio">
                <div class="main_title">
                    <h2 class="pull-left"><a href="{{\URL::current()}}/crew">Crew</a></h2>
                </div>

                @if(count($actors) > 0)
                    <div class="row">
                        <div class="portfolio_list_inner">
                            @foreach($actors as $actor)
                                <div class="col-sm-4 photo marketing">
                                    <div class="portfolio_item">
                                        <div class="portfolio_img">
                                            <img src="{{\Storage::url($actor->image)}}" alt="{{$actor->name}}">
                                        </div>
                                        <div class="portfolio_title">
                                            <a href="{{url("crew/$actor->id")}}"><h4>{{$actor->name}}</h4></a>
                                            <h5>{{$actor->job_name}}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="portfolio_title">
                        <h5>We are adding Crew of this movie SOON</h5>
                    </div>
                @endif
            </section>

            <section class="portfolio_area pad">
                <div class="main_title">
                    <h2 class="pull-left">Reviews</h2>
                </div>
                <div class="comments">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <section class="comment-list">
                                    @auth
                                        <article class="row">
                                            <div class="col-md-2 col-sm-2 hidden-xs">
                                                <figure class="thumbnail">
                                                    <img class="img-responsive"
                                                         src="{{\Storage::url(auth()->user()->image)}}"
                                                         alt="profile_picture">
                                                    <figcaption class="text-center">{{\Auth::user()->name}}</figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-10 col-sm-10">
                                                <div class="panel panel-default arrow left">

                                                    <div class="panel-body">
                                                        <div class="comment-post">
                                                            {!! Form::open(['url' => url('reviews'), 'method'=> 'post', 'id'=> 'addReview']) !!}
                                                            <input type="hidden" name="movie" value="{{$movie->id}}">
                                                            <textarea class="form-control input-lg" id="commentBox"
                                                                      name="review"
                                                                      placeholder="Tell people your opinion about movie!"></textarea>
                                                            <div class="review-block-rate col-sm-5">
                                                                <input type="number" name="rate" id="rate"
                                                                       class="rating"
                                                                       data-icon-lib="fa" data-active-icon="fa-star"
                                                                       data-inactive-icon="fa-star-o"/>
                                                            </div>

                                                            <button type="submit"
                                                                    class="btn btn-danger pull-right">
                                                                <i class="fa fa-share"></i>
                                                            </button>
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
                                    <div id="reviews">
                                        <div id="loading"></div>
                                        @include('front.movies.reviews')
                                        {{$reviews->links()}}
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
            // prevent reloading page when paginate
            $('.pagination .page-link').on('click', function (e) {
                e.preventDefault();
                $('#load a').css('color', '#dfecf6');
                $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

                var url = $(this).attr('href');
                getReviews(url);
                // window.history.pushState("", "", url);
            });

            function getReviews(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    $('#loading').html(data);
                }).fail(function () {
                    alert('Reviews could not be loaded.');
                });
            }

            $('body').delegate('.comment-menue .delete-comment', 'click', function (e) {
                e.preventDefault();
                if (confirm('Are You Sure?')) {
                    var id = $(this).attr('id');
                    var url = '{{url('reviews')}}/' + id;
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
                            if (results.review) {
                                $('#comment-text-' + id).html(results.review);

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

            $('#addReview').on('submit', function (e) {
                e.preventDefault();
                var form = $(this);
                var data = $(this).serialize();
                var url = $(this).attr('action');
                var post = $(this).attr('method');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    dataType: 'json'
                })
                    .done(function (data) {
                        $('#addReview').each(function () {
                            this.reset();
                        });
                        $('#reviews').prepend(data.review);
                    })
                    .fail(function (data) {
                        $.each(results.responseJSON.errors, function (index, val) {
                            toastr.info(val)
                        });
                        $('#addReview').each(function () {
                            this.reset();
                        });
                    })
            });
        });
    </script>
@endsection