<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductDetailsController;
use App\Http\Controllers\frontend\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::middleware(['guest:web'])->group(function () {
    //user login
     Route::view('/user/login', 'frontend.login.login')->name('user.login');
     Route::post('/user/check', [UserController::class, 'check'])->name('user.login.check');
     Route::view('/user/register', 'frontend.login.signup')->name('user.signup');
     Route::post('/user/register', [UserController::class, 'userCreate'])->name('user.register');
 });


//home
Route::get('/', [HomeController::class, 'homePage'])->name('home');
//show products by categoey
Route::get('category-product/{id}', [HomeController::class, 'showCategoryProduct']);

//product details
Route::get('/product-details/{slug}/{id}', [ProductDetailsController::class, 'productDetails']);

//cart route
Route::post('/add-to-cart', [CartController::class, 'store']);
Route::patch('/cart-update/{id}', [CartController::class, 'updateCart']);
Route::delete('/cart-remove/{id}', [CartController::class, 'delete']);



Route::middleware(['auth:web'])->group(function () {
   Route::get('/logout', [UserController::class, 'logoutUser'])->name('user.logout');
   Route::view('/my-account', 'frontend.account.account')->name('user.account');
   Route::view('/my-wishlist', 'frontend.wishlist.wishlist')->name('user.wishlist');
   Route::view('/my-checkout', 'frontend.checkout.checkout')->name('user.checkout');
});
