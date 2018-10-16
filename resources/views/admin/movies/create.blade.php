@extends('adminlte::page')
<!-- Main content -->
@section('content')
    <aside class="pull-right">
        <div class="">
            <img src="#" style="height:300px;  width:300px">
        </div>
    </aside>
    <div class="col-md-6">

        <div class="box-header">
            <h2 class="box-header">Add New Movie</h2>
        </div>
        <div class="box-body">

            {!! Form::open(['url' => aurl('movies'), 'method'=> 'post', 'files'=> true]) !!}

            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::text('title','',['class'=>'form-control','placeholder'=>'title']) !!}
                <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                @if ($errors->has('title'))
                    <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('playtime') ? 'has-error' : '' }}">
                {!! Form::text('playtime','',['class'=>'form-control','placeholder'=>'playtime' ]) !!}

                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('playtime'))
                    <span class="help-block">
                            <strong>{{ $errors->first('playtime') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('country') ? 'has-error' : '' }}">
                <input type="country" name="country" class="form-control"
                       placeholder="country">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('country'))
                    <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('language') ? 'has-error' : '' }}">
                {!! Form::text('language','',['class'=>'form-control','placeholder'=>'language' ]) !!}
                <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                @if ($errors->has('language'))
                    <span class="help-block">
                            <strong>{{ $errors->first('language') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('year') ? 'has-error' : '' }}">
                {!! Form::text('year','',['class'=>'form-control','placeholder'=>'year' ]) !!}
                <span class="glyphicon glyphicon-link form-control-feedback"></span>
                @if ($errors->has('year'))
                    <span class="help-block">
                            <strong>{{ $errors->first('year') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('trailer') ? 'has-error' : '' }}">
                {!! Form::text('trailer','',['class'=>'form-control','placeholder'=>'trailer' ]) !!}
                <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                @if ($errors->has('trailer'))
                    <span class="help-block">
                            <strong>{{ $errors->first('trailer') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('story') ? 'has-error' : '' }}">
                {!! Form::textarea('story','',['class'=>'form-control','placeholder'=>'story' ]) !!}
                <span class="glyphicon glyphicon-align-center form-control-feedback"></span>
                @if ($errors->has('story'))
                    <span class="help-block">
                            <strong>{{ $errors->first('story') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('poster') ? 'has-error' : '' }}">
                {!! Form::label('poster','poster') !!}
                {!! Form::file('poster',['class'=>'form-control']) !!}
                <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                @if ($errors->has('poster'))
                    <span class="help-block">
                            <strong>{{ $errors->first('poster') }}</strong>
                        </span>
                @endif
            </div>

            {!! Form::submit('add', ['class'=> 'btn btn-primary btn-block btn-flat'])!!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection
<script type="text/javascript">

</script>