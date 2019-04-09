@extends('layouts.page')
@section('css')
    <link href="{{asset('public/css/post-style.css')}}" rel="stylesheet" type="text/css" media="all"/>
@endsection

@section('title', config('app.name'))
<!--//end-banner-->
@section('content')

    <div class="col-md-12 mag-innert-left">
        <!--/start-Technology-->
        <div class="technology">
            <div class="col-md-6 ">
                <h2 class="tittle"><i class="glyphicon glyphicon-certificate"> </i>Latest Articles</h2>
                <div class="col-md-6 tech-img">
                    <img src="public/images/tech.jpg" class="img-responsive" alt=""/>
                </div>
            </div>
            <div class="col-md-6 tech-text">
                @foreach($posts as $post)
                    <div class="editor-pics">
                        <div class="col-md-3 item-pic">
                            <img src="{{image_url($post->image)}}" class="img-responsive"
                                 style="height: 100px; width: 150px" alt=""/>

                        </div>
                        <div class="col-md-9 item-details">
                            <h5 class="inner two"><a href="{{route('posts.show',$post->slug)}}">{{$post->title}}</a>
                            </h5>
                            <div class="td-post-date two">{{$post->created_at->diffForHumans()}}</div>
                            {{--<a href="{{route()}}" class="btn-outline-dark">readmore</a>--}}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            </div>
            <div class="clearfix"></div>
        </div>
        <!--//latest-articles-->
        <div class="latest-articles">
            <h3 class="tittle"><i class="glyphicon glyphicon-file"></i>Videos From Youtube</h3>
            <div class="world-news-grids">
                @foreach($youtubeVideo as $video)
                    @if(isset($video->id->videoId))
                        <div class="col-md-3">
                            <a class="play-icon popup-with-zoom-anim" href="#small-dialog-{{$video->id->videoId}}"><img
                                        src="{{$video->snippet->thumbnails->high->url}}" class="img-thumbnail"
                                        title="allbum-name"/></a>
                            <h5>{{$video->snippet->title}}</h5>
                            {{--<ul class="list-unstyled ">--}}
                            {{--<li><span><i class="glyphicon-thumbs-up" title="image-name"/></span></li>--}}
                            {{--<li><a href="#"><img src="images/views.png" title="image-name"/></a></li>--}}
                            {{--<li><a href="#"><img src="images/link.png" title="image-name"/></a></li>--}}
                            {{--</ul>--}}
                            <a class="button play-icon popup-with-zoom-anim"
                               href="#small-dialog-{{$video->id->videoId}}">Watch now</a>
                        </div>
                        <div id="small-dialog-{{$video->id->videoId}}" class="mfp-hide">
                            <iframe src="https://www.youtube.com/embed/{{$video->id->videoId}}" frameborder="0"
                                    allowfullscreen></iframe>
                        </div>
                    @endif
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
        <!--//articles-->
    </div>
    <!-- pop-up-box -->
    <link href="public/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="public/js/jquery.magnific-popup.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });
        });
    </script>
@endsection