<div id="add_channel" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Admin</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => aurl('videos'), 'method'=> 'post', 'id'=> 'frm-insert']) !!}


                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::text('name','',['class'=>'form-control  input','placeholder'=>'channel Name' ]) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('link') ? 'has-error' : '' }}">
                    {!! Form::text('link','',['class'=>'form-control input','placeholder'=>'Link' ]) !!}
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                    @if ($errors->has('link'))
                        <span class="help-block">
                            <strong>{{ $errors->first('link') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('api_id') ? 'has-error' : '' }}">
                    {!! Form::text('api_id','',['class'=>'form-control input','placeholder'=>'api_id' ]) !!}
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                    @if ($errors->has('api_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('api_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('type') ? 'has-error' : '' }}">
                    <select name="type" class="form-control">
                        @foreach($types as $value)
                            <option value="{{$value}}">{{$value}}</option>
                        @endforeach
                    </select>

                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                    @if ($errors->has('channel_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('channel_id') }}</strong>
                        </span>
                    @endif
                </div>

                {!! Form::submit('add', ['class'=> 'btn btn-primary  '])!!}
                <button type="button" class="btn btn-info" data-dismiss="modal">cancel</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
