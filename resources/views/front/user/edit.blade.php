@extends('layouts.front')
<!-- Main content -->
@section('title', auth()->user()->name . ' edit profile')
@section('content')
    <div class=" main_container">
        <section class=" pad">
            <div class="tab-pane" id="edit">

                <h2 class="h1">Edit profile</h2>
                {!! Form::open(['url' => route('editProfile', ['id'=> auth()->user()->id]) , 'method'=> 'post', 'id'=> 'frm-insert', 'aria-label'=> __('Register'), 'files'=> true]) !!}

                <div class="row">

                    <div class="col-sm-8">
                        <div class="form-group row">
                            {!! Form::label('Full name', 'Full name', ['class="col-lg-3 col-form-label form-control-label"']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('name',auth()->user()->name,['class="form-control text-md-right"']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('Email', 'Email', ['class="col-lg-3 col-form-label form-control-label"']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('email',auth()->user()->email,['class="form-control text-md-right"']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('current password', 'Current Password', ['class="col-lg-3 col-form-label form-control-label"']) !!}
                            <div class="col-lg-9">
                                {!! Form::password('password',['class="form-control text-md-right"', 'autoComplete'=> 'off']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('site', 'website', ['class="col-lg-3 col-form-label form-control-label"']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('site',auth()->user()->site,['class="form-control text-md-right"']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('about', 'about', ['class="col-lg-3 col-form-label form-control-label"']) !!}
                            <div class="col-lg-9">
                                {!! Form::textarea('about',auth()->user()->about,['class="form-control text-md-right"']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('short_bio', 'Short bio', ['class="col-lg-3 col-form-label form-control-label"']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('short_bio' ,auth()->user()->short_bio,['class="form-control text-md-right"']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('new_password', 'New Password', ['class="col-lg-3 col-form-label form-control-label"']) !!}
                            <div class="col-lg-9">
                                {!! Form::password('new_password', ['class="form-control text-md-right"'],['type' => 'password']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('password_confirmation', 'Confirm New password', ['class="col-lg-3 col-form-label form-control-label"']) !!}
                            <div class="col-lg-9">
                                {!! Form::password('password_confirmation', ['class="form-control text-md-right"']) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('country', 'Country', ['class="col-lg-3 col-form-label form-control-label"']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('country' , auth()->user()->country,['class="form-control text-md-right"']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center">
                        <!-- User Profile Image -->
                        @if(auth()->user()->image != null)
                            <img src="{{\Storage::url(auth()->user()->image)}}" style="height: 150px" width="150px"
                                 class="mx-auto img-fluid img-circle d-block profile-pic" alt="avatar">
                        @else
                            <img src="{{asset('public/images/user.png')}}" style="height: 150px" width="150px"
                                 class="mx-auto img-fluid img-circle d-block result-pic" alt="avatar">
                        @endif
                        <i class="fa fa-camera upload-button"></i>
                        <div class="p-image">
                            <input class="file-upload" name="image" type="file" accept="image/*"/>
                            <p class="lead">change profile photo</p>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                {!! Form::close() !!}
            </div>
        </section>
    </div>


@endsection
