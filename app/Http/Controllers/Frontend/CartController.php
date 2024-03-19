<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //add item to cart
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        if($product->qty == 0){
            return response(['status'=>'error', 'message'=>'Product stock out']);
        }elseif($product->qty < $request->qty){
            return response(['status'=>'error', 'message'=>'Quantity not evailable in our stock']);
        }

        $variants = [];
        $variantTotalAmount = 0;

        if($request->has('variants_items')){
            foreach($request->variants_items as $item_id){
                $variantItem = ProductVariantItem::find($item_id);
                $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
                $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;
                $variantTotalAmount += $variantItem->price;
            }
        }
        
        //check discount
        $productPrice = 0;

        if(checkDiscount($product)){
            $productPrice = $product->offer_price;
        } else {
            $productPrice = $product->price;
        }

        $cartData = [];
        $cartData['id'] = $product->id;
        $cartData['name'] = $product->name;
        $cartData['qty'] = $request->qty;
        $cartData['price'] = $productPrice;
        $cartData['weight'] = 10;
        $cartData['options']['variants'] = $variants;
        $cartData['options']['variants_total'] = $variantTotalAmount;
        $cartData['options']['image'] = $product->thumb_image;
        $cartData['options']['slug'] = $product->slug;

        Cart::add($cartData);

        return response(['status' => 'success', 'message'=>'Added to cart successfully']);
    }

    // Show cart page
    public function cartDetails()
    {
        $cartItems = Cart::content();
        
        return view('frontend.pages.cart-detail', compact('cartItems'));
    }

    //update product quantity
    public function updateProductQty(Request $request)
    {
        Cart::update($request->rowId, $request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);

        return response(['status' => 'success', 'message'=>'cart has been updated', 'product_total'=>$productTotal]);
    }

    //get product total
    public function getProductTotal($rowId)
    {
        $product = Cart::get($rowId);
        $total = ($product->price + $product->options->variants_total) * $product->qty;
        return $total;
    }

    //get sidebar cart total amount
    public function cartTotal()
    {
        $total = 0;
        foreach(Cart::content() as $product){
            $total += $this->getProductTotal($product->rowId);
        }

        return $total;
    }

    public function clearCart()
    {
        Cart::destroy();

        return response(['status'=>'success', 'message'=>'Cart cleared']);
    }

    //remove product from cart
    public function removeProduct($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back();
    }

    //get cart count
    public function getCartCount()
    {
        return Cart::content()->count();
    }

    //get all products
    public function getCartProducts()
    {
        return Cart::content();
    }

    //remove sidebar cart product
    public function removeSidebarProduct(Request $request)
    {
        Cart::remove($request->rowId);

        return response(['status' => 'success', 'message'=>'Product removed successfully']);
    }
}
