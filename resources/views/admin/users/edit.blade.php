@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
@endsection
<!-- Main content -->
@section('content')
    <aside class="col-md-5 pull-right">
        <div class="box-header">
            <h2 class="box-header">Image</h2>
        </div>
        <div class="box poster-box ">
            <img src="{{asset('storage/' . $user->image)}}"
                 class="center-block img-thumbnail rounded-circle poster result-pic">
        </div>
    </aside>
    <div class="col-md-6">
        <div class="box-header">
            <h2 class="box-header">Edit Ad {{$user->name}}</h2>
        </div>

        <div class="box-body">
            {!! Form::open(['route' => ['users.update', $user->id], 'method'=> 'put','id'=>'frm-update-'.$user->id, 'files'=> true]) !!}

            <div class="form-group has-feedback col-md-12">
                {!! Form::label('name','name') !!}
                <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                       placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback col-md-12">
                {!! Form::label('email','email') !!}
                <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                       placeholder="{{ trans('adminlte::adminlte.email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback col-sm-12">
                {!! Form::label('password','password') !!}
                <input type="password" name="password" class="form-control"
                       placeholder="{{ trans('adminlte::adminlte.password') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback col-md-12">
                <input type="password" name="password_confirmation" class="form-control"
                       placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback col-md-12">
                {!! Form::label('country','country') !!}
                {!! Form::text('country',$user->country,['class'=>'form-control','placeholder'=>trans('adminlte::adminlte.country') ]) !!}
                <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback col-md-12">
                {!! Form::label('site','site') !!}
                {!! Form::text('site',$user->site,['class'=>'form-control','placeholder'=>trans('adminlte::adminlte.site') ]) !!}
                <span class="glyphicon glyphicon-link form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback col-md-12">
                {!! Form::label('short_bio','short_bio') !!}
                {!! Form::text('short_bio',$user->short_bio,['class'=>'form-control','placeholder'=>trans('adminlte::adminlte.short_bio') ]) !!}
            </div>
            <div class="form-group has-feedback col-md-12">
                {!! Form::label('about','about') !!}
                {!! Form::textarea('about',$user->about,['class'=>'form-control']) !!}
            </div>
            <div class="form-group has-feedback col-md-12">
                {!! Form::label('role','role') !!}

                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        @foreach($roles as $role)
                            <label>
                                <input type="checkbox" name="{{$role->id}}">{{$role->name}}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
                {!! Form::label('image','Profile Picture') !!}
                {!! Form::file('image',['class'=>'form-control file-upload', 'accept'=> "image/*"]) !!}
                <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                @if ($errors->has('image'))
                    <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>

            {!! Form::submit('add', ['class'=> 'btn btn-primary btn-block btn-flat'])!!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
@stop
