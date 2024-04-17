<?php

/* Set Sidebar item active */

use Illuminate\Support\Facades\Session;

function setActive(array $route)
{
    if(is_array($route)){
        foreach($route as $r){
            if(request()->routeIs($r)){
                return 'active';
            }
        }
    }
}

/* check if product has discount */
function checkDiscount($product)
{
    $currentDate = date('Y-m-d');

    if($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date){
        return true;
    }
    
    return false;
    
}

// calculate discount percent
function calculateDiscountPercent($originalPrice, $discountPrice)
{
    $discountAmount = $originalPrice - $discountPrice;
    $discountPercent = ($discountAmount/$originalPrice) * 100;

    return $discountPercent;
}

//check the product type
function productType($type)
{
    switch ($type) {
        case 'new-arrival':
            return "New";
            break;
        case 'featured_product':
            return "Featured";
            break;    
        case 'top_product':
            return "Top";
            break;
        case 'best_product':
            return "Best";
            break;
        default:
            return "";
            break;
    }
}

//get total cart amount
function getCartTotal()
{
    $total = 0;
    foreach(\Cart::content() as $product){
        $total += ($product->price + $product->options->variants_total) * $product->qty;
    }

    return $total;
}

//get total amount in cart
function getMainCartTotal()
{
    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $subtotal = getCartTotal();
        if($coupon['discount_type'] == 'amount'){
            $total = $subtotal - $coupon['discount'];
            return $total;
        }elseif($coupon['discount_type'] == 'percent'){
            $discount = $subtotal * $coupon['discount'] / 100;
            $total = $subtotal - $discount;
            return $total;
        }
    } else{
        return getCartTotal();
    }
}

//get total discount in cart
function getMainCartDiscount()
{
    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $subtotal = getCartTotal();
        if($coupon['discount_type'] == 'amount'){
            return $coupon['discount'];
        }elseif($coupon['discount_type'] == 'percent'){
            $discount = $subtotal * $coupon['discount'] / 100;
            return $discount;
        }
    } else{
        return getCartTotal();
    }
}