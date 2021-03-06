<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @if(\Auth::guard('web') )
                yes it
            @else
                no
            @endif
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    {{--@foreach($video as $value)--}}

    {{--<a href="https://www.youtube.com/embed/{{$value->id}}">youtube.com/channel/{{$value->id . '  ' .$value->snippet->title}} </a>--}}
    {{--<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$value->id}}" frameborder="0"--}}
    {{--allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
    {{--@endforeach--}}
    {{--<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$video}}" frameborder="0"--}}
    {{--allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
    <div class="content">
        <div class="title m-b-md">
            Laravel

        </div>

        <div class="links">
            <a href="https://laravel.com/docs">Documentation</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
    </div>

    <div id="app"><h1>Welcome</h1></div>

        <script src="{{asset('public/blog/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{asset('public/js/app.js')}}"></script>
    {{--<script src="{{asset('public/js/pusher.js')}}"></script>--}}
        {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/4.3.1/pusher.min.js"></script>--}}
    {{--<script type="text/javascript">--}}

        {{--Pusher.logToConsole = true;--}}

        {{--var pusher = new Pusher('e839c427031ef5086e5a', {--}}
            {{--cluster: 'eu',--}}
            {{--forceTLS: true--}}
        {{--});--}}

        {{--var  channel = pusher.subscribe('post-liked');--}}

        {{--channel.bind('App\\Events\\PostLiked', function (data) {--}}
            {{--console.log('data' +JSON.stringify(data.event));--}}
        {{--})--}}
    {{--</script>--}}
</div>
</body>
</html>
