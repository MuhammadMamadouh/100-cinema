<div id="edit_post" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete</h4>
            </div>

            <div class="modal-body">

                {!! Form::open(['route' => ['posts.update', $post->id], 'method'=> 'put', 'id'=> 'update_post']) !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">

                    <input type="text" name="name" class="form-control" value="{{ $post->name }}"
                           placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
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
