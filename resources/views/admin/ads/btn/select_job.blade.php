<a href=#" class="btn btn-info" data-toggle="modal" data-target="#addJob{{$id}}">Select Job</a>

<div class="modal fade" id="addJob{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Crew</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-style-5">
                    <form id="ins_job" class="form-horizontal" method="POST" action="{{route('addCrew')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="cast_id" value="{{$id}}">
                        <input type="hidden" name="movie_id" value="{{\request()->route()->parameter('id')}}">
                        <fieldset>
                            <legend><span class="number"></span>Select Job</legend>
                            @foreach($jobs as $job)
                                <label class="container">{{$job->name}}
                                    <input name="jobs[]" value="{{$job->id}}" type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach
                        </fieldset>
                        <button type="submit" class="btn btn-primary">add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>