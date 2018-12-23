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
                    {!! Form::open(['url' => route('addCrew'), 'method'=> 'post', 'id'=> 'frm-insert']) !!}

                    <input type="hidden" name="cast_id" value="{{$id}}">
                    <input type="hidden" name="movie_id" value="{{\request()->route()->parameter('id')}}">
                    <fieldset>
                        <legend><span class="number"></span>Select Job</legend>
                        <?php
                        $movie = App\Models\Movies::find(\request()->route()->parameter('id'));
                        $crew = $movie->getCrewJob();?>
                        @foreach($jobs as $job)
                            <label class="container">{{$job->name}}
                                <input name="jobs[]"
                                       @foreach($crew as $person)
                                       @if($job->id === $person->job_id && $id === $person->id ) checked @endif
                                       @endforeach
                                       value="{{$job->id}}" type="checkbox">
                            </label>

                        @endforeach
                    </fieldset>
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
</div>