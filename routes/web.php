<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\FrontendUserController;
use App\Http\Controllers\Auth\FrontendLoginController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StripePaymentController;

//frontend-routes//
Route::get('index',[HomeController::class,'index'])->name('index');
Route::get('shop',[HomeController::class,'shop'])->name('shop');

Route::get('/', function () {
    return view('welcome');
});


// Route::get('index', function () {
//     return view('index');
// })->name('index');



Route::get('shop-detail', function () {
    return view('shop-detail');
})->name('shop-detail');




Route::get('contact', function () {
    return view('contact');
})->name('contact');


//User-register-routes//
Route::get('frontenduser',[FrontendUserController::class,'show'])->name('user.login');
Route::post('frontenduser/store',[FrontendUserController::class,'store'])->name('user.store');

Route::get('frontendlogin', [FrontendLoginController::class, 'show'])->name('frontenduser');
Route::post('frontendlogin',[FrontendLoginController::class,'store'])->name('store.login');
Route::get('frontendlogout',[FrontendLoginController::class,'logout'])->name('user.logout');


//admin-register-routes//
Route::get('admin/login', function () {
    return view('admin-dashboard.login');
})->name('login');
Route::get('register',[RegisterController::class,'showRegister'])->name('admin.register');
Route::post('add/register',[RegisterController::class,'addUser'])->name('add.admin');
Route::post('admin/login',[LoginController::class,'login'])->name('admin.login');
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::prefix('admin')->group(function () {
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orderview/{id}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
    Route::get('/admin/orders/delete/{id}', [AdminOrderController::class, 'destroy'])->name('admin.orders.delete');

});

//admin-users-routes//--//admin-Dashboard-products-routes//
Route::middleware('auth')->group(function(){
Route::get('admin',[UserController::class,'show'])->name('users');
Route::get('productlist',[ProductController::class,'show'])->name('product');
Route::get('add-products', [ProductController::class, 'create'])->name('add-products');
Route::post('product/store',[ProductController::class,'store'])->name('product.store');
Route::put('product-edit/{id}', [ProductController::class, 'update'])->name('update');
Route::get('product-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('product-delete/{id}',[ProductController::class,'destroy'])->name('product.delete');
});

// category resourse route//
Route::resource('categories', CategoryController::class);

// cart route//

Route::get('cart',[CartController::class,'index'])->name('cart');
Route::post('cart/add/{id}',[CartController::class,'addcart'])->name('add.cart');
Route::put('cart/update/{id}', [CartController::class, 'updateCart'])->name('update.cart');
Route::delete('cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.delete');

// checkout route//

Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
 
Route::get('/thankyou', function () {
    return view('thankyou');
})->name('thankyou');




Route::controller(StripePaymentController::class)->group(function(){
    Route::get('/stripe', 'stripe')->name('stripe');
    Route::post('/stripe', 'stripePost')->name('stripe.post');
});

