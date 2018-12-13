@extends('layouts.adminlte.index')
@section('title', 'Admins')
<!-- Main content -->
@section('content')
    @include('admin.admins.create')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Admins </h3>
        </div>
        <p id="msg" style="display: none" class="alert alert-success col-sm-5 pull-right"></p>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['id'=>'form_data','url'=>aurl('admins/destroy/all'),'method'=>'delete']) !!}
            {!! $dataTable->table(['class'=>'dataTable table table-responsive table-striped table-hover  table-bordered', 'id'=> 'table'],true) !!}
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
            delete_all(); // function of check all checkboxes
        </script>
        {!! $dataTable->scripts() !!}
    @endpush
@endsection