@extends('layouts.blog')
<!-- Main content -->
@section('title',  '-100Cinema')
@section('content')
    <div class="main_container col-md-9">
        <div class="content_inner_bg row m0">
            <section class="portfolio_area pad" id="portfolio">
                <div class="main_title">
                    <h3 class="pull-left">Crew</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Job</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($crew as $person)
                            <tr>
                                <td>
                                    <img src="{{\Storage::url($person->image)}}" alt="{{$person->name}}"
                                         style="width: 50px; height:50px;">
                                </td>
                                <td><a href="{{url("crew/$person->id")}}"><h4>{{$person->name}}</h4></a></td>
                                <td>{{$person->job_name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endsection