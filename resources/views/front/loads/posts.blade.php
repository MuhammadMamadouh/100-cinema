<?php
$user = \App\User::find($post->user_id);
?>
<article class="post" id="post_{{$post->id}}">

    <div class="panel panel-default arrow left">
        <header class="col-sm-2 hidden-xs">
            <div class="">
                <figure class="thumbnail">
                    <img class="img-responsive"
                         @if($post->user()->first()->image)
                         src="{{\Storage::url($post->user()->first()->image)}}"
                         alt="{{$user->image}}"
                         @else
                         src="{{asset('public/images/user.png')}}"
                            @endif
                    >
                    <figcaption class="text-center"><a
                                href="#">{{$user->name}}</a>
                    </figcaption>
                </figure>
            </div>
        </header>
        <div class="panel-body col-sm-10">
            @auth
                @if($user->id === auth()->user()->id)
                    <div class="btn-group pull-right post-menue">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="edit-post" id="{{$post->id}}" data-toggle="modal"
                                   data-target="#edit_modal{{$post->id}}"><i
                                            class="fa fa-pencil-square-o"></i>Edit</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" class="delete-post" id="{{$post->id}}"><i class="fa fa-trash-o"></i> Delete</a>
                            </li>
                        </ul>
                    </div>
                @endauth
                <div class="modal fade" id="edit_modal{{$post->id}}" tabindex="-1" role="dialog"
                     aria-labelledby="editModal"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModal">Edit Post</h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['route' => ['posts.update', $post->id], 'method'=> 'put','id'=>'frm-updte-'.$post->id, 'files'=> true]) !!}
                                <input type="hidden" name="user_id"
                                       value="{{\Auth::user()->id}}">
                                <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                                    {!! Form::label('title') !!}
                                    {!! Form::text('title',$post->title,['class'=>'form-control  input']) !!}
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                                    {!! Form::label('details') !!}
                                    {!! Form::textarea('details',$post->details,['class'=>'form-control  input']) !!}
                                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
                                    {!! Form::label('image') !!}
                                    {!! Form::file('image',['class'=>'form-control']) !!}
                                    <img src="{{\Storage::url($post->image)}}" style="width: 50px; height: 50px">
                                    <span class="glyphicon glyphicon-camera form-control-feedback"></span>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger pull-right">
                                        <i class="fa fa-share"></i>Save changes
                                    </button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="post-user">
                <h3 class="post-title">{{$post->title}}</h3>

            </div>
            <time class="post-date"><i class="fa fa-clock-o"></i> {{$post->created_at->diffForHumans()}}
            </time>

            <div class="post-details">
                {!! nl2br($post->details) !!}
            </div>
        </div>
        <div class="post-image">
            <img src="{{\Storage::url($post->image)}}"
                 class="img-responsive" style="max-height: 500px">
        </div>
        <div class="post-box-footer">
            <a class="user btn btn-default like" data-post_id="{{$post->id}}">
                <span id="likesCount-{{$post->id}}">
                    {{$post->likes()->count()}}
                </span>
                <i class="fa fa-thumbs-up "></i>
                <span id="liked-{{$post->id}}">
                    @foreach($post->likes as $like)
                        @if(auth()->check())
                            @if($like->user_id == auth()->user()->id)
                                <b>Liked</b>
                                @break
                            @endif
                        @endif
                    @endforeach
                </span>
            </a>
            <a href="{{route('posts.show', $post->id)}}" class="category col-md-6">
                <span class="main">{{$post->comments->count()}} comments</span>
            </a>
            <a href="#" class="user col-md-4">
                <iframe src="https://www.facebook.com/plugins/share_button.php?href=http://localhost/imdb/posts/{{$post->id}}&layout=button&size=small&mobile_iframe=true&appId=195198244755555&width=59&height=20"
                        width="59" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowTransparency="true" allow="encrypted-media"></iframe>

            </a>
        </div>
    </div>

</article>