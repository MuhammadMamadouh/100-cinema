<div id="add_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create cast</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => aurl('cast'), 'method'=> 'post', 'files'=> true, 'id'=> 'frm-insert']) !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::text('name','',['class'=>'form-control  input','placeholder'=>'Full Name' ]) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('country') ? 'has-error' : '' }}">
                    {!! Form::text('country','',['class'=>'form-control input','placeholder'=>'Country' ]) !!}
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                    @if ($errors->has('country'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('about') ? 'has-error' : '' }}">
                    {!! Form::textarea('about','',['class'=>'form-control input','placeholder'=>'about' ]) !!}
                    <span class="glyphicon glyphicon-align-center form-control-feedback"></span>
                    @if ($errors->has('about'))
                        <span class="help-block">
                            <strong>{{ $errors->first('about') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('job') ? 'has-error' : '' }}">
                    @foreach($jobs as $job)
                            <label class="container">{{$job->name}}
                                <input name="jobs[]" value="{{$job->id}}" type="checkbox">
                                <span class="checkmark"></span>
                            </label>

                            <span class="checkmark"></span>
                        </label>
                    @endforeach
                    @if ($errors->has('job'))
                        <span class="help-block">
            <strong>{{ $errors->first('image') }}</strong>
            </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
                    {!! Form::label('image','Profile Picture') !!}
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