<?php

namespace App\DataTables;

use App\Models\Startup;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StartupDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('phase', function ($startup) {
                return $this->getPhases($startup);
            })

            ->addColumn('action', function ($startup) {
                $buttons = $this->button(
                    'startup.display',
                    $startup->slug,
                    'success',
                    __('Show'),
                    'eye',
                    '',
                    '_blank'
                );


            })
            ->rawColumns(['phase', 'action']);
    }

    /**
     * @param StartupDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(StartupDataTable $model): \Illuminate\Database\Eloquent\Builder
    {

        $query = $model->newQuery();
        return $query->select(
            'nom_startup',
            'description',
            'phase',
            'tag',
        )
            ->with(
                'phases:phase',
                'tags:tag');

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('startup')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->parameters([
                'lengthMenu' => [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, trans('lang.All')]],
            ]);


    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        $columns = [
            Column::make('nom_startup')->title(__('Start-up')),

        ];

        array_push($columns,
            Column::make('description')->title(__('Description')),
            Column::computed('phase')->title(__('Phase')),
            Column::computed('tags')->title(__('Tags')),
            Column::computed('action')->title(__('Action'))->addClass('align-middle text-center')
        );
        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Startup_' . date('YmdHis');
    }
}
