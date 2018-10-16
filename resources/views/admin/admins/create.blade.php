<div id="add_admin" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Admin</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => aurl('admins'), 'method'=> 'post', 'id'=> 'frm-insert']) !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">

                    <input type="text" name="name" class="form-control input" value="{{ old('name') }}"
                           placeholder="full name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control input" value="{{ old('email') }}"
                           placeholder="email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" id="password" class="form-control input"
                           placeholder="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control input"
                           placeholder="retype password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                {{--{!! Form::submit('send'), ['class'=> 'btn btn-primary btn-block btn-flat']!!}--}}
            </div>
            <div class="modal-footer">
                <span class="help-block pull-left">
                            <strong id="add-error"></strong>
                        </span>

                <button type="submit" class="btn btn-primary">Add</button>
                {!! Form::close() !!}
                <button type="button" class="btn btn-info" data-dismiss="modal">cancel</button>
            </div>
        </div>
    </div>
</div>
