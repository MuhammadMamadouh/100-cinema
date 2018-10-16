@extends('layouts.front')

@section('content')

    <div id="myslide" class="carousel slide hidden-xs" data-ride="carousel">

        <ol class="carousel-indicators">
            <li data-target="#myslide" data-slide-to="0" class="active"></li>
            <li data-target="#myslide" data-slide-to="1"></li>
            <li data-target="#myslide" data-slide-to="2"></li>
            {{--<li data-target="#myslide" data-slide-to="3"></li>--}}
        </ol>

        <div class="carousel-inner">
            @foreach($movies as $movie)
                <div class="item ">
                    <img class="d-block w-100" src="{{\Storage::url($movie->poster)}}" width="1920"
                         height="600" alt="Pic 1">
                    <div class="carousel-caption hidden-xs">
                        <h2 class="h1">{{$movie->title}}</h2>
                        <p class="lead"></p>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="left carousel-control" href="#myslide" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>

        <a class="right carousel-control" href="#myslide" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
    <!-- End Carousel -->

@endsection
@push('js')
    <script type="text/javascript">
        $('.item:first-of-type').addClass('active')
    </script>
@endpush