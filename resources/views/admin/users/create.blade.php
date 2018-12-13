<div id="add_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create User</h4>
            </div>

            <div class="modal-body">

                {!! Form::open(['url' => aurl('users'), 'method'=> 'post', 'files'=> true, 'id'=> 'frm-insert']) !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::text('name','',['class'=>'form-control','placeholder'=>trans('Full Name') ]) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    {!! Form::email('email',old('email'),['class'=>'form-control','placeholder'=>'email' ]) !!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="retype_password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback {{ $errors->has('country') ? 'has-error' : '' }}">
                    {!! Form::text('country','',['class'=>'form-control','placeholder'=>'country']) !!}
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback {{ $errors->has('site') ? 'has-error' : '' }}">
                    {!! Form::text('site','',['class'=>'form-control','placeholder'=>'site']) !!}
                    <span class="glyphicon glyphicon-link form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback {{ $errors->has('short_bio') ? 'has-error' : '' }}">
                    {!! Form::text('short_bio','',['class'=>'form-control','placeholder'=>'short_bio']) !!}
                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback {{ $errors->has('about') ? 'has-error' : '' }}">
                    {!! Form::textarea('about','',['class'=>'form-control','placeholder'=>'about']) !!}
                    <span class="glyphicon glyphicon-align-center form-control-feedback"></span>
                </div>


                <div class="form-group has-feedback {{ $errors->has('about') ? 'has-error' : '' }}">
                    <select name="role" class="form-control" multiple>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                    <span class="glyphicon glyphicon-align-center form-control-feedback"></span>
                </div>


                <div class="form-group has-feedback ">
                    {!! Form::label('image','image') !!}
                    {!! Form::file('image',['class'=>'form-control']) !!}
                    <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
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
</div>