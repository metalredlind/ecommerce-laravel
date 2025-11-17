<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        return view('frontend.pages.wishlist');
    }

    public function addToWishlist(Request $request)
    {
        if(!Auth::check()){
            return response(['status'=>'error', 'message'=>'Please login before adding product into wishlist!']);
        }

        $wishlistCount = Wishlist::where(['product_id' => $request->id, 'user_id'=>Auth::user()->id])->count();
        if($wishlistCount > 0){
            return response(['status'=>'error', 'message'=>'The product already in your wishlist']);
        }

        $wishlist = new Wishlist();
        $wishlist->product_id = $request->id;
        $wishlist->user_id = Auth::user()->id;

        $wishlist->save();

        return response(['status'=>'success', 'message'=>'Product added into wishlist']);
    }
}
