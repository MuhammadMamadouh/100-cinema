@extends('layouts.blog')
<!-- Main content -->
@section('title',  '-100Cinema')
@section('content')
    <div class="main_container col-md-9">
        <div class="content_inner_bg row m0">
            <section class="portfolio_area pad" id="portfolio">
                <div class="main_title">
                    <h3 class="">Movies with {{request()->segment(2)}}: {{request()->segment(3)}}</h3>

                </div>
                @if(count($movies)>0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>details</th>
                                <th>crew</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($movies as $movie)
                                <tr>
                                    <td>
                                        <img src="{{\Storage::url($movie->poster)}}" alt="{{$movie->title}}"
                                             style="width: 50px; height:50px;">
                                    </td>
                                    <td><a href="{{url("movie/$movie->id")}}"><h4>{{$movie->title}}</h4></a></td>
                                    <td>{{read_more($movie->story, 20)}}...</td>
                                    <td>
                                        @foreach($movie->getCrewJob() as $person)
                                            <a href="{{url("crew/$person->id")}}">{{$person->name}}</a> ,
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <h2 class="text-center card-header-pills">Information you searched for is not exist</h2>
                            @endif
                            </tbody>
                        </table>
                    </div>
            </section>
        </div>
    </div>
@endsection