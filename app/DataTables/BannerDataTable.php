<?php

namespace App\DataTables;

use App\Models\Banner;
use Yajra\DataTables\Services\DataTable;

class BannerDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->escapeColumns([])
            ->addColumn('status', function ($model) {
                return $model->status_label;
            })
            ->addColumn('action', function ($model) {
                return $model->action_buttons;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Banner $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Banner $model)
    {
        return $model->newQuery()->select($this->getColumns());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->colums())
            ->minifiedAjax()
            ->addAction(['width' => '80px', 'title' => '操作'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'user_id',
            'sort',
            'status',
            'image',
        ];
    }

    /**
     * @return array
     */
    protected function colums()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'searchable' => false, 'title' => 'ID'],
            ['data' => 'sort', 'searchable' => false, 'title' => '排序'],
            ['data' => 'image', 'searchable' => false, 'title' => '地址'],
            ['data' => 'status', 'searchable' => false, 'title' => '状态'],
        ];
    }

    /**
     * @return array
     */
    protected function getBuilderParameters()
    {
        return [
            'order' => [[0, 'desc']],
            'language' => [
                'url' => url('Chinese.json'),
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
        return '店招列表_'.time();
    }
}
