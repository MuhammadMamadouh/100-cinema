@extends('adminlte::page')
<!-- Main content -->
@section('content')

    <div class="box col-md-9">
        <div class="box-header">
            <h2 class="box-header">Add New Cast</h2>
        </div>

        <div class="box-body">

            {!! Form::open(['url' => aurl('jobs'), 'method'=> 'post', 'files'=> true]) !!}

            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::text('name','',['class'=>'form-control','placeholder'=>'Job Name' ]) !!}
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
            </div>

            {!! Form::submit('add', ['class'=> 'btn btn-primary btn-block btn-flat'])!!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection