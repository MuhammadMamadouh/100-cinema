@extends('adminlte::page')
<!-- Main content -->
@section('content')
    {{--<div class="container">--}}
    {{--<div class="row my-2">--}}
    {{--<div class="col-lg-8 order-lg-2">--}}
    {{--<ul class="nav nav-tabs">--}}
    {{--<li class="nav-item">--}}
    {{--<a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>--}}
    {{--</li>--}}
    {{--<li class="nav-item">--}}
    {{--<a href="" data-target="#messages" data-toggle="tab" class="nav-link">Movies</a>--}}
    {{--</li>--}}
    {{--<li class="nav-item">--}}
    {{--<a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--<div class="tab-content py-4">--}}
    {{--<div class="tab-pane active" id="profile">--}}
    {{--<h5 class="mb-3">User Profile</h5>--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-8">--}}
    {{--<h6>Jobs</h6>--}}
    {{--<p>--}}
    {{--@if(isset($jobs))--}}
    {{--@foreach($jobs as $job)--}}
    {{--<a href="#">{{$job->job_name}}</a>--}}
    {{--@endforeach--}}
    {{--@else--}}
    {{--you have not added his jobs--}}
    {{--@endif--}}
    {{--</p>--}}
    {{--<h6>Date of birth</h6>--}}
    {{--<p>--}}
    {{--@if(isset($cast->date_of_birth))--}}
    {{--{{$cast->date_of_birth}}--}}
    {{--@else--}}
    {{--you have not added his birthday--}}
    {{--@endif--}}
    {{--</p>--}}
    {{--<h6>About</h6>--}}
    {{--<p>--}}
    {{--{{$cast->about}}--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--<div class="col-md-6">--}}
    {{--<h6>Recent badges</h6>--}}
    {{--<a href="#" class="badge badge-dark badge-pill">html5</a>--}}
    {{--<a href="#" class="badge badge-dark badge-pill">react</a>--}}
    {{--<a href="#" class="badge badge-dark badge-pill">codeply</a>--}}
    {{--<a href="#" class="badge badge-dark badge-pill">angularjs</a>--}}
    {{--<a href="#" class="badge badge-dark badge-pill">css3</a>--}}
    {{--<a href="#" class="badge badge-dark badge-pill">jquery</a>--}}
    {{--<a href="#" class="badge badge-dark badge-pill">bootstrap</a>--}}
    {{--<a href="#" class="badge badge-dark badge-pill">responsive-design</a>--}}
    {{--<hr>--}}
    {{--<span class="badge badge-primary"><i class="fa fa-user"></i> 900 Followers</span>--}}
    {{--<span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>--}}
    {{--<span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>--}}
    {{--</div>--}}
    {{--<div class="col-md-12">--}}
    {{--<h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent--}}
    {{--Activity</h5>--}}
    {{--<table class="table table-sm table-hover table-striped">--}}
    {{--<tbody>--}}
    {{--<tr>--}}
    {{--<td>--}}
    {{--<strong>Abby</strong> joined ACME Project Team in--}}
    {{--<strong>`Collaboration`</strong>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>--}}
    {{--<strong>Gary</strong> deleted My Board1 in <strong>`Discussions`</strong>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>--}}
    {{--<strong>Kensington</strong> deleted MyBoard3 in--}}
    {{--<strong>`Discussions`</strong>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>--}}
    {{--<strong>John</strong> deleted My Board1 in <strong>`Discussions`</strong>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>--}}
    {{--<strong>Skell</strong> deleted his post Look at Why this is.. in <strong>`Discussions`</strong>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--</tbody>--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<!--/row-->--}}
    {{--</div>--}}
    {{--<div class="tab-pane" id="messages">--}}
    {{--<div class="alert alert-info alert-dismissable">--}}
    {{--<a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>.--}}
    {{--Use this to show important messages to the user.--}}
    {{--</div>--}}
    {{--<table class="table table-hover table-striped">--}}
    {{--<tbody>--}}
    {{--<tr>--}}
    {{--<td>--}}
    {{--<span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link to--}}
    {{--the latest summary report from the..--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>--}}
    {{--<span class="float-right font-weight-bold">Yesterday</span> There has been a request--}}
    {{--on your account since that was..--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>--}}
    {{--<span class="float-right font-weight-bold">9/10</span> Porttitor vitae ultrices--}}
    {{--quis, dapibus id dolor. Morbi venenatis lacinia rhoncus.--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>--}}
    {{--<span class="float-right font-weight-bold">9/4</span> Vestibulum tincidunt--}}
    {{--ullamcorper eros eget luctus.--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
    {{--<td>--}}
    {{--<span class="float-right font-weight-bold">9/4</span> Maxamillion ais the fix for--}}
    {{--tibulum tincidunt ullamcorper eros.--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--</tbody>--}}
    {{--</table>--}}
    {{--</div>--}}
    {{--<div class="tab-pane" id="edit">--}}
    {{--<form role="form">--}}
    {{--<div class="form-group row">--}}
    {{--<label class="col-lg-3 col-form-label form-control-label">First name</label>--}}
    {{--<div class="col-lg-9">--}}
    {{--<input class="form-control" type="text" value="Jane">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group row">--}}
    {{--<label class="col-lg-3 col-form-label form-control-label">Last name</label>--}}
    {{--<div class="col-lg-9">--}}
    {{--<input class="form-control" type="text" value="Bishop">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group row">--}}
    {{--<label class="col-lg-3 col-form-label form-control-label">Email</label>--}}
    {{--<div class="col-lg-9">--}}
    {{--<input class="form-control" type="email" value="email@gmail.com">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group row">--}}
    {{--<label class="col-lg-3 col-form-label form-control-label">Company</label>--}}
    {{--<div class="col-lg-9">--}}
    {{--<input class="form-control" type="text" value="">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group row">--}}
    {{--<label class="col-lg-3 col-form-label form-control-label">Website</label>--}}
    {{--<div class="col-lg-9">--}}
    {{--<input class="form-control" type="url" value="">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group row">--}}
    {{--<label class="col-lg-3 col-form-label form-control-label">Address</label>--}}
    {{--<div class="col-lg-9">--}}
    {{--<input class="form-control" type="text" value="" placeholder="Street">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group row">--}}
    {{--<label class="col-lg-3 col-form-label form-control-label"></label>--}}
    {{--<div class="col-lg-6">--}}
    {{--<input class="form-control" type="text" value="" placeholder="City">--}}
    {{--</div>--}}
    {{--<div class="col-lg-3">--}}
    {{--<input class="form-control" type="text" value="" placeholder="State">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group row">--}}
    {{--<label class="col-lg-3 col-form-label form-control-label">Time Zone</label>--}}
    {{--<div class="col-lg-9">--}}
    {{--<select id="user_time_zone" class="form-control" size="0">--}}
    {{--<option value="Hawaii">(GMT-10:00) Hawaii</option>--}}
    {{--<option value="Alaska">(GMT-09:00) Alaska</option>--}}
    {{--<option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US--}}
    {{--&amp; Canada)--}}
    {{--</option>--}}
    {{--<option value="Arizona">(GMT-07:00) Arizona</option>--}}
    {{--<option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US--}}
    {{--&amp; Canada)--}}
    {{--</option>--}}
    {{--<option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00)--}}
    {{--Central Time (US &amp; Canada)--}}
    {{--</option>--}}
    {{--<option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US--}}
    {{--&amp; Canada)--}}
    {{--</option>--}}
    {{--<option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>--}}
    {{--</select>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group row">--}}
    {{--<label class="col-lg-3 col-form-label form-control-label">Username</label>--}}
    {{--<div class="col-lg-9">--}}
    {{--<input class="form-control" type="text" value="janeuser">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group row">--}}
    {{--<label class="col-lg-3 col-form-label form-control-label">Password</label>--}}
    {{--<div class="col-lg-9">--}}
    {{--<input class="form-control" type="password" value="11111122333">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group row">--}}
    {{--<label class="col-lg-3 col-form-label form-control-label">Confirm password</label>--}}
    {{--<div class="col-lg-9">--}}
    {{--<input class="form-control" type="password" value="11111122333">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="form-group row">--}}
    {{--<label class="col-lg-3 col-form-label form-control-label"></label>--}}
    {{--<div class="col-lg-9">--}}
    {{--<input type="reset" class="btn btn-secondary" value="Cancel">--}}
    {{--<input type="button" class="btn btn-primary" value="Save Changes">--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-lg-4 order-lg-1 text-center">--}}
    {{--<img src="{{\Storage::url($cast->image)}}" style="height: 150px" width="150px"--}}
    {{--class="mx-auto img-fluid img-circle d-block" alt="avatar">--}}
    {{--<h6 class="mt-2">Upload a different photo</h6>--}}
    {{--<label class="custom-file">--}}
    {{--<input type="file" id="file" class="custom-file-input">--}}
    {{--<span class="custom-file-control">Choose file</span>--}}
    {{--</label>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="container main_container">
        <div class="content_inner_bg row m0">
            <section class="about_person_area pad" id="about">
                <div class="row">
                    <div class="col-md-5">
                        <div class="person_img">
                            <img src="{{\Storage::url($cast->image)}}" alt="{{$cast->name}}">
                            {{--<a class="download_btn" href="#"><span>Download Resume</span></a>--}}
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row person_details">
                            <h3><span>{{$cast->name}}</span></h3>
                            <h4>
                                @if(isset($jobs))
                                    @foreach($jobs as $job)
                                        <a href="#">{{$job->job_name}}</a>
                                    @endforeach
                                @else
                                    you have not added his jobs
                                @endif
                            </h4>
                            <p>{{$cast->about}}</p>
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
                            <ul class="social_icon">
                                <li><a href="{{$cast->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$cast->twitter}}" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$cast->instgram}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
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
                                        <a href="#"><h4>{{$movie->title}}</h4></a>
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
                    <h2 class="pull-left">Reviews</h2>
                </div>
                <div class="row">
                    <div class="portfolio_list_inner">

                        @foreach($movies as $movie)
                            <div class="col-md-4 photo marketing">
                                {{--<div class="portfolio_item">--}}
                                    {{--<div class="portfolio_img">--}}
                                        {{--<img src="{{\Storage::url($movie->poster)}}" alt="{{$movie->title}}">--}}
                                    {{--</div>--}}
                                    {{--<div class="portfolio_title">--}}
                                        {{--<a href="#"><h4>{{$movie->title}}</h4></a>--}}
                                        {{--<h5>{{$movie->year}}</h5>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection