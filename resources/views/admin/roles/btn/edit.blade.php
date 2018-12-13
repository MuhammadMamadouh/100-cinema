<a href="#" data-toggle="modal" data-target="#edit_modal{{$id}}" id="edit" class="btn btn-info"
   data-id="{{$id}}">Edit</a>

<div id="edit_modal{{$id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Role</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['route' => ['roles.update', $id], 'method'=> 'put','id'=>'frm-update-'.$id]) !!}
                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">

                    <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                        <input type="text" name="name" class="form-control input" value="{{ $name}}"
                               placeholder="full name">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('display_name') ? 'has-error' : '' }}">
                        <input type="text" name="display_name" class="form-control input" value="{{ $display_name}}"
                               placeholder="display name">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
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
