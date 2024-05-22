<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CheckoutController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\FrontEndProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale');

// Product details route
Route::get('product-detail/{slug}', [FrontEndProductController::class, 'showProduct'])->name('product-detail');

// add to cart routes
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart-details', [CartController::class, 'cartDetails'])->name('cart-details');
Route::post('cart/update-quantity', [CartController::class, 'updateProductQty'])->name('cart.update-quantity');
Route::get('clear-cart', [CartController::class, 'clearCart'])->name('clear.cart');
Route::get('cart/remove-product/{rowId}', [CartController::class, 'removeProduct'])->name('cart.remove-product');
Route::get('cart-count', [CartController::class, 'getCartCount'])->name('cart-count');
Route::get('cart-products', [CartController::class, 'getCartProducts'])->name('cart-products');
Route::post('cart/remove-sidebar-product', [CartController::class, 'removeSidebarProduct'])->name('cart.remove-sidebar-product');
Route::get('cart/sidebar-product-total', [CartController::class, 'cartTotal'])->name('cart.sidebar-product-total');
Route::get('apply-coupon', [CartController::class, 'applyCoupon'])->name('apply-coupon');
Route::get('coupon-calculation', [CartController::class, 'couponCalculation'])->name('coupon-calculation');


Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function(){
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile'); //route user.profile
    Route::put('profile', [UserProfileController::class, 'updateProfile'])->name('profile.update'); //route user.profile.update
    Route::post('profile', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');

    //user address route
    Route::resource('address', UserAddressController::class);

    //checkout routes
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('checkout/address-create', [CheckoutController::class, 'createAddress'])->name('checkout.address.create');
});