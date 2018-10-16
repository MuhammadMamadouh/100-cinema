@extends('layouts.front')

@section('content')
    <div class="justify-content-center">

        <div class="card">
            <h2 class="card-header">{{ __('Register') }}</h2>
            <div class="card-body">
                {!! Form::open(['url' => route('register') , 'method'=> 'post', 'id'=> 'frm-insert', 'aria-label'=> __('Register'), 'files'=> true]) !!}
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name"
                                       value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email"
                                       value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('about', 'about', ['class="col-md-4 col-form-label text-md-right"']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('about','',['class'=>'form-control',]) !!}
                                @if ($errors->has('about'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {!! Form::label('website', 'site', ['class="col-md-4 col-form-label text-md-right"']) !!}
                            <div class="col-md-6">
                                {!! Form::text('site','',['class="form-control text-md-right"']) !!}
                                <span class="glyphicon glyphicon-link form-control-feedback"></span>
                                @if ($errors->has('site'))
                                    <span class="help-block">
                                          <strong>{{ $errors->first('site') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('short_bio', 'short bio', ['class="col-md-4 col-form-label text-md-right"']) !!}
                            <div class="col-md-6">
                                {!! Form::text('short_bio','',['class="form-control text-md-right"']) !!}
                                <span class="glyphicon glyphicon-link form-control-feedback"></span>
                                @if ($errors->has('short_bio'))
                                    <span class="help-block">
                                          <strong>{{ $errors->first('short_bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--<div class="form-group row has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">--}}
                            {{--{!! Form::label('image','Profile Picture',['class="col-md-4 col-form-label text-md-right"']) !!}--}}
                            {{--<div class="col-md-6">--}}
                                {{--{!! Form::file('image',['class'=>'form-control']) !!}--}}
                                {{--<span class="glyphicon glyphicon-picture form-control-feedback"></span>--}}
                                {{--@if ($errors->has('image'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('image') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                    <div class="col-sm-4 text-center">
                        <!-- User Profile Image -->
                        <img src="{{asset('public/images/user.png')}}" style="height: 150px" width="150px"
                             class="mx-auto img-fluid img-circle d-block profile-pic" alt="avatar">

                        <i class="fa fa-camera upload-button"></i>
                        <div class="p-image">
                            <input class="file-upload" name="image" type="file" accept="image/*"/>
                            <p class="lead">change profile photo</p>
                        </div>
                        @if ($errors->has('image'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>

@endsection
