@extends('adminlte::page')
<!-- Main content -->
@section('content')
    <div class=" main_container">
        <div class="content_inner_bg row m0">
            <section class="about_person_area pad" id="about">
                <div class="row">
                    <div class="col-md-3">
                        <div class="person_img">
                            <img src="{{\Storage::url($cast->image)}}" alt="{{$cast->name}}" width="200" height="200">
                            <h3><span>{{$cast->name}}</span></h3>
                            <button class="btn btn-primary" type="button" id='upload-button'>
                                upload <span class="badge"> <span class="fa fa-upload"></span></span>
                            </button>
                            {!! Form::open(['url' => route('addCastMedia'),  'method'=> 'post', 'files'=> true, 'id'=> 'frm-insert', 'class'=> 'navbar-form navbar-left']) !!}
                            <input type="hidden" name="cast_id" value="{{$cast->id}}">
                            {!! Form::file('images[]',['class'=>'form-control hidden', 'id'=>'upload-form', 'multiple'=> true]) !!}

                            <span class="help-block pull-left">
                                <strong id="add-error"></strong>
                            </span>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="person_details" id="slider-thumbs">
                            <!-- Bottom switcher of slider -->
                            <ul class="hide-bullets" id="media">
                                @for($image=0; $image<count($media); $image++)
                                    <li class="col-sm-3">
                                        <a class="thumbnail">
                                            <img src="{{\Storage::url($media[$image]->path)}}"
                                                 alt="{{$cast->name}}">
                                            <div class="overlay" data-id="{{$media[$image]->id}}" id="{{$image}}">
                                                <span class="fa fa-trash-o .gallery_delete"></span>
                                            </div>
                                        </a>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('.item:first-of-type').addClass('active');
            $('#myCarousel').carousel({
                interval: 5000
            });

            //Handles the carousel thumbnails
            $('[id^=carousel-selector-]').click(function () {
                var id_selector = $(this).attr("id");
                try {
                    var id = /-(\d+)$/.exec(id_selector)[1];
                    console.log(id_selector, id);
                    jQuery('#myCarousel').carousel(parseInt(id));
                } catch (e) {
                    console.log('Regex failed!', e);
                }
            });
            // When the carousel slides, auto update the text
            $('#myCarousel').on('slid.bs.carousel', function (e) {
                var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-' + id).html());
            });
            $('#upload-button').click(function () {
                $('#upload-form').click();
            });


            document.getElementById("upload-form").onchange = function () {
                var form = $('#frm-insert');

                var url = form.attr('action');

                var data = new FormData(form[0]);

                var formResults = $('#add-error');

                $.ajax({
                    url: url,
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function () {
                        formResults.removeClass().addClass('alert alert-info').html('Loading...');
                    },
                    cache: false,
                    processData: false,
                    contentType: false,
                })
                    .done(function (results) {
                        if (results.success) {
                            formResults.removeClass().addClass('alert alert-success').html(results.success);

                            toastr.success(results.success);
                            form.each(function () {
                                this.reset();
                            });
                            formResults.removeClass();
                        }

                        if (results.redirectTo) {
                            window.location.href = results.redirectTo;
                        }
                        if (results.media) {
                            formResults.html('').removeClass();
                            $.each(results.media, function (index, val) {
                                $('#media').append(val);
                            });
                        }
                    })

                    .fail(function (results) {
                        $.each(results.responseJSON.errors, function (index, val) {
                            toastr.info(val)
                        });
                        formResults.removeClass().addClass('alert alert-danger').html(results.responseJSON.message);
                    });
            };
            $('.overlay').click(function (e) {

                var divID = $(this).attr('id');
                var media = $(this).parentsUntil('.hide-bullets');

                if (confirm('are you sure?')) {
                    var id = $(this).data('id');
                    console.log(id);
                    url = '{{aurl('cast/destroy-media')}}';
                    console.log(url);
                    $.ajax({
                        type: 'POST',
                        url: '{{aurl('cast/destroy-media')}}',
                        datatype: 'json',
                        data: {
                            _token: '{{csrf_token()}}',
                            id: id,
                        },
                        beforeSend: function () {
                            toastr.info('Loading...');
                        },
                        success: function (data) {
                            if (data.exception) {
                                toastr.warning('there is something error');
                            }
                            if (data.success) {
                                toastr.success(data.success);
                                media.remove();
                                curousel = $("[data-slide-number=" + divID + "]").remove();
                                toastr.remove('info');
                            }
                        },
                        error: function (data) {

                            console.log(data)
                        }
                    });
                }
            })
        });
    </script>
@endsection