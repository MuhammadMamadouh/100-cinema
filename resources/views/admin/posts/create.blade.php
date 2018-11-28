<div id="add_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Post</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => aurl('posts'), 'method'=> 'post', 'id'=> 'frm-insert', 'files'=> true]) !!}

                <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                    {!! Form::label('title') !!}
                    {!! Form::text('title','',['class'=>'form-control  input']) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                    {!! Form::label('details') !!}
                    {!! Form::textarea('details','',['class'=>'form-control  input']) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('details'))
                        <span class="help-block">
                            <strong>{{ $errors->first('details') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
                    {!! Form::label('image') !!}
                    {!! Form::file('image',['class'=>'form-control']) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
                <input type="hidden" name="user_id" value="{{\auth('admin')->user()->id}}">
            </div>
            <div class="modal-footer">
                <span class="help-block pull-left">
                            <strong id="add-error"></strong>
                </span>

                <button type="submit" class="btn btn-primary">Add</button>
                {!! Form::close() !!}
                <button type="button" class="btn btn-info submit-btn" data-dismiss="modal">cancel</button>
            </div>
        </div>
    </div>
</div>
