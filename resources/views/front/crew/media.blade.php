@extends('layouts.blog')
<!-- Main content -->
@section('content')
    <div class="main_container  col-md-9">
        <div class="content_inner_bg row m0">
            <section class="about_person_area pad" id="about">
                <div class="row">
                    <div class="col-md-5">
                        <div class="person_img">
                            <img src="{{\Storage::url($cast->image)}}" alt="{{$cast->name}}">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row person_details">
                            <h3><span>{{$cast->name}}</span></h3>

                            <div class="person_information">
                                <ul>
                                    <li><a href="#">Birth date</a></li>
                                    <li><a href="#">Country</a></li>
                                    <li><a href="#">Website</a></li>
                                </ul>
                                <ul>
                                    <li><a href="#">{{$cast->date_of_birth}}</a></li>
                                    <li><a href="#">{{$cast->country}}</a></li>
                                    <li><a href="www.topsmmpanel.com">www.topsmmpanel.com</a></li>
                                </ul>
                            </div>
                            <p>{{$cast->about}}</p>

                            <ul class="social_icon">
                                <li><a href="{{$cast->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="{{$cast->twitter}}" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                                <li><a href="{{$cast->instgram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li><a href="{{$cast->twitter}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="portfolio_area pad" id="media">
                <div class="main_title">
                    <h2 class="pull-left">Media</h2>
                </div>
                <div id="main_area">
                    <!-- Slider -->
                    <div class="row">
                        <div class="col-sm-6" id="slider-thumbs">
                            <!-- Bottom switcher of slider -->
                            <ul class="hide-bullets">
                                @for($image=0; $image<count($media); $image++)
                                    <li class="col-sm-3">
                                        <a class="thumbnail" id="carousel-selector-{{$image}}">
                                            <img src="{{\Storage::url($media[$image]->path)}}"
                                                 alt="{{$cast->name}}">
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-xs-12" id="slider">
                                <!-- Top part of the slider -->
                                <div class="row">
                                    <div class="col-sm-12" id="carousel-bounding-box">
                                        <div class="carousel slide" id="myCarousel">
                                            <!-- Carousel items -->
                                            <div class="carousel-inner">
                                                @for($image=0; $image<count($media); $image++)
                                                    <div class="item" data-slide-number="{{$image}}" id="{{$image}}">
                                                        <img src="{{\Storage::url($media[$image]->path)}}"
                                                             alt="{{$cast->name}}">
                                                    </div>
                                                @endfor

                                            </div>
                                            <!-- Carousel nav -->
                                            <a class="left carousel-control" href="#myCarousel" role="button"
                                               data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                            </a>
                                            <a class="right carousel-control" href="#myCarousel" role="button"
                                               data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/Slider-->
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.item:first-of-type').addClass('active');
            $('#myCarousel').carousel({
                interval: 5000
            });

            //Handles the carousel thumbnails
            $('[id^=carousel-selector-]').click(function () {
                var id_selector = $(this).attr("id");
                try {
                    var id = /-(\d+)$/.exec(id_selector)[1];
                    console.log(id_selector, id);
                    jQuery('#myCarousel').carousel(parseInt(id));
                } catch (e) {
                    console.log('Regex failed!', e);
                }
            });
            // When the carousel slides, auto update the text
            $('#myCarousel').on('slid.bs.carousel', function (e) {
                var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-' + id).html());
            });
        });
    </script>
@endsection