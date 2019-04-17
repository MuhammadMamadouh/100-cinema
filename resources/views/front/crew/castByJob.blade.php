@extends('layouts.page')
<!-- Main content -->
@section('content')

    <div class="latest-articles">
        <h3 class="tittle">Job: {{ strtoupper($job->name) }}</h3>
        <div class="world-news-grids">
            @foreach($casts as $cast)
                <div class="col-md-3">
                    <a class="play-icon popup-with-zoom-anim"
                       href="#"><img src="{{image_url($cast->image)}}" class="img-thumbnail"
                                     title="{{$cast->name}}"/></a>

                    <a class="button play-icon popup-with-zoom-anim"
                       href="{{url("crew/$cast->id")}}">{{$cast->name}}</a>
                </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>

@endsection