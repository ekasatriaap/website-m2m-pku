<?php

namespace App\DataTables;

use App\Models\Pages;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PagesDataTable extends DataTable
{
    protected $view = 'cms.pages';
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $primaryKey = (new Pages())->getKeyName();
        return (new EloquentDataTable($query))
            ->addColumn('aksi', function ($row) use ($primaryKey) {
                $data['id'] = encode($row->$primaryKey);

                return view("{$this->view}.button", $data);
            })
            ->editColumn('status', fn($row) => generateStatus($row->status))
            ->addIndexColumn()
            ->rawColumns(['status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pages $model): QueryBuilder
    {
        return $model->select('id', 'title', 'created_at', 'created_at');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->searchDelay(1000)
            ->setTableId(DATATABLE_ID)
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->dom('Bfrtip')
            ->orderBy(0);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('created_at')->hidden()->searchable(false),
            Column::make('DT_RowIndex')->name("id")->title("No")->searchable(false)->width(50)->orderable(false)->addClass('text-center'),
            Column::make('title')->title("Judul"),
            Column::computed('aksi')
                ->title('')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->width(60)
                ->addClass('text-end'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pages_' . date('YmdHis');
    }
}
