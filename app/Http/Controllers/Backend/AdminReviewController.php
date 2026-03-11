<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AdminReviewDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index(AdminReviewDataTable $dataTable)
    {
        return $dataTable->render('admin.product.review.index');
    }

    public function changeStatus(Request $request)
    {
        $reviews = ProductReview::findOrFail($request->id);
        $reviews->status = $request->status == 'true' ? 1 : 0;
        $reviews->save();

        return response(['message' => 'Status has been updated']);
    }
}