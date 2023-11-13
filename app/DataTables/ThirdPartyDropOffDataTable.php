<?php

namespace App\DataTables;

use App\Models\ThirdPartyDropOff;
use App\Models\ThirdPartyDropOffCenter;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ThirdPartyDropOffDataTable extends DataTable
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
                $buttons .= '<a class="dropdown-item" href="' . route('admin.third-party-drop-off.edit', $item->id) . '" title="Edit"><i class="mdi mdi-square-edit-outline"></i> Edit </a>';

                // TO-DO: need to chnage the super admin ID to 1, while Super admin ID will 1
                if ($item->id != 2 && $item->id != 1){
                    $buttons .= '<form action="' . route('admin.third-party-drop-off.destroy', $item->id) . '"  id="delete-form-' . $item->id . '" method="post" style="">
                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="dropdown-item text-danger" onclick="return makeDeleteRequest(event, ' . $item->id . ')"  type="submit" title="Delete"><i class="mdi mdi-trash-can-outline"></i> Delete</button></form>
                        ';
                }

                return '<div class="btn-group dropleft">
                <a href="#" onclick="return false;" class="btn btn-sm btn-dark text-white dropdown-toggle dropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                <div class="dropdown-menu">
                ' . $buttons . '
                </div>
                </div>';
            })
//            ->editColumn('avatar', function ($item) {
//                return '<img class="ic-img-32" src="' . $item->avatar_url . '" alt="' . $item->last_name . '" />';
//            })
//            ->editColumn('first_name', function ($item) {
//                return $item->full_name;
//            })
//            ->editColumn('status',function ($item){
//                $badge = $item->status == GlobalConstant::STATUS_ACTIVE ? "bg-success" : "bg-danger";
//                return '<span class="badge ' . $badge . '">' . Str::upper($item->status) . '</span>';
//            })
//            ->editColumn('user_type',function ($item){
//                return '<span class="text-capitalize">' . $item->user_type. '</span>';
//            })
//            ->filterColumn('first_name', function ($query, $keyword) {
//                $sql = "CONCAT(users.first_name,'-',users.username)  like ?";
//                $query->whereRaw($sql, ["%{$keyword}%"]);
//            })
            ->rawColumns([
                'action',
//                'avatar',
//                'status',
//                'user_type'
            ])
            ->setRowId('id');

    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ThirdPartyDropOffCenter $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('id', 'DESC')->select('third_party_drop_off_centers.*');

    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('third-party-drop-off-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->addAction(['width' => '55px', 'class' => 'text-center', 'printable' => false, 'exportable' => false, 'title' => 'Action']);
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
//            Column::computed('DT_RowIndex', 'SL#'),
//            Column::make('avatar', 'avatar')->title('Avatar'),
            Column::make('name', 'name')->title('Name')->searchable(true),
//            Column::make('username', 'username')->title('Username'),
//            Column::make('first_name', 'first_name')->title('Name'),
            Column::make('email', 'email')->title('Email'),
            Column::make('contact_name', 'contact_name')->title('Contact Name'),
//            Column::make('user_type', 'user_type')->title('User From'),
//            Column::make('status', 'status')->title('Status'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Third Party Drop Off_' . date('YmdHis');
    }
}