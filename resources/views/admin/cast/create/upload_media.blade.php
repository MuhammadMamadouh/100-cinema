<div id="add_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload Media</h4>
            </div>

            <div class="modal-body">
                {!! Form::open(['url' => route('addCastImage'), 'method'=> 'post', 'files'=> true, 'id'=> 'frm-insert']) !!}

                <input type="hidden" name="cast_id" value="{{$cast_id}}">

                <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
                    {!! Form::label('images','image') !!}
                    {!! Form::file('images[]',['class'=>'form-control', 'multiple'=> true]) !!}
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
</div>
