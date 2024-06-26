<?php

namespace App\DataTables;

use App\Models\Entry;
use App\Models\Receivig;
use App\Models\Receiving;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReceivingDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($item) {
                $buttons = '';
//                $buttons .= '<a class="dropdown-item" href="' . route('admin.entries.edit', $item->id) . '" title="Edit"><i class="mdi mdi-square-edit-outline"></i> Continue Order </a>';
                $buttons .= '<a class="dropdown-item" href="' . route('admin.receiving.show', $item->id) . '" title="View"><i class="mdi mdi-eye-circle"></i> Continue Receiving </a>';

                // TO-DO: need to chnage the super admin ID to 1, while Super admin ID will 1
                $buttons .= '<form action="' . route('admin.receiving.destroy', $item->id) . '"  id="delete-form-' . $item->id . '" method="post" style="">
                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="dropdown-item text-danger" onclick="return makeDeleteRequest(event, ' . $item->id . ')"  type="submit" title="Delete"><i class="mdi mdi-trash-can-outline"></i> Delete</button></form>
                        ';

                return '<div class="btn-group dropleft">
                <a href="#" onclick="return false;" class="btn btn-sm btn-dark text-white dropdown-toggle dropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                <div class="dropdown-menu">
                ' . $buttons . '
                </div>
                </div>';
            })
            ->editColumn('entry_id', function ($item) {
                return $item->entry->entrySKU;
            })
            ->editColumn('customer_id', function ($item) {
                return $item->customer->name;
            })
            ->editColumn('item_qty', function ($item) {
                return $item->customer->email;
            })
            ->editColumn('id', function ($item) {
                return $item->customer->contact_name;
            })
            ->rawColumns([
                'action','item_qty','id','customer_id'
            ])
            ->setRowId('id');

    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Receivig $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('id', 'DESC')->select('receivigs.*');

    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('customer')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->addAction(['width' => '55px', 'class' => 'text-center', 'printable' => false, 'exportable' => false, 'title' => 'Actions']);
//             ->buttons([
//                        Button::make('excel'),
//                        Button::make('csv'),
//                        Button::make('pdf'),
//                        Button::make('print'),
//                        Button::make('reset'),
//                        Button::make('reload')
//                    ]);

    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {

        return [
            Column::make('entry_id', 'entry_id')->title('Entry ID')->searchable(true),
            Column::make('customer_id', 'customer_id')->title('Name')->searchable(false),
//            Column::make('qty', 'qty')->title('Order Quantity'),
            Column::make('id', 'id')->title('Email')->searchable(false),
            Column::make('item_qty', 'item_qty')->title('Contact Name')->searchable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Receiving' . date('YmdHis');
    }
}
