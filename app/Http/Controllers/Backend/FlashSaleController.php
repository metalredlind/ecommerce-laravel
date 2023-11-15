<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    public function index(FlashSaleItemDataTable $datatable)
    {
        $flashSaleDate = FlashSale::first();
        $products = Product::where('is_approved', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        return $datatable->render('admin.flash-sale.index', compact('flashSaleDate', 'products'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'end_date' => ['required']
        ]);

        FlashSale::updateOrCreate(
            ['id' => 1],
            ['end_date' => $request->end_date],
        );

        toastr('Flash sale end date updated successfully', 'success', 'Success');

        return redirect()->back();
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'product' => ['required'],
            'show_at_home' => ['required'],
            'status' => ['required'],
        ]);

        $flashSaleDate = FlashSale::first();

        $flashSaleItem = new FlashSaleItem();
        $flashSaleItem->product_id = $request->product;
        $flashSaleItem->flash_sale_id = $flashSaleDate->id;
        $flashSaleItem->show_at_home = $request->show_at_home;
        $flashSaleItem->status = $request->status;
        $flashSaleItem->save();

        toastr('Product Added Successfully', 'success', 'Success');

        return redirect()->back();
    }

    public function changeShowAtHomeStatus(Request $request)
    {
        $flashSaleitem = FlashSaleItem::findOrFail($request->id);
        $flashSaleitem->show_at_home = $request->status == 'true' ? 1 : 0;
        $flashSaleitem->save();

        return response(['message' => 'Product at home status has been updated']);
    }

    public function changeStatus(Request $request)
    {
        $flashSaleitem = FlashSaleItem::findOrFail($request->id);
        $flashSaleitem->status = $request->status == 'true' ? 1 : 0;
        $flashSaleitem->save();

        return response(['message' => 'Status has been updated']);
    }
}
