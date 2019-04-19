@extends('layouts.page')
@section('title', 'create post')
@section('css')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection

@section('content')
    <div class=" main_container col-md-9 pad" xmlns="">
        <div class="content_inner_bg m0">
            @if(isset($post))
                {!! Form::open(['url' => route('posts.update', $post->id), 'method'=> 'put', 'files'=> true]) !!}
            @else
                {!! Form::open(['url' => url('posts'), 'method'=> 'post', 'files'=> true]) !!}
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
            <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
                {!! Form::label('image') !!}
                {!! Form::file('image', ['id'=> 'image']) !!}

                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('title') ? 'has-error' : '' }}">
                {!! Form::label('details') !!}

                <textarea name="details" id="details" title="details" value="{{isset($post) ? $post->details : ''}}"
                          class='form-control input-group-lg'>{{isset($post) ? $post->details : ''}}</textarea>
                @if ($errors->has('details'))
                    <span class="help-block">
                        <strong>{{ $errors->first('details') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        @if(isset($post))
            <img id="view-image" src="{{image_url($post->image)}}" class="img-thumbnail pull-right" height="200">
        @else
            <img id="view-image" src="" class="img-responsive">
        @endif
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
        // CKEDITOR.replace('details');

        let readURL = function (input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#view-image').attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0])
            }
        };

        $('#image').change(function (e) {
            image = e.target.files[0];
            var mime_types = ['image/jpeg', 'image/png'];
            console.log(image.type);

            // validate MIME
            if (mime_types.indexOf(image.type) == -1) {
                alert('Error : Incorrect file type');
                return;
            }

            readURL(this)
        });
    </script>

@endsection
