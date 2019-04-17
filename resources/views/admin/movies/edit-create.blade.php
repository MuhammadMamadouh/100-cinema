@extends('adminlte::page')
@section('title', $title)
<!-- Main content -->
@section('content')
    <div class="row">
        <div class="modal-content col-md-8">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Movie</h4>
            </div>

            <div class="modal-body ">
                @if(isset($movie))
                    {!! Form::open(['url' => aurl("movies/$movie->id"), 'method'=> 'put', 'files'=> true]) !!}
                @else
                    {!! Form::open(['url' => aurl('movies'), 'method'=> 'post','files'=> true, 'id'=> 'frm-insert']) !!}
                @endif


                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::label('title') !!}
                    {!! Form::text('title',isset($movie) ? $movie->title : '',['class'=>'form-control','placeholder'=>'title']) !!}
                    <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                    @if ($errors->has('title'))
                        <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('playtime') ? 'has-error' : '' }}">
                    {!! Form::label('playtime') !!}
                    {!! Form::text('playtime',isset($movie) ? $movie->playtime : '',['class'=>'form-control','placeholder'=>'playtime' ]) !!}

                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('playtime'))
                        <span class="help-block">
                        <strong>{{ $errors->first('playtime') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('country') ? 'has-error' : '' }}">
                    {!! Form::label('country') !!}
                    {!! Form::text('country',isset($movie) ? $movie->country : '',['class'=>'form-control','placeholder'=>'country' ]) !!}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('country'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('language') ? 'has-error' : '' }}">
                    {!! Form::label('language') !!}
                    {!! Form::text('language',isset($movie) ? $movie->playtime : '',['class'=>'form-control','placeholder'=>'language' ]) !!}
                    @if ($errors->has('language'))
                        <span class="help-block">
                        <strong>{{ $errors->first('language') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('year') ? 'has-error' : '' }}">
                    {!! Form::label('Year') !!}
                    {!! Form::text('year',isset($movie) ? $movie->year : '',['class'=>'form-control','placeholder'=>'year' ]) !!}

                </div>
                <div class="form-group has-feedback {{ $errors->has('trailer') ? 'has-error' : '' }}">
                    {!! Form::label('Trailer') !!}
                    {!! Form::text('trailer',isset($movie) ? "https://www.youtube.com/watch?v=$movie->trailer" : '',['class'=>'form-control','placeholder'=>'trailer' ]) !!}
                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback {{ $errors->has('story') ? 'has-error' : '' }}">
                    {!! Form::label('Story') !!}
                    {!! Form::textarea('story',isset($movie) ? $movie->story : '',['class'=>'form-control','placeholder'=>'story' ]) !!}
                    <span class="glyphicon glyphicon-align-center form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback {{ $errors->has('poster') ? 'has-error' : '' }}">
                    {!! Form::label('poster','poster') !!}
                    {!! Form::file('poster',['class'=>'form-control']) !!}
                    <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                </div>
            </div>
            <div class="modal-footer">
            <span class="help-block pull-left">
                <strong id="add-error"></strong>
            </span>


                <button type="submit" class="btn btn-primary">Add</button>
                {!! Form::close() !!}
                <a href="{{aurl('movies')}}" type="button" class="btn btn-info" data-dismiss="modal">cancel</a>
            </div>
        </div>
        <div class="col-md-3">
            <img id="view-image" src="{{image_url($movie->poster)}}" class="img-thumbnail" height="200">
        </div>

    </div>
@endsection
@section('js')

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

        $('#poster').change(function (e) {
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
