@extends('layouts.front')
<!-- Main content -->
@section('content')
    <div class="main_container">
        <div class="content_inner_bg row m0">
            <section class="about_person_area pad" id="about">
                <div class="row">
                    <div class="col-md-5">
                        <div class="person_img">
                            <img src="{{\Storage::url($cast->image)}}" alt="{{$cast->name}}">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row person_details">
                            <h3><span>{{$cast->name}}</span></h3>
                            <h4>
                                @if(isset($jobs))
                                    @foreach($jobs as $job)
                                        <a href="{{url("crew/job/$job->job_name")}}">{{$job->job_name}}</a>
                                    @endforeach
                                @else
                                    you have not added his jobs
                                @endif
                            </h4>
                            <div class="person_information">
                                <ul>
                                    <li><a href="#">Birth date</a></li>
                                    <li><a href="#">Country</a></li>
                                    <li><a href="#">Address</a></li>
                                    <li><a href="#">Phone</a></li>
                                    <li><a href="#">Skype</a></li>
                                    <li><a href="#">Email</a></li>
                                    <li><a href="#">Website</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#">{{$cast->date_of_birth}}</a></li>
                                    <li><a href="#">{{$cast->country}}</a></li>
                                    <li><a href="#">23 High Hope Blvd, Some City, Some Country</a></li>
                                    <li><a href="#">+88 01911854378</a></li>
                                    <li><a href="#">sumon.backpiper</a></li>
                                    <li><a href="#">backpiper.com@gmail.com</a></li>
                                    <li><a href="www.topsmmpanel.com">www.topsmmpanel.com</a></li>
                                </ul>
                            </div>
                            <p>{{$cast->about}}</p>

                            <ul class="social_icon">
                                <li><a href="{{$cast->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="{{$cast->twitter}}" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$cast->instgram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li><a href="{{$cast->twitter}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="portfolio_area pad" id="portfolio">
                <div class="main_title">
                    <h2 class="pull-left">Movies</h2>
                </div>
                {{--<div class="porfolio_menu">--}}
                {{--<ul class="causes_filter">--}}
                {{--<li class="active" data-filter="*"><a href="">All</a></li>--}}
                {{--<li data-filter=".photo"><a href="">Photography</a></li>--}}
                {{--<li data-filter=".design"><a href="">Design</a></li>--}}
                {{--<li data-filter=".marketing"><a href="">Marketing</a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}


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
                    <h2 class="pull-left">Media</h2>
                    @auth('admin')
                        <a href="{{url("admin/cast/$cast->id/add-images")}}" class="btn btn-danger">add photos</a>
                    @endauth
                </div>

                <div class="row">
                    <div class="portfolio_list_inner">
                        @foreach($images as $image)
                            <div class="col-md-4 photo marketing">
                                <div class="portfolio_item">
                                    <div class="portfolio_img">
                                        <img src="{{\Storage::url($image->path)}}" alt="{{$cast->name}}">
                                    </div>
                                    <div class="portfolio_title">
                                        {{--<a href="#"><h4>{{$movie->title}}</h4></a>--}}
                                        {{--<h5>{{$movie->year}}</h5>--}}
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