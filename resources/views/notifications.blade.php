@if(count(auth()->user()->unreadNotifications) > 0)
    <li><a href="{{url('readAllNotify')}}"><span class="fa fa-bell-o"></span> Mark All as
            read</a>
    </li>
@endif
@foreach(auth()->user()->unreadNotifications as $notification)
    <li><a href="{{route("posts.show", $notification->data['post_id'])}}"><span
                    class="fa fa-bell-o"></span> {{$notification->data['data']}}</a>
    </li>
@endforeach
<li class="divider"></li>
@foreach(auth()->user()->readNotifications as $notification)
    <li><a href="{{route("posts.show", $notification->data['post_id'])}}">{{$notification->data['data']}}</a>
    </li>
@endforeach
