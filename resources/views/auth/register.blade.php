@extends('layouts.blog')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        {{--<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">--}}
                        {{--@csrf--}}
                        {!! Form::open(['url' =>  route('register'), 'method'=> 'post', 'files'=> true]) !!}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-8">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" required autofocus>

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

                                <div class="col-md-8">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>

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

                                <div class="col-md-8">
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

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                        <div class="form-group row  has-feedback {{ $errors->has('country') ? 'has-error' : '' }}">
                            {!! Form::label('country','Country', ['class'=>'col-md-4 col-form-label text-md-right' ]) !!}
                            <div class="col-md-8">
                                {!! Form::text('country','',['class'=>'form-control']) !!}
                            </div>
                            @if ($errors->has('image'))
                                <span class="help-block">
                                        <strong>
                                            {{ $errors->first('image') }}
                                        </strong>
                                    </span>
                            @endif

                        </div>
                        <div class="form-group row has-feedback {{ $errors->has('site') ? 'has-error' : '' }}">
                            {!! Form::label('site','Site', ['class'=>'col-md-4 col-form-label text-md-right' ]) !!}
                            <div class="col-md-8">
                                {!! Form::text('site','',['class'=>'form-control']) !!}
                            </div>
                            @if ($errors->has('site'))
                                <span class="help-block">
                                        <strong>
                                            {{ $errors->first('site') }}
                                        </strong>
                                    </span>
                            @endif

                        </div>
                        <div class="form-group row has-feedback {{ $errors->has('short_bio') ? 'has-error' : '' }}">
                            {!! Form::label('short_bio','Short Bio', ['class'=>'col-md-4 col-form-label text-md-right' ]) !!}
                            <div class="col-md-8">
                                {!! Form::text('short_bio','',['class'=>'form-control']) !!}
                            </div>
                            @if ($errors->has('short_bio'))
                                <span class="help-block">
                                        <strong>
                                            {{ $errors->first('short_bio') }}
                                        </strong>
                                    </span>
                            @endif

                        </div>

                        <div class="form-group row has-feedback {{ $errors->has('about') ? 'has-error' : '' }}">

                            {!! Form::label('about','about', ['class'=>'col-md-4 col-form-label text-md-right' ]) !!}

                            <div class="col-md-8">
                                {!! Form::textarea('about','',['class'=>'form-control']) !!}
                            </div>
                            @if ($errors->has('about'))
                                <span class="help-block">
                                        <strong>
                                            {{ $errors->first('about') }}
                                        </strong>
                                    </span>
                            @endif

                        </div>


                        <div class="form-group  has-feedback {{ $errors->has('about') ? 'has-error' : '' }} ">
                            {!! Form::label('image','image', ['class'=>'col-md-4 col-form-label text-md-right' ]) !!}
                            <div class="col-md-8">
                                {!! Form::file('image',['class'=>'form-control']) !!}
                            </div>
                            @if ($errors->has('image'))
                                <span class="help-block">
                                        <strong>
                                            {{ $errors->first('image') }}
                                        </strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
