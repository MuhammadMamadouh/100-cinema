<a href="#" data-toggle="modal" data-target="#edit_modal{{$id}}" id="edit" class="btn btn-info"
   data-id="{{$id}}">Edit</a>

<div id="edit_modal{{$id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Post</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => ['posts.update', $id], 'method'=> 'put','id'=>'frm-update-'.$id, 'files'=> true]) !!}

                <input type="hidden" name="user_id" value="{{\auth('admin')->user()->id}}">

                <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                    {!! Form::label('title') !!}
                    {!! Form::text('title',$title,['class'=>'form-control  input']) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                    {!! Form::label('details') !!}
                    {!! Form::textarea('details',$details,['class'=>'form-control  input']) !!}
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

                </div>
                <img src="{{\Storage::url($image)}}" width="50" height="50">
                <div class="modal-footer">
                    <span class="help-block pull-left">
                        <strong id="edit-error"></strong>
                    </span>
                    <button type="submit" class="btn btn-primary">update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>