@extends('adminlte::page')
<!-- Main content -->
@section('content')

    <div class="box col-md-9">
        <div class="box-header">
            <h2 class="box-header">Edit User</h2>
        </div>

        <div class="box-body">

            {!! Form::open(['route' => ['users.update', $user->id], 'method'=> 'put', 'files'=> true]) !!}

            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">

                <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                       placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                       placeholder="{{ trans('adminlte::adminlte.email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" name="password" class="form-control"
                       placeholder="{{ trans('adminlte::adminlte.password') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <input type="password" name="password_confirmation" class="form-control"
                       placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('country') ? 'has-error' : '' }}">
                {!! Form::text('country',$user->country,['class'=>'form-control','placeholder'=>trans('adminlte::adminlte.country') ]) !!}
                <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                @if ($errors->has('country'))
                    <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('site') ? 'has-error' : '' }}">
                {!! Form::text('site',$user->site,['class'=>'form-control','placeholder'=>trans('adminlte::adminlte.site') ]) !!}
                <span class="glyphicon glyphicon-link form-control-feedback"></span>
                @if ($errors->has('site'))
                    <span class="help-block">
                            <strong>{{ $errors->first('site') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('short_bio') ? 'has-error' : '' }}">
                {!! Form::text('short_bio',$user->short_bio,['class'=>'form-control','placeholder'=>trans('adminlte::adminlte.short_bio') ]) !!}
                <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                @if ($errors->has('short_bio'))
                    <span class="help-block">
                            <strong>{{ $errors->first('short_bio') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('about') ? 'has-error' : '' }}">
                {!! Form::textarea('about',$user->about,['class'=>'form-control','placeholder'=>trans('adminlte::adminlte.about') ]) !!}
                <span class="glyphicon glyphicon-align-center form-control-feedback"></span>
                @if ($errors->has('about'))
                    <span class="help-block">
                            <strong>{{ $errors->first('about') }}</strong>
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

            @if(!empty($user->image))
                <img src="{{\Storage::url($user->image)}}" style="height: 100px; width:100px">
            @endif

            {{--{!! Form::submit('send'), ['class'=> 'btn btn-primary btn-block btn-flat']!!}--}}
            <button type="submit" class="btn btn-primary btn-block btn-flat"
            >{{ trans('adminlte::adminlte.register') }}</button>
            {!! Form::close() !!}
        </div>
    </div>
@endsection