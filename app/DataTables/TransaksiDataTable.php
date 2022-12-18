<?php

namespace App\DataTables;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TransaksiDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('nama', function($model){
                return $model->pelanggan->nama;
            })
            ->addColumn('cucian', function($model){
                return $model->cucians->map(function($cucian) {
                    return $cucian->nama;
                })
                ->implode('<br>');
            })
            ->rawColumns(['cucian'])
            ->addColumn('harga', function($model){
                return $model->cucians->sum('harga');
            })
            ->addColumn('action', function($transaksi){
                return view('transaksi.button', compact('transaksi'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Transaksi $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Transaksi $model): QueryBuilder
    {
        return $model
                ->with(['user', 'outlet', 'pelanggan'])
                ->where('outlet_id', auth()->user()->outlet->id)
                ->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('transaksi-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->searchDelay(500)
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        // Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reload'),
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')
                    ->title('#')
                    ->searchable(false)
                    ->orderable(false),
            Column::make('kode_transaksi')
            ->title('kode'),
            Column::make('nama'),
            Column::make('cucian'),
            Column::make('status'),
            Column::make('harga'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Transaksi_' . date('YmdHis');
    }
}
