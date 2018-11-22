@extends('layouts.front')
<!-- Main content -->
@section('title', strtoupper($movie->title) . '-100Cinema')
@section('content')
    <div class="main_container">
        <div class="content_inner_bg row m0">
            <section class="about_person_area pad" id="about">
                <div class="row">
                    <div class="col-md-3">
                        <div class="person_img">
                            <img src="{{\Storage::url($movie->poster)}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
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
                            @auth
                                @auth('admin')
                                    <button type="button" class="btn btn-info pull-right" data-toggle="modal"
                                            data-target="#edit_category">
                                        Edit Categories
                                    </button>
                                    <div class="modal fade" id="edit_category" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-style-5">
                                                        <form id="ins_method" class="form-horizontal" method="POST"
                                                              action="{{route('addCategory')}}">
                                                            {{ csrf_field() }}

                                                            <input name="movie_id" type="hidden" value="{{$movie->id}}">

                                                            <fieldset>
                                                                <legend><span class="number"></span> Movie Categories:
                                                                </legend>
                                                                @foreach($categories as $category)

                                                                    <label class="container">{{$category->name}}
                                                                        <input name="categotries[]"
                                                                               @foreach($movieCategories as $movieCategory)
                                                                               @if($category->id === $movieCategory->id) checked
                                                                               @endif
                                                                               @endforeach
                                                                               value="{{$category->id}}"
                                                                               type="checkbox">
                                                                        <span class="checkmark"></span>
                                                                    </label>

                                                                @endforeach
                                                            </fieldset>
                                                            <button type="submit" class="btn btn-primary">Submit
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                            @endauth

                            <div class="person_information">
                                <p class="lead">{{$movie->story}}</p>
                                <ul>
                                    <li><a href="#">Playtime: {{$movie->playtime}}</a></li>
                                    <li><a href="#">Country: {{$movie->country}}</a></li>
                                    <li><a href="#">Rate</a></li>
                                    <li><a href="#">language</a></li>
                                    <li><a href="#">year</a></li>
                                    <li><a href="#">Directors</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#">{{$movie->rate}}</a></li>
                                    <li><a href="#">{{$movie->language}}</a></li>
                                    <li><a href="#">{{$movie->year}}</a></li>
                                    @foreach($directors as $director )
                                        <li><a href="{{url("/admin/cast/$director->cast_id")}}">{{$director->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <ul class="social_icon">
                                <li><a href="{{$movie->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="{{$movie->twitter}}" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$movie->instgram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li><a href="{{$movie->twitter}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="rating-block">
                            <h4>Average user rating</h4>
                            <h2 class="bold padding-bottom-7">{{$avgRating}}
                                <small>/ 5</small>
                            </h2>
                            <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-default btn-grey btn-sm" aria-label="Left Align">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <section class="news_area pad" id="news">
                <div class="main_title">
                    <h2 class="pull-left">Trailer</h2>
                </div>
                <div class="news_inner_area">
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
                    <h2 class="pull-left">Crew</h2>
                    @auth('admin')
                        <h2 class="pull-right"><a href="{{URL::current()}}/add_crew">AddCrew</a></h2>
                    @endauth
                </div>
                @if(isset($actors))
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
                                            <h5>{{$movie->job_name}}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="portfolio_title">
                        <a href="{{URL::current()}}/add_crew"> add crew<h4></h4></a>
                        <h5>You have not added any one of crew yet</h5>
                    </div>
                @endif
            </section>

            <section class="portfolio_area pad" id="portfolio">
                <div class="main_title">
                    <h2 class="pull-left">Reviews</h2>
                </div>
                <div class="comments">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <section class="comment-list">
                                    @auth
                                        <p id="msg" style="display: none"></p>
                                        <article class="row">
                                            <div class="col-md-2 col-sm-2 hidden-xs">
                                                <figure class="thumbnail">
                                                    <img class="img-responsive"
                                                         src="{{\Storage::url(auth()->user()->image)}}"
                                                         alt="amanda cerny">
                                                    <figcaption class="text-center">{{\Auth::user()->name}}</figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-10 col-sm-10">
                                                <div class="panel panel-default arrow left">
                                                    <div class="panel-body">
                                                        <div class="comment-post">
                                                            {!! Form::open(['url' => route('addReview'), 'method'=> 'post', 'id'=> 'add-comment']) !!}
                                                            <input type="hidden" name="movie" value="{{$movie->id}}">
                                                            <input type="hidden" name="user"
                                                                   value="{{\Auth::user()->id}}">
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
                                                                    class="btn btn-success green pull-right">
                                                                <i class="fa fa-share"></i> Share
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
                                                                <a href="{{url('/login')}}">Sign in </a>to can wrote
                                                                your review :)
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    @endguest
                                    <div id="reviews"></div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            $('#reviews').load('<?php echo url("/movie/$movie->id/reviews")?>');
            $('#add-comment').on('submit', function (e) {
                e.preventDefault();
                $('#msg').show();
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
                        $('#commentBox').text('');
                        $('#msg').html('Admin has been added successfully').fadeOut(2000);
                        $('#reviews').load('<?php echo url("/movie/$movie->id/reviews")?>');
                    })
                    .fail(function (data) {
                        $('#commentBox').text('');
                        $('#msg').text(data.responseText).fadeOut(2000);

                        $('#reviews').load('<?php echo url("/movie/$movie->id/reviews")?>');
                    })
            });
        });

        $("#input-id").rating();


    </script>
@endpush