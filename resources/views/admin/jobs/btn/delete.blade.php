<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del_cast{{ $id }}"><i class="fa fa-trash"></i></button>

<!-- Modal -->
<div id="del_cast{{ $id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Cast</h4>
            </div>
            {!! Form::open(['route'=>['jobs.destroy',$id],'method'=>'delete']) !!}
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