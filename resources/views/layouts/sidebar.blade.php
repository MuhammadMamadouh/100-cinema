@php
    $ads = \App\Models\Ads::where('status', 'enabled')
        ->where('page', '=', \Route::current()->uri())
        ->where('end_at', '>', time())
        ->get();
@endphp
<!-- sidebar: style can be found in sidebar.less -->
<div class="col-md-3 side-bar">
    <div class="">
        <ul>
            @foreach($ads as $ad)

                <li>
                    <div class="panel panel-success">
                        <a href="{{$ad->link}}">
                            <img class="card-img-top img-responsive" src="{{asset('storage/'. $ad->image)}}" alt="">
                        </a>
                        <div class="panel-body">
                            <a href="{{$ad->link}}" class="panel-title">{{$ad->name}}</a>
                        </div>
                    </div>
                </li>
            @endforeach
            <div class="clearfix"></div>
        </ul>
    </div>

    <div class="entertainment">
        <h3>Popular Posts</h3>
        @foreach($mostLikedPosts as $post)

            <ul>
                <li class="ent">
                    <a href="{{url("posts/$post->id")}}"><img src="{{image_url($post->image) }}" alt=""/></a>
                </li>
                <li>
                    <a href="{{url("posts/$post->id")}}"> {{$post->title}}</a>
                </li>
                <div class="clearfix"></div>
            </ul>
        @endforeach
    </div>
    <div class="might">
        <h4>You might also like</h4>
        @foreach($mostLikedPosts as $post)
            <div class="might-grid">
                <div class="grid-might">
                    <a href="{{url("posts/$post->id")}}"><img src="{{image_url($post->image) }}" class="img-responsive"
                                                              alt=""> </a>
                </div>
                <div class="might-top">
                    <p>{{read_more($post->details, 10)}}</p>
                    <a href='{{url("posts/$post->id")}}'>read more<i> </i></a>
                </div>
                <div class="clearfix"></div>
            </div>
        @endforeach
    </div>
</div>
