<a href="#" data-toggle="modal" data-target="#edit_modal{{$id}}" id="edit" class="btn btn-info"
   data-id="{{$id}}">Edit</a>

<div id="edit_modal{{$id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Movie</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['route' => ['movies.update', $id], 'method'=> 'put', 'files'=> true,'id'=>'frm-update-'.$id]) !!}

                <div class="form-group has-feedback">
                    {!! Form::label('title') !!}
                    {!! Form::text('title',$title,['class'=>'form-control','placeholder'=>'title']) !!}
                    <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {!! Form::label('playtime') !!}
                    {!! Form::text('playtime',$playtime,['class'=>'form-control','placeholder'=>'playtime' ]) !!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback ">
                    {!! Form::label('country') !!}
                    {!! Form::text('country',$country,['class'=>'form-control','placeholder'=>'country' ]) !!}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    {!! Form::label('language') !!}
                    {!! Form::text('language',$language,['class'=>'form-control','placeholder'=>'language' ]) !!}
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {!! Form::label('year') !!}
                    {!! Form::text('year', $year,['class'=>'form-control','placeholder'=>'year' ]) !!}
                    <span class="glyphicon glyphicon-link form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback">
                    {!! Form::label('trailer') !!}
                    {!! Form::text('trailer','https://www.youtube.com/watch?v='.$trailer,['class'=>'form-control','placeholder'=>'trailer' ]) !!}
                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {!! Form::label('story') !!}
                    {!! Form::textarea('story',$story,['class'=>'form-control','placeholder'=>'story' ]) !!}
                    <span class="glyphicon glyphicon-align-center form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">

                    {!! Form::label('poster','poster') !!}
                    {!! Form::file('poster',['class'=>'form-control']) !!}
                    <img src="{{\Storage::url($poster)}}" width="50" height="50">
                    <span class="glyphicon glyphicon-picture form-control-feedback"></span>


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
</div>
