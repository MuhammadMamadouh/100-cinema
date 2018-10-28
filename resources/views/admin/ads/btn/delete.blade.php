<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del_movie{{ $id }}"><i
            class="fa fa-trash"></i></button>

<!-- Modal -->
{{--<div id="del_movie{{ $id }}" class="modal fade" role="dialog">--}}
{{--<div class="modal-dialog">--}}

{{--<!-- Modal content-->--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--<h4 class="modal-title">Delete Movie</h4>--}}
{{--</div>--}}
{{--{!! Form::open(['route'=>['movies.destroy',$id],'method'=>'delete']) !!}--}}
{{--<div class="modal-body">--}}
{{--<h4>Do You want to delete {{$name}}</h4>--}}
{{--</div>--}}
{{--<div class="modal-footer">--}}
{{--<button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.close') }}</button>--}}
{{--{!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger']) !!}--}}
{{--</div>--}}
{{--{!! Form::close() !!}--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}