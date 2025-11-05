<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndProductController extends Controller
{

    public function productIndex(Request $request)
    {
        if($request->has('category')){
            $category = Category::where('slug', $request->category)->first();
            $products = Product::where([
                'category_id' => $category->id,
                'status' => 1,
                'is_approved' => 1
            ])->paginate(12);
        }
        return view('frontend.pages.products', compact('products'));
        
    }

    //show product detail page
    public function showProduct(string $slug)
    {
        $product = Product::with(['vendor', 'category', 'productImageGalleries', 'variants', 'brand'])->where('slug', $slug)->where('status', 1)->first();
        return view('frontend.pages.product-detail', compact('product'));
    }
}
