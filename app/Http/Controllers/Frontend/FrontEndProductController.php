<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndProductController extends Controller
{
    //show product detail page
    public function showProduct(string $slug)
    {
        $product = Product::where('slug', $slug)->where('status', 1)->first();
        return view('frontend.pages.product-detail', compact('product'));
    }
}
