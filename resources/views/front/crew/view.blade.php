@extends('layouts.blog')
@section('title', $cast->name . '-' . config('app.name'))
<!-- Main content -->
@section('content')
    <div class="main_container  col-md-9">
        <div class="content_inner_bg row m0">
            <section class="about_person_area pad" id="about">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="person_img">
                            <img src="{{\Storage::url($cast->image)}}" alt="{{$cast->name}}">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="row person_details">
                            <h3><span>{{$cast->name}}</span></h3>
                            work as:
                            <h4>
                                @if(count($jobs) > 0)
                                    @foreach($jobs as $job)
                                        <a href="{{url("crew/job/$job->job_name")}}">{{$job->job_name}}</a>
                                    @endforeach
                                @else
                                    <p>we are adding adding his information soon</p>
                                @endif
                            </h4>
                            <div class="person_information">
                                <ul>
                                    <li><a href="#">Birth date</a></li>
                                    <li><a href="#">Country</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#">{{$cast->date_of_birth}}</a></li>
                                    <li><a href="#">{{$cast->country}}</a></li>
                                </ul>
                            </div>
                            <p>{{$cast->about}}</p>

                            <ul class="social_icon">
                                @if($cast->facebook)
                                    <li><a href="{{$cast->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                    </li>
                                @endif
                                @if($cast->twitter)
                                    <li><a href="{{$cast->twitter}}" target="_blank"><i
                                                    class="fa fa-twitter"></i></a></li>
                                @endif
                                @if($cast->instgram)
                                    <li><a href="{{$cast->instgram}}" target="_blank"><i
                                                    class="fa fa-instagram"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="portfolio_area pad" id="portfolio">
                <div class="main_title">
                    <h2 class="pull-left">Movies</h2>
                </div>

                <div class="row">
                    <div class="portfolio_list_inner">
                        @foreach($movies as $movie)
                            <div class="col-md-4 photo marketing">
                                <div class="portfolio_item">
                                    <div class="portfolio_img">
                                        <img src="{{\Storage::url($movie->poster)}}" alt="{{$movie->title}}">
                                    </div>
                                    <div class="portfolio_title">
                                        <a href="{{url("movie/$movie->id")}}"><h4>{{$movie->title}}</h4></a>
                                        <h5>{{$movie->year}}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="portfolio_area pad" id="portfolio">
                <div class="main_title">
                    <h2 class="pull-left"><a href="{{URL::current()}}/media">Media</a></h2>
                </div>

                <div class="row">
                    <div class="portfolio_list_inner">
                        @foreach($images as $image)
                            <div class="col-md-4 col-sm-2 photo marketing">
                                <div class="portfolio_item">
                                    <div class="portfolio_img">
                                        <img src="{{\Storage::url($image->path)}}" alt="{{$cast->name}}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection