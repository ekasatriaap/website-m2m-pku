<?php

namespace App\DataTables;

use App\Models\ProfileAnggota;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProfileAnggotaDataTable extends DataTable
{
    protected $view = 'cms.profile-anggota';
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $primaryKey = (new ProfileAnggota())->getKeyName();
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
    public function query(ProfileAnggota $model): QueryBuilder
    {
        return $model->select('id', 'name', 'jabatan', 'jenis_profile', 'created_at')->orderBy("jabatan", 'asc')->orderBy("urutan", 'asc');
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
            Column::make('name')->title("Nama"),
            Column::make('jabatan')->title("Jabatan"),
            Column::make('jenis_profile')->title("Jenis Profile")->addClass('text-center')->addClass('text-uppercase'),
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
        return 'Madrasah_' . date('YmdHis');
    }
}
