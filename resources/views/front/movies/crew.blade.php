@extends('layouts.front')
<!-- Main content -->
@section('title',  '-100Cinema')
@section('content')
    <div class="main_container">
        <div class="content_inner_bg row m0">
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
                                            {{--<h5>{{$movie->job_name}}</h5>--}}
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

        </div>
    </div>
@endsection