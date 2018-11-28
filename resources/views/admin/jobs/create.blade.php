<div id="add_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Admin</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => aurl('jobs'), 'method'=> 'post', 'id'=> 'frm-insert']) !!}

                <div class="form-group has-feedback">
                    {!! Form::text('name','',['class'=>'form-control','placeholder'=>'Job Name' ]) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
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

