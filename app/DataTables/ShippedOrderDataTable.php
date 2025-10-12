<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ShippedOrderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $showBtn = "<a href='".route('admin.order.show', $query->id)."' class='btn btn-primary'><i class='far fa-eye'></i></a>";
                $deleteBtn = "<a href='".route('admin.products.destroy', $query->id)."' class='btn btn-danger ml-1 mr-1 delete-item'><i class='fas fa-trash-alt'></i></a>";
                return $showBtn.$deleteBtn;
            })
            ->addColumn('customer', function($query){
                return $query->user->name;
            })
            ->addColumn('amount', function($query){
                return $query->currency_icon.$query->amount;
            })
            ->addColumn('date', function($query){
                return date('d-M-Y', strtotime($query->created_at));
            })
            ->addColumn('payment_status', function($query){
                if ($query->payment_status === 1) {
                    return "<span class='badge bg-success'>Complete</span>";
                } else {
                    return "<span class='badge bg-warning'>Pending</span>";
                }
            })
            ->addColumn('order_status', function($query){
                switch ($query->order_status) {
                    case 'pending':
                        return "<span class='badge bg-warning'>Pending</span>";
                        break;
                    case 'processed_and_ready_to_ship':
                        return "<span class='badge bg-info'>Processed</span>";
                        break;
                    case 'dropped_off':
                        return "<span class='badge bg-info'>Dropped Off</span>";
                        break;
                    case 'shipped':
                        return "<span class='badge bg-primary'>Shipped</span>";
                        break;
                    case 'out_for_delivery':
                        return "<span class='badge bg-primary'>Out For Delivery</span>";
                        break;
                    case 'delivered':
                        return "<span class='badge bg-success'>Delivered</span>";
                        break;
                    case 'canceled':
                        return "<span class='badge bg-danger'>Canceled</span>";
                        break;

                    default:
                        # code...
                        break;
                }

            })
            ->rawColumns(['order_status','payment_status','action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->where('order_status','shipped')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('shippedorder-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('invoice_id'),
            Column::make('customer'),
            Column::make('date'),
            Column::make('product_qty'),
            Column::make('amount'),
            Column::make('order_status'),
            Column::make('payment_status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ShippedOrder_' . date('YmdHis');
    }
}
