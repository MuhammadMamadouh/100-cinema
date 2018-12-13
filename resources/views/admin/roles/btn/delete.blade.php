<!-- Trigger the modal with a button -->
<a class="btn btn-danger" data-toggle="modal" data-target="#delete_modal{{ $id }}" data-id="{{$id}}" id="delete">
    <i class="fa fa-trash"></i></a>

<!-- Modal -->
<div id="delete_modal{{ $id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Role</h4>
            </div>
            {!! Form::open(['route'=>['roles.destroy',$id],'method'=>'delete', 'id'=> 'frm-delete-'.$id]) !!}
            <div class="modal-body">
                <h4>You Want to delete {{$name}} ?</h4>
            </div>
            <div class="modal-footer">
                 <span class="help-block pull-left">
                    <strong id="delete-error"></strong>
                </span>
                <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
                {!! Form::submit('yes',['class'=>'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>