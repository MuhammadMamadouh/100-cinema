@extends('adminlte::page')
<!-- Main content -->
@section('content')

    <div class="col-md-6">
        <div class="box-header">
            <h2 class="box-header">Edit Cast</h2>
        </div>

        <div class="box-body">

            {!! Form::open(['route' => ['jobs.update', $job->id], 'method'=> 'put', 'files'=> true]) !!}

            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::text('name',$job->name,['class'=>'form-control','placeholder'=>'Full Name' ]) !!}
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
            </div>

            {!! Form::submit('update', ['class'=> 'btn btn-primary btn-block btn-flat'])!!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection