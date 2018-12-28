@if(count($reviews) > 0)
    @foreach($reviews as $review)
        <article class="row" id="comment-{{$review->id}}">
            <div class="col-md-2 col-sm-2 hidden-xs">
                <figure class="thumbnail">

                    <img class="img-responsive"
                         @if($review->user->image != null)
                         src="{{\Storage::url($review->user->image)}}" alt="{{$review->user->name}}"
                         @else
                         src="{{asset('public/images/user.png')}}"
                            @endif
                    >
                </figure>
            </div>
            <div class="col-md-10 col-sm-10">
                <div class="panel panel-default arrow left">
                    <div class="panel-body">
                        @auth
                            @if($review->user->id === auth()->user()->id)
                                <div class="btn-group pull-right comment-menue">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" class="edit-comment" id="{{$review->id}}" data-toggle="modal"
                                               data-target="#edit_modal{{$review->id}}"><i
                                                        class="fa fa-pencil-square-o"></i>Edit</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#" class="delete-comment" id="{{$review->id}}"><i
                                                        class="fa fa-trash-o"></i>Delete</a>
                                        </li>
                                    </ul>
                                </div>

                            @endauth
                            <div class="modal fade" id="edit_modal{{$review->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="editModal"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModal">Edit Review</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['route' => ['reviews.update', $review->id], 'method'=> 'put','id'=>'frm-update-'.$review->id]) !!}
                                            <input type="hidden" name="user_id"
                                                   value="{{\Auth::user()->id}}">
                                            <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                                                {!! Form::label('review') !!}
                                                {!! Form::textarea('review',$review->review,['class'=>'form-control input']) !!}
                                                <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                            </div>
                                            <div class="review-block-rate col-sm-5">
                                                <input type="number" name="rate" id="rate"
                                                       class="rating" value="{{$review->rate}}"
                                                       data-icon-lib="fa" data-active-icon="fa-star"
                                                       data-inactive-icon="fa-star-o"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger pull-right">Save changes
                                                </button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="review-block-rate col-sm-4 pull-right">

                            @for($i=0; $i<$review->rate; $i++ )
                                <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                            @endfor
                            @for($i=0; $i<(5-$review->rate); $i++ )
                                <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                </button>
                            @endfor
                        </div>
                        <header class="text-left">
                            <div class="comment-user"><i class="fa fa-user"></i>
                                <a href="{{url('user')}}/{{$review->user->id}}">{{$review->user->name}}</a>
                            </div>
                            <time class="comment-date" datetime="16-12-2014 01:05"><i
                                        class="fa fa-clock-o"></i> {{$review->created_at}}
                            </time>
                        </header>

                        <div class="comment-post">
                            <div class="b-description_readmore js-description_readmore"
                                 id="comment-text-{{$review->id}}">
                                {!! htmlspecialchars_decode($review->review) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
@else
    <article class="row">
        <div class="col-md-10 col-sm-10">
            <div class="panel panel-default arrow left">
                <div class="panel-body">
                    <div class="comment-post">
                        <p class="lead">
                            This movie has not any reviews yet,
                            be the first one
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endif