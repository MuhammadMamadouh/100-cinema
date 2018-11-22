@extends('adminlte::page')
@section('title', 'posts')
<!-- Main content -->
@section('content')
    @include('admin.posts.create')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Posts </h3>
        </div>
        <div id="type"></div>
        <p id="msg" style="display: none" class="alert alert-success col-sm-5 pull-right"></p>
        <!-- /.box-header -->
        <div class="box-body">
            {{--{!! Form::open(['id'=>'form_data','url'=>aurl('posts/destroy/all'),'method'=>'delete']) !!}--}}
            {!! $dataTable->table(['class'=>'dataTable table table-responsive table-striped table-hover  table-bordered', 'id'=> 'posts'],true) !!}
            {{--{!! Form::close() !!}--}}
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->


    <div id="mutlipleDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger">
                        <div class="empty_record hidden">
                            <h4>{{ trans('admin.please_check_some_records') }} </h4>
                        </div>
                        <div class="not_empty_record hidden">
                            <h4>{{ trans('admin.ask_delete_itme') }} <span class="record_count"></span> ? </h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{ trans('admin.close') }}</button>
                    </div>
                    <div class="not_empty_record hidden">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">No
                        </button>
                        <input type="submit" value="Yes" class="btn btn-danger del_all"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).ready(function () {

                // $('#frm-insert').on('submit', function (e) {
                //
                //     e.preventDefault();
                //
                //     var form = $('#frm-insert');
                //
                //     var url = form.attr('action');
                //
                //     var data = new FormData(form[0]);
                //
                //     var formResults = $('#add-error');
                //
                //     $.ajax({
                //         url: url,
                //         data: data,
                //         type: 'POST',
                //         dataType: 'json',
                //         beforeSend: function () {
                //             formResults.removeClass().addClass('alert alert-info').html('Loading...');
                //         },
                //         cache: false,
                //         processData: false,
                //         contentType: false,
                //     })
                //         .done(function (results) {
                //             if (results.success) {
                //                 formResults.removeClass().addClass('alert alert-success').html(results.success);
                //                 $('#add_modal').modal('hide').fadeOut(1500);
                //                 $('#msg').html(data.success).fadeOut(2000);
                //                 $('#posts').DataTable().draw(true);
                //             }
                //
                //             if (results.redirectTo) {
                //                 window.location.href = results.redirectTo;
                //             }
                //         })
                //
                //         .fail(function (results) {
                //             formResults.removeClass().addClass('alert alert-danger').html(results.responseJSON.message);
                //             $.each(results.responseJSON, function (index, val) {
                //                 for (var error in val) {
                //                     console.log(val[error]);
                //                     formResults.text(val[error]);
                //                 }
                //             })
                //
                //         });
                // });
                //

                $('body').delegate('#posts #edit', 'click', function (e) {
                    var id = $(this).data('id');
                    console.log(id);
                    $('#frm_update_' + id).on('submit', function (e) {

                        e.preventDefault();

                        var form = $('#frm_update_' + id);
                        var url = form.attr('action');
                        var data = new FormData(form[0]);
                        var formResults = $('#edit-error');

                        $.ajax({
                            type: 'POST',
                            url: url,
                            data: data,
                            dataType: 'json',
                            beforeSend: function () {
                                formResults.removeClass().addClass('alert alert-info').html('Loading....');
                            },
                            cache: false,
                            contentType: false,
                            processData: false,
                        })
                            .done(function (results) {
                                formResults.removeClass().addClass('alert alert-success').html(results.success);
                                $('#edit_modal' + id).modal('hide').fadeOut(1500);
                                $('#msg').html(data.success).delay(1000).fadeOut(2000);
                                $('#posts').DataTable().draw(false);
                            })
                            .fail(function (data) {
                                $.each(data.responseJSON, function (index, val) {
                                    for (x in val) {
                                        console.log(val[x])
                                        $('#edit-error').text(val[x]);
                                    }
                                })
                            })
                    });
                });
                $('body').delegate('#posts #delete', 'click', function (e) {
                    var id = $(this).data('id');
                    console.log(id);
                    //Delete
                    $('#frm_delete_' + id).on('submit', function (e) {
                        console.log('submit');
                        e.preventDefault();
                        var form = $('#frm_delete_' + id);
                        var url = form.attr('action');
                        var data = new FormData(form[0]);
                        var formResults = $('#delete-error');

                        $.ajax({
                            type: 'POST',
                            url: url,
                            data: data,
                            dataType: 'json',
                            beforeSend: function () {
                                formResults.removeClass().addClass('alert alert-info').html('Loading....');
                            },
                            success: function (results) {
                                formResults.removeClass().addClass('alert alert-success').html(results.success);
                                $('#delete_modal' + id).modal('hide').fadeOut(1500);
                                $('#msg').html(data.success).delay(1000).fadeOut(2000);
                                $('#posts').DataTable().draw(true);
                            },
                            cache: false,
                            contentType: false,
                            processData: false,
                        })

                    });
                });
            });


            delete_all(); // function of check all checkboxes
        </script>
        {!! $dataTable->scripts() !!}
    @endpush
@endsection