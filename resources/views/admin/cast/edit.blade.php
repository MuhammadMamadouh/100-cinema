@extends('adminlte::page')
<!-- Main content -->
@section('content')
    <aside class="col-md-5 pull-right">
        <div class="box-header">
            <h2 class="box-header">Poster</h2>
        </div>
        <div class="box poster-box ">
            <img src="{{\Storage::url($cast->image)}}" class="center-block img-thumbnail rounded-circle poster">
        </div>
    </aside>
    <div class="col-md-6">
        <div class="box-header">
            <h2 class="box-header">Edit Cast</h2>
        </div>

        <div class="box-body">

            {!! Form::open(['route' => ['cast.update', $cast->id], 'method'=> 'put', 'files'=> true]) !!}

            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::text('name',$cast->name,['class'=>'form-control','placeholder'=>'Full Name' ]) !!}
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('country') ? 'has-error' : '' }}">
                {!! Form::text('country',$cast->country,['class'=>'form-control','placeholder'=>'Country' ]) !!}
                <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                @if ($errors->has('country'))
                    <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('about') ? 'has-error' : '' }}">
                {!! Form::textarea('about',$cast->about,['class'=>'form-control','placeholder'=>'about' ]) !!}
                <span class="glyphicon glyphicon-align-center form-control-feedback"></span>
                @if ($errors->has('about'))
                    <span class="help-block">
                            <strong>{{ $errors->first('about') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('job') ? 'has-error' : '' }}">
                {!! Form::label('job', 'Job') !!}
                <select name="job" class="form-control" multiple>
                    @foreach($jobs as $job)
                        <option value="{{$job->id}}">{{$job->name}}</option>
                    @endforeach
                </select>

                <span class="glyphicon glyphicon-align-center form-control-feedback"></span>
                @if ($errors->has('job'))
                    <span class="help-block">
                            <strong>{{ $errors->first('job') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
                {!! Form::label('image','image') !!}
                {!! Form::file('image',['class'=>'form-control']) !!}
                <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                @if ($errors->has('image'))
                    <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                @endif
            </div>

            {!! Form::submit('update', ['class'=> 'btn btn-primary btn-block btn-flat'])!!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection