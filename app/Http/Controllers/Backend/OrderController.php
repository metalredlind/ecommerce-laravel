<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CanceledOrderDataTable;
use App\DataTables\DeliveredOrderDataTable;
use App\DataTables\DroppedOffOrderDataTable;
use App\DataTables\OrderDataTable;
use App\DataTables\OutForDeliveryOrderDataTable;
use App\DataTables\PendingOrderDataTable;
use App\DataTables\ProcessedOrderDataTable;
use App\DataTables\ShippedOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderDataTable $datatable)
    {
        return $datatable->render('admin.order.index');
    }

    public function pendingOrders(PendingOrderDataTable $datatable)
    {
        return $datatable->render('admin.order.pending-order');
    }

    public function processedOrders(ProcessedOrderDataTable $datatable)
    {
        return $datatable->render('admin.order.processed-order');
    }

    public function droppedOffOrders(DroppedOffOrderDataTable $datatable)
    {
        return $datatable->render('admin.order.dropped-off-order');
    }

    public function shippedOrders(ShippedOrderDataTable $datatable)
    {
        return $datatable->render('admin.order.dropped-off-order');
    }

    public function outForDeliveryOrders(OutForDeliveryOrderDataTable $datatable)
    {
        return $datatable->render('admin.order.out-for-delivery-order');
    }

    public function deliveredOrders(DeliveredOrderDataTable $datatable)
    {
        return $datatable->render('admin.order.delivered-order');
    }

    public function canceledOrders(CanceledOrderDataTable $datatable)
    {
        return $datatable->render('admin.order.canceled-order');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);

        //delete orders products
        $order->orderProducts()->delete();
        //delete transaction products
        $order->transaction()->delete();

        $order->delete();

        return response(['status'=>'success', 'message'=>'Order Deleted Successfully']);
    }

    public function changeOrderStatus(Request $request)
    {
        $order = Order::findOrFail($request->id);
        $order->order_status = $request->status;
        $order->save();

        return response(['status'=>'success', 'message'=>'Updated Order Status']);
    }

    public function changePaymentStatus(Request $request)
    {
        $paymentStatus = Order::findOrFail($request->id);
        $paymentStatus->payment_status = $request->status;
        $paymentStatus->save();

        return response(['status'=>'success', 'message'=>'Updated Payment Status']);
    }
}
