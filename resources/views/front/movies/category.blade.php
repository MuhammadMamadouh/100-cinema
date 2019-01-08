@extends('layouts.blog')
<!-- Main content -->
@section('title', strtoupper($category->name). ' Movies -100 Cinema')
@section('content')
    <div class="main_container col-md-9">
        <div class="content_inner_bg row m0">
            <section class="portfolio_area pad" id="portfolio">
                <div class="main_title">
                    <h2 class="pull-left">{{$category->name}} Movies</h2>
                </div>
                @if(isset($movies))
                    <div class="row">
                        <div class="portfolio_list_inner">
                            @foreach($movies as $movie)
                                <div class="col-md-4 col-sm-4 photo marketing">
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
                @else
                    <div class="portfolio_title">
                        <h5>You have not added any one of crew yet</h5>
                    </div>
                @endif
            </section>
        </div>
    </div>
@endsection