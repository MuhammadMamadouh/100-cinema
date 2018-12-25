<a href="#" data-toggle="modal" data-target="#edit_modal{{$cast->id}}" id="edit" class="btn btn-info"
   data-id="{{$cast->id}}">Edit</a>

<div id="edit_modal{{$cast->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Crew</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['route' => ['cast.update', $cast->id], 'method'=> 'put', 'files'=> true,'id'=>'frm-update-'.$cast->id]) !!}


                <div class="form-group row has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <div class="col-md-4">
                        {!! Form::label('name') !!}
                    </div>
                    <div class="col-md-7">
                        {!! Form::text('name',$cast->name,['class'=>'form-control','placeholder'=>'Full Name' ]) !!}
                    </div>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('country') ? 'has-error' : '' }}">
                    <div class="col-md-4">
                        {!! Form::label('country') !!}
                    </div>
                    <div class="col-md-7">
                        {!! Form::text('country',$cast->country,['class'=>'form-control','placeholder'=>'Country' ]) !!}
                    </div>
                    @if ($errors->has('country'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('about') ? 'has-error' : '' }}">
                    <div class="col-md-4">
                        {!! Form::label('about') !!}
                    </div>
                    <div class="col-md-7">
                        {!! Form::textarea('about',$cast->about,['class'=>'form-control','placeholder'=>'about' ]) !!}
                    </div>
                    @if ($errors->has('about'))
                        <span class="help-block">
                            <strong>{{ $errors->first('about') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('job') ? 'has-error' : '' }}">
                    {!! Form::label('job', 'Job') !!}
                    <select name="job" class="form-control" multiple>
                        @foreach($jobs as $job)
                            <option value="{{$job->id}}">{{$job->name}}</option>
                        @endforeach
                    </select>

                    <span class="glyphicon glyphicon-align-center form-control-feedback"></span>
                    @if ($errors->has('job'))
                        <span class="help-block">
                            <strong>{{ $errors->first('job') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
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
