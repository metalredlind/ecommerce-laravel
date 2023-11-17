<?php

/* Set Sidebar item active */
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