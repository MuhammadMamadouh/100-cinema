@extends('adminlte::page')
<!-- Main content -->
@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Movies </h3>
        </div>

        <div class="box-body">
            {!! Form::open(['id'=>'form_data','url'=>aurl('jobs/destroy/all'),'method'=>'delete']) !!}
            {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover  table-bordered'],true) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <div id="mutlipleDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Cast</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <div class="empty_record hidden">
                            <h4>please check some records</h4>
                        </div>
                        <div class="not_empty_record hidden">
                            <h4>Are you sure you want to delete These records  <span class="record_count"></span> ? </h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">Close</button>
                    </div>
                    <div class="not_empty_record hidden">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">No</button>
                        <input type="submit" value="Yes" class="btn btn-danger del_all"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            delete_all();
        </script>
        {!! $dataTable->scripts() !!}
    @endpush
@endsection