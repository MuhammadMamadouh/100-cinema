<li class="pull-right"><a id="markasread" href="{{url('readAllNotify')}}" style="background-color: #9cc2cb"><span
                class="fa fa-bell-o"></span> Mark All as read</a>
</li>
@foreach(auth()->user()->unreadNotifications as $notification)
    <li><a href="{{route("posts.show", $notification->data['post_id'])}}"><span
                    class="fa fa-bell-o"></span> {{$notification->data['data']}}</a>
    </li>
@endforeach
<li class="divider"></li>
@foreach(auth()->user()->readNotifications()->limit(5)->get() as $notification)
    <li><a href="{{route("posts.show", $notification->data['post_id'])}}">{{$notification->data['data']}}</a>
    </li>
@endforeach
