<div class="comments-section-grid">
    <div class="col-md-2 comments-section-grid-image">
        <img src="{{image_url($comment->user->image)}}" class="img-responsive" alt=""/>
    </div>
    <div class="col-md-10 comments-section-grid-text">
        <h4><a href="#">{{$comment->user->name}}</a></h4>
        <label>{{$comment->created_at->diffForHumans()}} </label>
        <p>{{$comment->body}}.</p>
        <span><a href="#">Reply</a></span>
        <i class="rply-arrow"></i>
    </div>
    <div class="clearfix"></div>
</div>