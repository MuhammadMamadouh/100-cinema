{{--<div id="add_cast" class="modal fade" role="dialog">--}}
{{--<div class="modal-dialog">--}}

{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--<h4 class="modal-title">Create cast</h4>--}}
{{--</div>--}}

{{--<div class="modal-body">--}}

@extends('adminlte::page')
<!-- Main content -->
@section('content')
    <div class="container">

        <div class="col-md-6">

            <div class="box-header">
                <h2 class="box-header">Add New Cast</h2>
            </div>
            <div class="box-body">

                {!! Form::open(['files'=> true,  'url' => route('addCastImage')]) !!}

                <input type="hidden" name="cast_id" value="{{$cast_id}}">

                <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
                    {!! Form::label('images','image') !!}
                    {!! Form::file('images[]',['class'=>'form-control', 'multiple'=> true]) !!}
                    <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                    </span>
                    @endif
                </div>

                {!! Form::submit('next', ['class'=> 'btn btn-primary btn-flat'])!!}
                <a href="{{aurl('cast')}}" class="btn btn-success">skip</a>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
