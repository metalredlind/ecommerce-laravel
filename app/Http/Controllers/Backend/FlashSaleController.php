<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use Illuminate\Http\Request;

class FlashSaleController extends Controller
{
    public function index(FlashSaleItemDataTable $datatable)
    {
        $flashSaleDate = FlashSale::first();
        return $datatable->render('admin.flash-sale.index', compact('flashSaleDate'));
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
}
