<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use Illuminate\Support\Facades\Route;


//admin Route
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

//Profile route
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update'); //update password

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
//product's image gallery routes
Route::resource('products-image-gallery', ProductImageGalleryController::class);
//product's image variant routes
Route::put('products-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant', ProductVariantController::class);
//product's image variant item routes
Route::get('products-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{variantId}', [ProductVariantItemController::class, 'create'])->name('products-variant-item.create');
Route::post('products-variant-item', [ProductVariantItemController::class, 'store'])->name('products-variant-item.store');
Route::get('products-variant-item-edit/{variantItemId}/edit', [ProductVariantItemController::class, 'edit'])->name('products-variant-item.edit');
Route::put('products-variant-item-update/{variantItemId}/edit', [ProductVariantItemController::class, 'update'])->name('products-variant-item.update');
Route::delete('products-variant-item/{variantItemId}', [ProductVariantItemController::class, 'destroy'])->name('products-variant-item.destroy');
Route::put('products-variant-item-status/', [ProductVariantItemController::class, 'changeStatus'])->name('products-variant-item.change-status');

//seller product routes
Route::get('seller-product', [SellerProductController::class, 'index'])->name('seller-product.index');
Route::get('seller-pending-products', [SellerProductController::class, 'pendingProducts'])->name('seller-pending-products.index');
Route::put('change-approved-status', [SellerProductController::class, 'changeApprovedStatus'])->name('change-approved-status');

//flash sale routes
Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale', [FlashSaleController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product', [FlashSaleController::class, 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/status-change', [FlashSaleController::class, 'changeShowAtHomeStatus'])->name('flash-sale.show-at-home.status-change');
Route::put('flash-sale-status', [FlashSaleController::class, 'changeStatus'])->name('flash-sale-status');
Route::delete('flash-sale/{id}', [FlashSaleController::class, 'destroy'])->name('flash-sale.destroy');