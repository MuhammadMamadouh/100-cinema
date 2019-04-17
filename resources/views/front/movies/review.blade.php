<div class="comments-section-grid" id="comment-{{$review->id}}">

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
                           data-target="#edit_modal"><i
                                    class="fa fa-pencil-square-o"></i>Edit</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#" class="delete-comment" id="{{$review->id}}"><i
                                    class="fa fa-trash-o"></i>Delete</a>
                    </li>
                </ul>
            </div>

        @endif
    @endauth
    <div class="col-md-2 comments-section-grid-image">
        <img src="{{image_url($review->user->image)}}" class="img-responsive" alt=""/>
    </div>
    <div class="col-md-10 comments-section-grid-text">
        <h4><a href="#">{{$review->user->name}}</a></h4>
        <label>{{$review->created_at->diffForHumans()}} </label>
        <p id="review-{{$review->id}}">{{$review->review}}.</p>

    </div>
    <div class="clearfix"></div>
</div>