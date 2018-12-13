@extends('layouts.newBlog')

@section('content')

    <div id="app">
        {{--@for($i=0; $i<count($videos)-1; $i++)--}}


        {{--allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"--}}
        {{--allowfullscreen></iframe>--}}
        {{--@endfor--}}
        {{--@foreach($videos as $video)--}}
        {{--<pre>--}}
        {{--{{print_r($videos)}}--}}
        {{--</pre>--}}
        @if(isset($videos->id->videoId))
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$videos->id->videoId}}"
                    frameborder="0"></iframe>
        @endif

        {{--@endforeach--}}


    </div>


@endsection
@push('js')
    <script type="text/javascript">

        {{--$('#app').load('{{$json_url}}', function (data, status) {--}}
        {{--console.log(data)--}}
        {{--});--}}

    </script>
@endpush