<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger" id="delete" data-id="{{$id}}"
        data-toggle="modal" data-target="#delete_modal{{ $id }}">
    <i class="fa fa-trash"></i>
</button>

<!-- Modal -->
<div id="delete_modal{{ $id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Cast</h4>
            </div>
            {!! Form::open(['route'=>['cast.destroy',$id],'method'=>'delete','id'=> 'frm_delete_'.$id]) !!}
            <div class="modal-body">
                <h4>Do You want to delete {{$name}}</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">close</button>
                {!! Form::submit('yes',['class'=>'btn btn-danger']) !!}
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>