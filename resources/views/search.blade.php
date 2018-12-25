
@foreach($users as $result)
    <li>
        <a class="row" href="{{url("user/$result->id") }}">
            <img class="col-sm-2 img-responsive" src="{{\Storage::url($result->image)}}" alt="{{$result->name}}">
            <span class="col-sm-10">{{$result->name}}</span>
        </a>
    </li>
@endforeach
<li class="divider">Casts</li>
@foreach($cast as $result)
    <li>

        <a class="row" href="{{url("crew/$result->id") }}">
            <img class="col-sm-2 img-responsive" src="{{\Storage::url($result->image)}}" alt="{{$result->name}}">
            <span class="col-sm-10">{{$result->name}}</span>
        </a>
    </li>
@endforeach
<li class="divider">Movies</li>
@foreach($movies as $result)
    <li>
        <a class="row" href="{{url("movie/$result->id") }}">
            <img class="col-sm-2 img-responsive" src="{{\Storage::url($result->poster)}}" alt="{{$result->title}}">
            <span class="col-sm-10">{{$result->title}}</span>
        </a>
    </li>
@endforeach
