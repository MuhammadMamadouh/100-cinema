<div id="add_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Role</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => aurl('roles'), 'method'=> 'post', 'id'=> 'frm-insert']) !!}

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control input" value="{{ old('name') }}"
                           placeholder=" name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback {{ $errors->has('display_name') ? 'has-error' : '' }}">
                    <input type="text" name="display_name" class="form-control input"
                           placeholder="display name">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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
