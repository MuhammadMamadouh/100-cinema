@extends('layouts.page')
@section('title', 'create post')
@section('css')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
    <div class=" main_container col-md-9 pad" xmlns="">
        <div class="content_inner_bg m0">
            @if(isset($post))
                {!! Form::open(['url' => route('posts.update', $post->id), 'method'=> 'put', 'id'=> 'frm-insert', 'files'=> true]) !!}
            @else
                {!! Form::open(['url' => url('posts'), 'method'=> 'post', 'id'=> 'frm-insert', 'files'=> true]) !!}
            @endif
            <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                {!! Form::label('title') !!}
                <input name="title" id="title" title="title" value="{{isset($post) ? $post->title : ''}}"
                       class='form-control'>
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('slug') ? 'has-error' : '' }}">
                {!! Form::label('slug') !!}
                <input name="slug" id="title" title="slug" value="{{isset($post) ? $post->slug : ''}}"
                       class='form-control'>
                @if ($errors->has('slug'))
                    <span class="help-block">
                        <strong>{{ $errors->first('slug') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
                {!! Form::label('image') !!}
                {!! Form::file('image',['class'=>'form-control']) !!}
                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                {!! Form::label('details') !!}

                <textarea name="details" id="details" title="details" value="{{isset($post) ? $post->details : ''}}"
                          class='form-control'>{{isset($post) ? $post->details : ''}}</textarea>
                @if ($errors->has('details'))
                    <span class="help-block">
                        <strong>{{ $errors->first('details') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        @if(isset($post))
            <button type="submit" class="btn btn-primary">update</button>
        @else
            <button type="submit" class="btn btn-primary">post</button>
        @endif

        {!! Form::close() !!}
        <button type="button" class="btn btn-info submit-btn" data-dismiss="modal">Go Home</button>
    </div>
@endsection
@section('js')
    <script src="{{asset('js/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('details');
    </script>
@endsection
