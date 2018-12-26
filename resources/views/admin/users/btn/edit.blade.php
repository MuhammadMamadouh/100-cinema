<a href="#" data-toggle="modal" data-target="#edit_modal{{$user->id}}" id="edit" class="btn btn-info"
   data-id="{{$user->id}}">Edit</a>

<div id="edit_modal{{$user->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit User</h4>
            </div>

            <div class="modal-body row">
                {!! Form::open(['route' => ['users.update', $user->id], 'method'=> 'put','id'=>'frm-update-'.$user->id, 'files'=> true]) !!}

                <div class="form-group has-feedback col-md-12">
                    {!! Form::label('name','name') !!}
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                           placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback col-md-12">
                    {!! Form::label('email','email') !!}
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback col-sm-12">
                    {!! Form::label('password','password') !!}
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback col-md-12">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback col-md-12">
                    {!! Form::label('country','country') !!}
                    {!! Form::text('country',$user->country,['class'=>'form-control','placeholder'=>trans('adminlte::adminlte.country') ]) !!}
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback col-md-12">
                    {!! Form::label('site','site') !!}
                    {!! Form::text('site',$user->site,['class'=>'form-control','placeholder'=>trans('adminlte::adminlte.site') ]) !!}
                    <span class="glyphicon glyphicon-link form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback col-md-12">
                    {!! Form::label('short_bio','short_bio') !!}
                    {!! Form::text('short_bio',$user->short_bio,['class'=>'form-control','placeholder'=>trans('adminlte::adminlte.short_bio') ]) !!}
                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback col-md-12">
                    {!! Form::label('about','about') !!}
                    {!! Form::textarea('about',$user->about,['class'=>'form-control']) !!}
                    <span class="glyphicon glyphicon-align-center form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback col-md-12">
                    {!! Form::label('role','role') !!}

                    <select name="role" class="form-control" multiple>
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group has-feedback col-sm-12">
                    {!! Form::label('image','image') !!}
                    {!! Form::file('image',['class'=>'form-control']) !!}
                    <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                </div>

                @if(!empty($user->image))
                    <img src="{{\Storage::url($user->image)}}" style="height: 100px; width:100px">
                @endif


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
