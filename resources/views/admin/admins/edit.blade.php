<div id="edit_admin" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete</h4>
            </div>

            <div class="modal-body">

                {!! Form::open(['route' => ['admins.update', $admin->id], 'method'=> 'put', 'id'=> 'update_admin']) !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">

                    <input type="text" name="name" class="form-control" value="{{ $admin->name }}"
                           placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" value="{{ $admin->email }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="modal-footer">
                    <span class="help-block pull-left">
                        <strong id="edit-error"></strong>
                    </span>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
