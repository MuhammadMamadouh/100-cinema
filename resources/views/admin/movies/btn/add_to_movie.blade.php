<a href="#" onclick="event.preventDefault(); document.getElementById('add_crew{{$id}}').submit()"
data-id="{{$id}}" class="btn btn-info">add to movie</a>

{!! Form::open(['id'=> "add_crew$id",'url'=>aurl('movies/crew/add'),'method'=>'post']) !!}
    {{--<input type="hidden" name="cast_id" value="{{$id}}">--}}
{!! Form::close() !!}