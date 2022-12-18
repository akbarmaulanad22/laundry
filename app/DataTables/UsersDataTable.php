<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
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
            ->addColumn('role', function ($model){
                foreach ($model->getRoleNames() as $role){
                    return $role;
                }
            })
            ->addColumn('action', function($model){
                return view('karyawan.button', compact('model'));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        return $model->with('roles')
                    ->whereHas('roles', function($q){
                        $q->where('name', 'Admin')
                            ->orWhere('name', 'Kasir');
                        })
                    ->where('outlet_id', auth()->user()->outlet->id)
                    // ->whereBetween('created_at', ['2022-12-18 12:10:41', '2022-12-18 12:10:41'])
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
        ->setTableId('users-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->orderBy(1)
        ->selectStyleSingle()
        ->searchDelay(500);

        // return $this->builder()
        //             ->columns($this->getColumns())
        //             ->parameters([
        //                 'searchDelay' => 100,
        //                 'dom'          => 'Bfrtip',
        //                 'buttons'      => ['excel', 'pdf', 'print', 'reset', 'reload'],
        //             ]);

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
            Column::make('name'),
            Column::make('email'),
            Column::make('telephone'),
            Column::make('role')
                    ->orderable(false)
                    ->searchable(false),
            Column::make('action')
                    ->orderable(false)
                    ->searchable(false)
                    ->printable(false)
                    ->exportable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }

      /**
     * Set responsive option value.
     *
     * @param bool|array $value
     * @return $this
     * @see https://datatables.net/reference/option/responsive
     */
    // public function responsive($value = true)
    // {
    //     $this->attributes['responsive'] = $value;

    //     return $this;
    // }
}
