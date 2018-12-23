@extends('layouts.blog')
<!-- Main content -->
@section('content')
    <div class="main_container col-md-9">
        <div class="content_inner_bg row m0">
            <section class="portfolio_area pad" id="portfolio">
                <div class="main_title">
                    <h2 class="pull-left">Persons with Job: <span>{{$job->name}}</span></h2>
                </div>

                <div class="row">
                    <div class="portfolio_list_inner">
                        @foreach($casts as $cast)
                            <div class="col-md-4 photo marketing">
                                <div class="portfolio_item">
                                    <div class="portfolio_img">
                                        <img src="{{\Storage::url($cast->image)}}" alt="{{$cast->name}}">
                                    </div>
                                    <div class="portfolio_title">
                                        <a href="{{url("crew/$cast->id")}}"><h4>{{$cast->name}}</h4></a>
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