<a href="#" data-toggle="modal" data-target="#edit_modal{{$id}}" id="edit" class="btn btn-info"
   data-id="{{$id}}">Edit</a>

<div id="edit_modal{{$id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Admin</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['route' => ['videos.update', $id], 'method'=> 'put']) !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::text('name',$name,['class'=>'form-control  input','placeholder'=>'channel Name' ]) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('link') ? 'has-error' : '' }}">
                    {!! Form::text('link',$link,['class'=>'form-control input','placeholder'=>'Link' ]) !!}
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                    @if ($errors->has('link'))
                        <span class="help-block">
                            <strong>{{ $errors->first('link') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('channel_id') ? 'has-error' : '' }}">
                    {!! Form::text('channel_id','',['class'=>'form-control input','placeholder'=>'channel_id' ]) !!}
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                    @if ($errors->has('channel_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('channel_id') }}</strong>
                        </span>
                    @endif
                </div>


                {!! Form::submit('update', ['class'=> 'btn btn-primary '])!!}
                <button type="button" class="btn btn-info" data-dismiss="modal">cancel</button>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

