@extends('adminlte::page')
<!-- Main content -->
@section('content')
    <aside class="col-md-5 pull-right">
        <div class="box-header">
            <h2 class="box-header">Poster</h2>
        </div>
        <div class="box poster-box ">
            <img src="{{asset('storage/' . $ad->image)}}"
                 class="center-block img-thumbnail rounded-circle poster result-pic">
        </div>
    </aside>
    <div class="col-md-6">
        <div class="box-header">
            <h2 class="box-header">Edit Ad {{$ad->name}}</h2>
        </div>

        <div class="box-body">

            {!! Form::open(['route' => ['ads.update', $ad->id], 'method'=> 'put', 'files'=> true]) !!}

            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('name') !!}
                {!! Form::text('name',$ad->name,['class'=>'form-control  input','placeholder'=>'Ad Name' ]) !!}
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('link') ? 'has-error' : '' }}">
                {!! Form::label('link') !!}
                {!! Form::text('link',$ad->link,['class'=>'form-control input','placeholder'=>'Link' ]) !!}
                <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                @if ($errors->has('link'))
                    <span class="help-block">
                            <strong>{{ $errors->first('link') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('start_at') ? 'has-error' : '' }}">
                {!! Form::label('start_at') !!}
                {!! Form::date('start_at',$ad->start_at,['class'=>'form-control input','placeholder'=>'Start_at' ]) !!}
                <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                @if ($errors->has('start_at'))
                    <span class="help-block">
                            <strong>{{ $errors->first('start_at') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('end_at') ? 'has-error' : '' }}">
                {!! Form::label('end_at') !!}
                {!! Form::date('end_at',$ad->end_at,['class'=>'form-control input','placeholder'=>'End_at' ]) !!}
                <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                @if ($errors->has('end_at'))
                    <span class="help-block">
                            <strong>{{ $errors->first('end_at') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="enabled">Enabled</option>
                    <option value="disabled">Disabled</option>
                </select>
            </div>

            <div class="form-group">
                <label for="page">Page</label>
                <select name="page" id="page" class="form-control">
                    @foreach($pages as $page)
                        <option value="{{$page}}"
                                @if($ad->page == $page) ? selected : @endif>{{$page}}>
                        </option>
                    @endforeach
                </select>
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