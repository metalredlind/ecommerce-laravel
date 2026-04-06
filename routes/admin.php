<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminReviewController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\AdvertisementController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CustomerListController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\FooterGridThreeController;
use App\Http\Controllers\Backend\FooterGridTwoController;
use App\Http\Controllers\Backend\FooterInfoController;
use App\Http\Controllers\Backend\FooterSocialController;
use App\Http\Controllers\Backend\HomePageSettingController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PaymentSettingsController;
use App\Http\Controllers\Backend\PaypalSettingsController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StripeSettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubscribersController;
use App\Http\Controllers\Backend\TermsAndConditionsController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\VendorConditionController;
use App\Http\Controllers\Backend\VendorListController;
use App\Http\Controllers\Backend\VendorRequestController;
use Illuminate\Support\Facades\Route;

// admin Route
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

// Profile route
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update'); // update password

// slider routes
Route::resource('slider', SliderController::class);

// categories routes
Route::put('change-status', [CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);

// sub categories routes
Route::put('subcategory/change-status', [SubCategoryController::class, 'changeStatus'])->name('subcategory.change-status');
Route::resource('subcategory', SubCategoryController::class);

// child categories routes
Route::put('child-category/change-status', [ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
Route::get('get-subcategories', [ChildCategoryController::class, 'getSubCategories'])->name('get-subcategories');
Route::resource('child-category', ChildCategoryController::class);

// brands routes
Route::put('brand/change-status', [BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('brand', BrandController::class);

// Vendor profile routes
Route::resource('vendor-profile', AdminVendorProfileController::class);

// Products routes
Route::get('product/get-subcategories', [ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-child-categories', [ProductController::class, 'getChildCategories'])->name('product.get-child-categories');
Route::put('product/change-status', [ProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('products', ProductController::class);
// product's image gallery routes
Route::resource('products-image-gallery', ProductImageGalleryController::class);
// product's image variant routes
Route::put('products-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant', ProductVariantController::class);
// product's image variant item routes
Route::get('products-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{variantId}', [ProductVariantItemController::class, 'create'])->name('products-variant-item.create');
Route::post('products-variant-item', [ProductVariantItemController::class, 'store'])->name('products-variant-item.store');
Route::get('products-variant-item-edit/{variantItemId}/edit', [ProductVariantItemController::class, 'edit'])->name('products-variant-item.edit');
Route::put('products-variant-item-update/{variantItemId}/edit', [ProductVariantItemController::class, 'update'])->name('products-variant-item.update');
Route::delete('products-variant-item/{variantItemId}', [ProductVariantItemController::class, 'destroy'])->name('products-variant-item.destroy');
Route::put('products-variant-item-status/', [ProductVariantItemController::class, 'changeStatus'])->name('products-variant-item.change-status');
//reviews route
Route::get('reviews', [AdminReviewController::class,'index'])->name('review.index');
Route::put('reviews/change-status', [AdminReviewController::class,'changeStatus'])->name('review.change-status');

// seller product routes
Route::get('seller-product', [SellerProductController::class, 'index'])->name('seller-product.index');
Route::get('seller-pending-products', [SellerProductController::class, 'pendingProducts'])->name('seller-pending-products.index');
Route::put('change-approved-status', [SellerProductController::class, 'changeApprovedStatus'])->name('change-approved-status');

// flash sale routes
Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale', [FlashSaleController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product', [FlashSaleController::class, 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/status-change', [FlashSaleController::class, 'changeShowAtHomeStatus'])->name('flash-sale.show-at-home.status-change');
Route::put('flash-sale-status', [FlashSaleController::class, 'changeStatus'])->name('flash-sale-status');
Route::delete('flash-sale/{id}', [FlashSaleController::class, 'destroy'])->name('flash-sale.destroy');

// coupons route
Route::put('coupons/change-status', [CouponController::class, 'changeStatus'])->name('coupons.change-status');
Route::resource('coupons', CouponController::class);

// shipping rule route
Route::put('shipping-rule/change-status', [ShippingRuleController::class, 'changeStatus'])->name('shipping-rule.change-status');
Route::resource('shipping-rule', ShippingRuleController::class);

// Order routes
Route::get('payment-status', [OrderController::class, 'changePaymentStatus'])->name('payment.status');
Route::get('order-status', [OrderController::class, 'changeOrderStatus'])->name('order.status');
Route::get('pending-orders', [OrderController::class, 'pendingOrders'])->name('pending-orders');
Route::get('processed-orders', [OrderController::class, 'processedOrders'])->name('processed-orders');
Route::get('dropped-off-orders', [OrderController::class, 'droppedOffOrders'])->name('dropped-off-orders');
Route::get('shipped-orders', [OrderController::class, 'shippedOrders'])->name('shipped-orders');
Route::get('out-for-delivery-orders', [OrderController::class, 'outForDeliveryOrders'])->name('out-for-delivery-orders');
Route::get('delivered-orders', [OrderController::class, 'deliveredOrders'])->name('delivered-orders');
Route::get('canceled-orders', [OrderController::class, 'canceledOrders'])->name('canceled-orders');

Route::resource('order', OrderController::class);

// order transaction route
Route::get('transaction', [TransactionController::class, 'index'])->name('transaction');

// general setting route
Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
Route::put('general-setting-update', [SettingController::class, 'generalSettingUpdate'])->name('general-setting-update');
Route::put('email-setting-update', [SettingController::class, 'emailConfigSettingUpdate'])->name('email-setting-update');

// home page setting route
Route::get('home-page-setting', [HomePageSettingController::class, 'index'])->name('home-page-setting');
Route::put('popular-category-section', [HomePageSettingController::class, 'updatePopularCategorySection'])->name('popular-category-section');

Route::put('product-slider-section-one', [HomePageSettingController::class, 'updateProductSliderSectionOne'])->name('product-slider-section-one');
Route::put('product-slider-section-two', [HomePageSettingController::class, 'updateProductSliderSectionTwo'])->name('product-slider-section-two');
Route::put('product-slider-section-three', [HomePageSettingController::class, 'updateProductSliderSectionThree'])->name('product-slider-section-three');

// Subscribers routes
Route::get('subscribers', [SubscribersController::class, 'index'])->name('subscribers.index');
Route::delete('subscribers/{id}', [SubscribersController::class, 'destroy'])->name('subscribers.destroy');
Route::post('subscribers-send-mail', [SubscribersController::class, 'sendMail'])->name('subscribers-send-mail');

// advertisement routes
Route::get('advertisement', [AdvertisementController::class, 'index'])->name('advertisement.index');
Route::put('advertisement/homepage-banner-one', [AdvertisementController::class, 'homepageBannerSectionOne'])->name('advertisement.homepage-banner-one');
Route::put('advertisement/homepage-banner-two', [AdvertisementController::class, 'homepageBannerSectionTwo'])->name('advertisement.homepage-banner-two');
Route::put('advertisement/homepage-banner-three', [AdvertisementController::class, 'homepageBannerSectionThree'])->name('advertisement.homepage-banner-three');
Route::put('advertisement/homepage-banner-four', [AdvertisementController::class, 'homepageBannerSectionFour'])->name('advertisement.homepage-banner-four');
Route::put('advertisement/product-page-banner', [AdvertisementController::class, 'productPageBanner'])->name('advertisement.product-page-banner');
Route::put('advertisement/cart-page-banner', [AdvertisementController::class, 'cartPageBanner'])->name('advertisement.cart-page-banner');

//vendor request route
Route::get('vendor-request', [VendorRequestController::class, 'index'])->name('vendor-request.index');
Route::get('vendor-request/{id}/show', [VendorRequestController::class, 'show'])->name('vendor-request.show');
Route::put('vendor-request/{id}/change-status', [VendorRequestController::class, 'changeStatus'])->name('vendor-request.change-status');

//customer list route
Route::get('customers', [CustomerListController::class, 'index'])->name('customers.index');
Route::put('customers/change-status', [CustomerListController::class, 'changeStatus'])->name('customers.change-status');

//vendor list route
Route::get('vendors', [VendorListController::class, 'index'])->name('vendors.index');
Route::put('vendors/change-status', [VendorListController::class, 'changeStatus'])->name('vendors.change-status');

//vendor condition
Route::get('vendor-condition', [VendorConditionController::class, 'index'])->name('vendor-condition.index');
Route::put('vendor-condition/update', [VendorConditionController::class, 'update'])->name('vendor-condition.update');

//about routes
Route::get('about', [AboutController::class, 'index'])->name('about.index');
Route::put('about/update', [AboutController::class, 'update'])->name('about.update');

//terms & conditions routes
Route::get('terms-and-conditions', [TermsAndConditionsController::class, 'index'])->name('terms-and-conditions.index');
Route::put('terms-and-conditions/update', [TermsAndConditionsController::class, 'update'])->name('terms-and-conditions.update');


// footer routes
Route::resource('footer-info', FooterInfoController::class);

Route::put('footer-socials/change-status', [FooterSocialController::class, 'changeStatus'])->name('footer-socials.change-status');
Route::resource('footer-socials', FooterSocialController::class);

Route::put('footer-grid-two/change-status', [FooterGridTwoController::class, 'changeStatus'])->name('footer-grid-two.change-status');
Route::put('footer-grid-two/change-title', [FooterGridTwoController::class, 'changeTitle'])->name('footer-grid-two.change-title');
Route::resource('footer-grid-two', FooterGridTwoController::class);

Route::put('footer-grid-three/change-status', [FooterGridThreeController::class, 'changeStatus'])->name('footer-grid-three.change-status');
Route::put('footer-grid-three/change-title', [FooterGridThreeController::class, 'changeTitle'])->name('footer-grid-three.change-title');
Route::resource('footer-grid-three', FooterGridThreeController::class);

// payments setting route
Route::get('payment-settings', [PaymentSettingsController::class, 'index'])->name('payment-settings.index');
Route::resource('paypal-setting', PaypalSettingsController::class);
Route::put('stripe-setting/{id}', [StripeSettingController::class, 'update'])->name('stripe-setting.update');
