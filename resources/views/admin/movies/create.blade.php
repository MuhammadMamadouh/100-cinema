<div id="add_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Movie</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => aurl('movies'), 'method'=> 'post','files'=> true, 'id'=> 'frm-insert']) !!}


                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::text('title','',['class'=>'form-control','placeholder'=>'title']) !!}
                    <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('playtime') ? 'has-error' : '' }}">
                    {!! Form::text('playtime','',['class'=>'form-control','placeholder'=>'playtime' ]) !!}

                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('playtime'))
                        <span class="help-block">
                            <strong>{{ $errors->first('playtime') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('country') ? 'has-error' : '' }}">
                    <input type="country" name="country" class="form-control"
                           placeholder="country">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('country'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('language') ? 'has-error' : '' }}">
                    {!! Form::text('language','',['class'=>'form-control','placeholder'=>'language' ]) !!}
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                    @if ($errors->has('language'))
                        <span class="help-block">
                            <strong>{{ $errors->first('language') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('year') ? 'has-error' : '' }}">
                    {!! Form::text('year','',['class'=>'form-control','placeholder'=>'year' ]) !!}
                    <span class="glyphicon glyphicon-link form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback {{ $errors->has('trailer') ? 'has-error' : '' }}">
                    {!! Form::text('trailer','',['class'=>'form-control','placeholder'=>'trailer' ]) !!}
                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback {{ $errors->has('story') ? 'has-error' : '' }}">
                    {!! Form::textarea('story','',['class'=>'form-control','placeholder'=>'story' ]) !!}
                    <span class="glyphicon glyphicon-align-center form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback {{ $errors->has('poster') ? 'has-error' : '' }}">
                    {!! Form::label('poster','poster') !!}
                    {!! Form::file('poster',['class'=>'form-control']) !!}
                    <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                </div>
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