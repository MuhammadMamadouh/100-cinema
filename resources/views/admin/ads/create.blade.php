<div id="add_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create ad</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => aurl('ads'),'id'=> 'frm-insert', 'method'=> 'post', 'files'=> true]) !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::text('name','',['class'=>'form-control  input','placeholder'=>'Ad Name' ]) !!}
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

                <div class="form-group has-feedback {{ $errors->has('start_at') ? 'has-error' : '' }}">
                    {!! Form::label('start_at') !!}
                    {!! Form::date('start_at',Carbon\Carbon::now(),['class'=>'form-control input','placeholder'=>'Start_at' ]) !!}
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback {{ $errors->has('end_at') ? 'has-error' : '' }}">
                    {!! Form::label('end_at') !!}
                    {!! Form::date('end_at',Carbon\Carbon::now(),['class'=>'form-control input','placeholder'=>'End_at' ]) !!}
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
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
                            <option value="{{$page}}">{{$page}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
                    {!! Form::label('image','Profile Picture') !!}
                    {!! Form::file('image',['class'=>'form-control']) !!}
                    <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                </div>
                <div class="modal-footer">
                <span class="help-block pull-left">
                    <strong id="add-error"></strong>
                </span>
                    {!! Form::submit('add', ['class'=> 'btn btn-primary btn-block btn-flat'])!!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>