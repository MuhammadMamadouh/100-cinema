<a href=#" class="btn btn-info" data-toggle="modal" data-target="#addCategory{{$id}}">Add Category</a>

<div class="modal fade" id="addCategory{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-style-5">
                    {!! Form::open(['url' => route('addCategory'), 'method'=> 'post', 'id'=> 'frm-insert']) !!}
                    <input name="movie_id" type="hidden" value="{{$id}}">

                    <fieldset>
                        <legend><span class="number"></span> Movie Categories:</legend>
                        @foreach($categories as $category)

                            <label class="container">{{$category->name}}
                                <input name="categotries[]"
                                       @foreach($movieCategories as $movieCategory)
                                       @if($category->id === $movieCategory->id) checked
                                       @endif
                                       @endforeach
                                       value="{{$category->id}}" type="checkbox">

                            </label>

                        @endforeach
                    </fieldset>
                    <div class="modal-footer">
                        <span class="help-block pull-left">
                            <strong id="edit-error"></strong>
                        </span>
                        <button type="submit" class="btn btn-primary">update</button>
                        {!! Form::close() !!}
                        <button type="button" class="btn btn-info" data-dismiss="modal">cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>