<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SellerProductDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerProductController extends Controller
{
    public function index(SellerProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.seller-product.index');
    }
}
