<?php

namespace App\DataTables;

use App\Models\Cast;
use App\Models\Job;
use Yajra\DataTables\Services\DataTable;

class CastDatatable extends DataTable
{
    /**
     * Build DataTable class
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('Edit', function (Cast $cast) {
                $jobs = Job::all();
                return view('admin.cast.btn.edit', [
                    'cast' => $cast, 'jobs' => $jobs]);
            })
            ->addColumn('Delete', 'admin.cast.btn.delete')
            ->addColumn('Media', 'admin.cast.btn.media')
            ->addColumn('checkbox', 'admin.cast.btn.checkbox')
            ->rawColumns(['Edit', 'Delete', 'checkbox', 'Show', 'Media']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Cast $model)
    {
        return $model->newQuery()->select('id', 'name', 'about', 'created_at', 'updated_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            //                    ->parameters($this->getBuilderParameters());
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 'All Records'], 'className' => 'block'],
                'buttons' => [
                    [
                        'text' => '<i class="fa fa-plus"></i> ' . 'New Cast', 'className' => 'btn btn-info', "action" => "function(){
							window.location.href = 'cast/create'
						}"],
                    ['extend' => 'print', 'className' => 'btn btn-primary', 'text' => '<i class="fa fa-print"></i>'],
                    ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file"></i> ' . trans('admin.ex_csv')],
                    ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i> ' . trans('admin.ex_excel')],
                    ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fa fa-refresh"></i>'],
                    [
                        'text' => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn'],
                ],
            ]);

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name' => 'checkbox',
                'data' => 'checkbox',
                'title' => '<input type="checkbox" class="check_all" onclick="checkAll()">',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ],
            [
                'name' => 'id',
                'data' => 'id',
                'title' => '#',
            ],
            [
                'name' => 'name',
                'data' => 'name',
                'title' => 'Name',
            ],
//            [
//                'name' => 'job_name',
//                'data' => 'job_name',
//                'title' => 'Job',
//            ],
            [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => 'created_at',
            ],
            [
                'name' => 'updated_at',
                'data' => 'updated_at',
                'title' => 'updated_at',
            ],
            [
                'name' => 'Media',
                'data' => 'Media',
                'title' => 'Media',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ],
            [
                'name' => 'Edit',
                'data' => 'Edit',
                'title' => 'Edit',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ],
            [
                'name' => 'Delete',
                'title' => 'Delete',
                'data' => 'Delete',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Cast_' . date('YmdHis');
    }
}
