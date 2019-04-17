@extends('layouts.page')
<!-- Main content -->
@section('title', strtoupper($category->name). ' Movies -100 Cinema')
@section('content')
    <div class="latest-articles">
        <h3 class="tittle"><i class="glyphicon glyphicon-file"></i>{{strtoupper($category->name)}} Movies -100 Cinema
        </h3>
        <div class="world-news-grids">
            @foreach($movies as $movie)

                <div class="col-md-3">
                    <a class="play-icon popup-with-zoom-anim" href="#"><img
                                src="{{image_url($movie->poster)}}" class="img-thumbnail"
                                title="{{$movie->title}}"/></a>

                    <a class="button" href='{{url("movie/$movie->id")}}'>{{$movie->title}}</a>
                </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
@endsection