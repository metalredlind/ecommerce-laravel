<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontEndProductController extends Controller
{

    public function productIndex(Request $request)
    {

        if($request->has('category')){
            $category = Category::where('slug', $request->category)->firstOrFail();
            $products = Product::where([
                'category_id' => $category->id,
                'status' => 1,
                'is_approved' => 1
            ])
            ->when($request->has('range'), function($query) use($request){
                $price = explode(';', $request->range);
                $from = $price[0];
                $to = $price[1];

                return $query->where('price', '>=', $from)->where('price', '<=', $to);
            })
            ->paginate(12);
        } elseif($request->has('subcategory')){
            $category = SubCategory::where('slug', $request->subcategory)->firstOrFail();
            $products = Product::where([
                'sub_category_id' => $category->id,
                'status' => 1,
                'is_approved' => 1
            ])
            ->when($request->has('range'), function($query) use($request){
                $price = explode(';', $request->range);
                $from = $price[0];
                $to = $price[1];

                return $query->where('price', '>=', $from)->where('price', '<=', $to);
            })
            ->paginate(12);
        }   elseif($request->has('childcategory')){
            $category = ChildCategory::where('slug', $request->childcategory)->firstOrFail();
            $products = Product::where([
                'child_category_id' => $category->id,
                'status' => 1,
                'is_approved' => 1
            ])
            ->when($request->has('range'), function($query) use($request){
                $price = explode(';', $request->range);
                $from = $price[0];
                $to = $price[1];

                return $query->where('price', '>=', $from)->where('price', '<=', $to);
            })
            ->paginate(12);
        } elseif($request->has('brand')){
            $brand = Brand::where('slug', $request->brand)->firstOrFail();
            $products = Product::where([
                'brand_id' => $brand->id,
                'status' => 1,
                'is_approved' => 1
            ])
            ->when($request->has('range'), function($query) use($request){
                $price = explode(';', $request->range);
                $from = $price[0];
                $to = $price[1];

                return $query->where('price', '>=', $from)->where('price', '<=', $to);
            })
            ->paginate(12);
        } elseif($request->has('search')){
            $products = Product::where(['status'=>1, 'is_approved'=>1])
            ->where(function($query) use($request){
                $query->where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('long_description', 'like', '%'.$request->search.'%')
                    ->orWhereHas('category', function($query) use($request){
                        $query->where('name','like','%'.$request->search.'%')
                            ->orWhere('long_description', 'like', '%'.$request->search.'%');
                });
            })
            ->paginate(12);
        } else {
            $products = Product::where(['status' => 1, 'is_approved'=>1])->orderBy('id','DESC')->paginate(12);
        }
        
        $product_page_banner = Advertisement::where('key','product_page_banner')->first();
        $product_page_banner = json_decode($product_page_banner?->value);

        $categories = Category::where(['status'=>1])->get();
        $brands = Brand::where(['status'=>1])->get();

        return view('frontend.pages.products', compact('products','categories','brands','product_page_banner'));
    }

    //show product detail page
    public function showProduct(string $slug)
    {
        $product = Product::with(['vendor', 'category', 'productImageGalleries', 'variants', 'brand'])->where('slug', $slug)->where('status', 1)->first();
        $reviews = ProductReview::where('product_id', $product->id)->where('status',1)->paginate(10);
        return view('frontend.pages.product-detail', compact('product','reviews'));
    }

    public function changeListView(Request $request)
    {
        Session::put('product_list_style', $request->style);

    }

}
