<a href="#" data-toggle="modal" data-target="#edit_modal{{$video->id}}" id="edit" class="btn btn-info"
   data-id="{{$video->id}}">Edit</a>

<div id="edit_modal{{$video->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Admin</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['route' => ['videos.update', $video->id], 'method'=> 'put','id'=>'frm-update-'.$video->id]) !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::label('name') !!}
                    {!! Form::text('name',$video->name,['class'=>'form-control  input','placeholder'=>'channel Name' ]) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback {{ $errors->has('link') ? 'has-error' : '' }}">
                    {!! Form::label('link') !!}
                    {!! Form::text('link',$video->link,['class'=>'form-control input','placeholder'=>'Link' ]) !!}
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback {{ $errors->has('channel_id') ? 'has-error' : '' }}">
                    {!! Form::label('api_id') !!}
                    {!! Form::text('api_id', $video->api_id,['class'=>'form-control input','placeholder'=>'api_id' ]) !!}
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback {{ $errors->has('type') ? 'has-error' : '' }}">
                    <select name="type" class="form-control">
                        @foreach($types as $value)
                            <option value="{{$value}}">{{$value}}</option>
                        @endforeach
                    </select>
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                </div>

                <div class="modal-footer">
                <span class="help-block pull-left">
                    <strong id="edit-error"></strong>
                </span>

                    <button type="submit" class="btn btn-primary">update</button>
                    {!! Form::close() !!}
                    <button type="button" class="btn btn-info" data-dismiss="modal">cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
