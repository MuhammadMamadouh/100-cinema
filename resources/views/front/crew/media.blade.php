@extends('layouts.page')
@section('title', $cast->name . '-' . config('app.name'))
@section('content')
    <div class="main_container  col-md-9">
        <div class="content_inner_bg ">
            <section class="about_person_area pad" id="about">
                <div class="person_details">
                    <h3><span><a href="{{url("crew/$cast->id")}}">{{$cast->name}}</a></span> Media</h3>
                </div>
                <div id="main_area">
                    <!-- Slider -->
                    <div class="row">
                        <div class="col-sm-5" id="slider-thumbs">
                            <!-- Bottom switcher of slider -->
                            <ul class="hide-bullets">
                                @for($image=0; $image<count($media); $image++)
                                    <li class="col-md-4">
                                        <a class="thumbnail" id="carousel-selector-{{$image}}">
                                            <img src="{{asset('storage/'.$media[$image]->path)}}"
                                                 alt="{{$cast->name}}">
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                        <div class="col-sm-7">
                            <div class="col-xs-12" id="slider">
                                <!-- Top part of the slider -->
                                <div class="row">
                                    <div class="col-sm-12" id="carousel-bounding-box">
                                        <div class="carousel slide" id="myCarousel">
                                            <!-- Carousel items -->
                                            <div class="carousel-inner">
                                                @for($image=0; $image<count($media); $image++)
                                                    <div class="item" data-slide-number="{{$image}}" id="{{$image}}">
                                                        <img src="{{asset('storage/'.$media[$image]->path)}}"
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