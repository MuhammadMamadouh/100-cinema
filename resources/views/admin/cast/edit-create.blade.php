@extends('adminlte::page')
@section('title', $title)
<!-- Main content -->
@section('content')
    <div class="row">
        <div class="modal-content col-md-8">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create Cast person</h4>
            </div>

            <div class="modal-body">

                @if(isset($cast))
                    {!! Form::open(['url' => aurl("cast/$cast->id"), 'method'=> 'put', 'files'=> true]) !!}
                @else
                    {!! Form::open(['url' => aurl('cast'), 'method'=> 'post','files'=> true]) !!}
                @endif

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::text('name',isset($cast) ? $cast->name : '',['class'=>'form-control  input','placeholder'=>'Full Name' ]) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('country') ? 'has-error' : '' }}">
                    {!! Form::text('country',isset($cast) ? $cast->country : '',['class'=>'form-control input','placeholder'=>'Country' ]) !!}
                    <span class="glyphicon glyphicon-adjust form-control-feedback"></span>
                    @if ($errors->has('country'))
                        <span class="help-block">
                            <strong>{{ $errors->first('country') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('about') ? 'has-error' : '' }}">
                    {!! Form::textarea('about',isset($cast) ? $cast->about : '',['class'=>'form-control input','placeholder'=>'about' ]) !!}
                    @if ($errors->has('about'))
                        <span class="help-block">
                            <strong>{{ $errors->first('about') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('job') ? 'has-error' : '' }}">
                    {!! Form::label('job') !!}
                    <div>

                    </div>
                    @foreach($jobs as $job)
                        <label>{{$job->name}}
                            <input class="form-control minimal" type="checkbox" name="jobs[]" value="{{$job->id}}"
                                   @if(isset($cast_jobs))
                                   @foreach($cast_jobs as $cast_job)
                                   @if($job->id === $cast_job->id) checked @endif
                                    @endforeach
                                    @endif
                            >
                        </label>
                    @endforeach

                </div>
                <div class="form-group has-feedback {{ $errors->has('image') ? 'has-error' : '' }}">
                    {!! Form::label('image','Profile Picture') !!}
                    {!! Form::file('image',['class'=>'form-control']) !!}
                    <span class="glyphicon glyphicon-picture form-control-feedback"></span>
                </div>

                <div class="modal-footer">
                 <span class="help-block pull-left">
                    <strong id="add-error"></strong>
                </span>

                    <button type="submit" class="btn btn-primary">Add</button>
                    {!! Form::close() !!}
                    <a href="{{aurl('cast')}}" type="button" class="btn btn-info">cancel</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <img id="view-image" src="{{isset($cast) ? image_url($cast->image) : asset('images/user.png')}}"
                 class="img-thumbnail" height="200">
        </div>
    </div>
@endsection
@section('js')

    <script>

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
