@if(count($comments) > 0)
    @foreach($comments as $comment)
        <article class="row" id="comment-{{$comment->id}}">
            <div class="col-md-2 col-sm-2 hidden-xs">

                <figure class="thumbnail">
                    <img class="img-responsive"
                         @if($comment->user()->first()->image)
                         src="{{\Storage::url($comment->user()->first()->image)}}"
                         @else
                         src="{{asset('public/images/user.png')}}"
                            @endif
                    >
                    <figcaption class="text-center"><a
                                href="#">{{$comment->user()->first()->name}}</a>
                    </figcaption>
                </figure>


            </div>
            <div class="col-md-10 col-sm-10">
                <div class="panel panel-default arrow left">
                    <div class="panel-body">
                        @auth
                            @if($comment->user()->first()->id === auth()->user()->id)
                                <div class="btn-group pull-right comment-menue">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" class="edit-comment" id="{{$comment->id}}" data-toggle="modal"
                                               data-target="#edit_modal{{$comment->id}}"><i
                                                        class="fa fa-pencil-square-o"></i>Edit</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#" class="delete-comment" id="{{$comment->id}}"><i
                                                        class="fa fa-trash-o"></i>Delete</a>
                                        </li>
                                    </ul>
                                </div>

                            @endauth
                            <div class="modal fade" id="edit_modal{{$comment->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="editModal"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModal">Edit Comment</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['route' => ['comments.update', $comment->id], 'method'=> 'put','id'=>'frm-update-'.$comment->id]) !!}
                                            <input type="hidden" name="user_id"
                                                   value="{{\Auth::user()->id}}">
                                            <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                                                {!! Form::label('comment') !!}
                                                {!! Form::textarea('comment',$comment->comment,['class'=>'form-control input']) !!}
                                                <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
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
                        <header class="text-left">
                            <div class="comment-user"><i class="fa fa-user"></i>
                                <a href="#">{{$comment->user()->first()->name}}</a>
                            </div>
                            <time class="comment-date" datetime="16-12-2014 01:05"><i
                                        class="fa fa-clock-o"></i> {{$comment->created_at}}
                            </time>
                        </header>
                        <div class="comment-post">
                            <div class="b-description_readmore js-description_readmore"
                                 id="comment-text-{{$comment->id}}">{!! htmlspecialchars_decode($comment->comment )!!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
@endif