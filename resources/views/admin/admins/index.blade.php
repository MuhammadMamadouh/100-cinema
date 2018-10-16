@extends('adminlte::page')
@section('title', 'Admins')
<!-- Main content -->
@section('content')
    @include('admin.admins.create')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Admins </h3>
        </div>
        <button id="btn">click</button>
        <div id="type"></div>
        <p id="msg" style="display: none" class="alert alert-success col-sm-5 pull-right"></p>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['id'=>'form_data','url'=>aurl('admins/destroy/all'),'method'=>'delete']) !!}
            {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover  table-bordered', 'id'=> 'admins'],true) !!}
            {!! Form::close() !!}
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
                document.getElementById('password').onkeyup = function () {
                    'use strict';

                    document.getElementById('add-error').textContent = 50- this.value.length
                };
                $('#frm-insert').on('submit', function (e) {
                    e.preventDefault();
                    $('#msg').show();
                    $('#add-error').text('');
                    var data = $(this).serialize();
                    var url = $(this).attr('action');
                    var post = $(this).attr('method');
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: data,
                        dataType: 'json'
                    })
                        .done(function (data) {
                            $('#add_admin').modal('hide').fadeOut(500);
                            $('#msg').html('Admin has been added successfully').fadeOut(2000);
                            $('#admins').DataTable().draw(true);
                        })
                        .fail(function (data) {
                            $.each(data.responseJSON, function (index, val) {
                                for (x in val) {
                                    console.log(val[x])
                                    $('#add-error').text(val[x]);
                                }
                            })
                        })
                });
                $('body').delegate('#admins #edit', 'click', function (e) {
                    var id = $(this).data('id');
                    console.log(id);

                    $('#frm_update_' + id).on('submit', function (e) {
                        e.preventDefault();
                        $('#edit-error').text('');
                        var data = $(this).serialize();
                        var url = $(this).attr('action');
                        var post = $(this).attr('method');
                        $.ajax({
                            type: 'POST',
                            url: url,
                            data: data,
                            dataType: 'json'
                        })
                            .done(function (data) {
                                $('#edit_modal' + data.id).modal('hide');
                                $('#msg').html('Admin has been updated successfully').fadeOut(500);
                                $('#admins').DataTable().draw(true);

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
                $('body').delegate('#admins #delete', 'click', function (e) {
                    var id = $(this).data('id');
                    console.log(id);
                    //Delete Admin
                    $('#frm_delete_' + id).on('submit', function (e) {
                        e.preventDefault();
                        $('#msg').show();
                        var data = $(this).serialize();
                        var url = $(this).attr('action');
                        var post = $(this).attr('method');
                        $.ajax({
                            type: 'POST',
                            url: url,
                            data: data,
                            dataType: 'json'
                        })
                            .done(function (data) {
                                console.log(data.id)
                                $('#delete_modal' + data.id).modal('hide');
                                $('#msg').html('Admin has been deleted successfully');
                                $('#msg').fadeOut(2000);
                                $('#admins').DataTable().draw(true);
                            })
                            .fail(function (data) {
                                $.each(data.responseJSON, function (index, val) {
                                    for (x in val) {
                                        console.log(val[x])
                                    }
                                })
                            })
                    });
                });
            });

            delete_all(); // function of check all checkboxes
        </script>
        {!! $dataTable->scripts() !!}
    @endpush
@endsection