@extends('layouts.page')
@section('title', $cast->name . '-' . config('app.name'))
@section('css')
    <link href="{{asset('public/css/post-style.css')}}" rel="stylesheet" type="text/css" media="all"/>
@endsection
@section('content')
    <div class="main-content">
        <div class="container">
            <div class="mag-inner">
                <div class="col-md-8 mag-innert-left">
                    <!--/business-->
                    <div class="live-market">
                        <h3 class="tittle"><i class="glyphicon glyphicon-user"></i><span>Bio</span></h3>
                        <div class="bull">
                            <a href="#"><img src="{{image_url($cast->image)}}" alt=""></a>
                        </div>
                        <div class="bull-text">
                            <a class="bull1">{{$cast->name}}</a>
                            <p>
                                @forelse($cast->jobs as $job)
                                    <a href="{{url("crew/job/$job->name")}}">{{$job->name}}</a>
                                @empty
                                    we are adding adding his information soon
                                @endforelse
                            </p>
                            <ul>
                                <li><a href="#">{{$cast->date_of_birth}}, {{$cast->country}}</a></li>
                                <li>{{$cast->about}}</li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <!--//business-->
                    <div class="gallery">
                        <div class="main-title-head">
                            <h3 class="tittle"><i class="glyphicon glyphicon-picture"></i>Gallery</h3>
                        </div>
                        <div class="gallery-images">
                            <div class="course_demo1">
                                <ul id="flexiselDemo1">
                                    @foreach($images as $image)
                                        <li>
                                            <a href="#"><img src="{{image_url($image->path)}}" alt=""/></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <script type="text/javascript">
                                $(window).load(function () {
                                    $("#flexiselDemo1").flexisel({
                                        visibleItems: 3,
                                        animationSpeed: 1000,
                                        autoPlay: true,
                                        autoPlaySpeed: 3000,
                                        pauseOnHover: true,
                                        enableResponsiveBreakpoints: true,
                                        responsiveBreakpoints: {
                                            portrait: {
                                                changePoint: 480,
                                                visibleItems: 2
                                            },
                                            landscape: {
                                                changePoint: 640,
                                                visibleItems: 2
                                            },
                                            tablet: {
                                                changePoint: 768,
                                                visibleItems: 3
                                            }
                                        }
                                    });

                                });
                            </script>
                        </div>

                        <a class="more" href="{{route('crew.media', $cast->id)}}">More +</a>

                    </div>
                    <!--/start-Technology-->

                    <div class="clearfix"></div>
                </div>
                <!--//end-Technology-->

            </div>
            <div class="clearfix"></div>
        </div>
        <!--//end-mag-inner-->
        <!--/mag-bottom-->
        <div class="mag-bottom">
            <h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i>Movies</h3>
            <div class="grid">
                @foreach($cast->movies()->limit(3)->get() as $movie)
                    <div class="col-md-4 m-b">
                        <figure class="effect-layla">
                            <a href="#"><img src="{{image_url($movie->poster)}}" alt="img25"/></a>
                            <figcaption>
                                <h4><span></span></h4>
                            </figcaption>
                        </figure>
                        <div class="m-b-text">
                            <a href="#" class="wd">{{strtoupper($movie->title)}}</a>
                            <p>{{read_more($movie->story, 20)}}...</p>
                            <a class="read" href="{{url("movie/$movie->id")}}">Read More</a>
                        </div>
                    </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
        <!--//mag-bottom-->
    </div>
    <!--//end-main-->
    <!--/start-footer-section-->
    <div class="footer-section">
        <div class="container">
            <div class="footer-grids">
                <div class="col-md-4 footer-grid">
                    <h4>EDITOR PICKS</h4>
                    <div class="editor-pics">
                        <div class="col-md-3 item-pic">
                            <img src="images/f1.jpg" class="img-responsive" alt=""/>

                        </div>
                        <div class="col-md-9 item-details">
                            <h5 class="inner"><a href="#">More Than 120 ER Visits Linked To Synthetic WordPress In
                                    NYC...</a></h5>
                            <div class="td-post-date">Feb 22, 2015</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="editor-pics">
                        <div class="col-md-3 item-pic">
                            <img src="images/f2.jpg" class="img-responsive" alt=""/>

                        </div>
                        <div class="col-md-9 item-details">
                            <h5 class="inner"><a href="#">More Than 120 ER Visits Linked To Synthetic WordPress In
                                    NYC...</a></h5>
                            <div class="td-post-date">Feb 22, 2015</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="editor-pics">
                        <div class="col-md-3 item-pic">
                            <img src="images/f3.jpg" class="img-responsive" alt=""/>

                        </div>
                        <div class="col-md-9 item-details">
                            <h5 class="inner"><a href="#">More Than 120 ER Visits Linked To Synthetic WordPress In
                                    NYC...</a></h5>
                            <div class="td-post-date">Feb 22, 2015</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 footer-grid">
                    <h4>POPULAR POSTS</h4>
                    <div class="editor-pics">
                        <div class="col-md-3 item-pic">
                            <img src="images/f4.jpg" class="img-responsive" alt=""/>

                        </div>
                        <div class="col-md-9 item-details">
                            <h5 class="inner"><a href="#">More Than 120 ER Visits Linked To Synthetic WordPress In
                                    NYC...</a></h5>
                            <div class="td-post-date">Feb 22, 2015</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="editor-pics">
                        <div class="col-md-3 item-pic">
                            <img src="images/f3.jpg" class="img-responsive" alt=""/>

                        </div>
                        <div class="col-md-9 item-details">
                            <h5 class="inner"><a href="#">More Than 120 ER Visits Linked To Synthetic WordPress In
                                    NYC...</a></h5>
                            <div class="td-post-date">Feb 22, 2015</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="editor-pics">
                        <div class="col-md-3 item-pic">
                            <img src="images/f2.jpg" class="img-responsive" alt=""/>

                        </div>
                        <div class="col-md-9 item-details">
                            <h5 class="inner"><a href="#">More Than 120 ER Visits Linked To Synthetic WordPress In
                                    NYC...</a></h5>
                            <div class="td-post-date">Feb 22, 2015</div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-4 footer-grid">
                    <h4>POPULAR CATEGORY</h4>
                    <ul class="td-pb-padding-side">
                        <li><a href="#">Architecture<span class="td-cat-no">15</span></a></li>
                        <li><a href="#">New look 2015<span class="td-cat-no">14</span></a></li>
                        <li><a href="#">Gadgets<span class="td-cat-no">14</span></a></li>
                        <li><a href="#">Mobile and Phones<span class="td-cat-no">14</span></a></li>
                        <li><a href="#">Recipes<span class="td-cat-no">14</span></a></li>
                        <li><a href="#">Decorating<span class="td-cat-no">14</span></a></li>
                        <li><a href="#">Interiors<span class="td-cat-no">14</span></a></li>
                        <li><a href="#">Street fashion<span class="td-cat-no">13</span></a></li>
                        <li><a href="#">Vogue<span class="td-cat-no">13</span></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--//end-footer-section-->
    <!--/start-copyright-section-->
@endsection
@section('js')
    <script type="text/javascript">
        $(window).load(function () {
            $("#flexiselDemo1").flexisel({
                visibleItems: 3,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 2
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 2
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 3
                    }
                }
            });

        });
    </script>
@endsection
