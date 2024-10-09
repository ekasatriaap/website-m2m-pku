<?php

namespace App\DataTables;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GalleryDataTable extends DataTable
{
    protected $view = 'cms.gallery';
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $primaryKey = (new Gallery())->getKeyName();
        return (new EloquentDataTable($query))
            ->addColumn('aksi', function ($row) use ($primaryKey) {
                $data['id'] = encode($row->$primaryKey);

                return view("{$this->view}.button", $data);
            })
            ->addIndexColumn()
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Gallery $model): QueryBuilder
    {
        return $model->select('id', 'title', 'created_at');
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
                ->width(60)
                ->orderable(false)
                ->addClass('text-end'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Gallery_' . date('YmdHis');
    }
}
