<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\LoginController;

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

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login', 'admin.login.login')->name('login');
        Route::post('/check', [LoginController::class, 'checkLogin'])->name('check');
    });

    Route::middleware(['auth:admin'])->group(function(){
        //logout
        Route::get('/logout', [LoginController::class, 'adminLogout'])->name('logout');
        //dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        //all category page
        Route::get('/all-category', [CategoryController::class, 'allcategory'])->name('allcategory');
        //add category page
        Route::get('/add-category', [CategoryController::class, 'addcategory'])->name('addcategory');
        //add category 
        Route::post('/add-category', [CategoryController::class, 'createCategory'])->name('createCategory');
        //edit category  page
        Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('editCategory');
        //update category 
        Route::post('/edit-category/{id}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
        //delete category 
        Route::get('/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
        //product page
        Route::get('/all-products', [ProductController::class, 'allProduct'])->name('allProduct');
        //product page
        Route::get('/add-product', [ProductController::class, 'addProduct'])->name('addProduct');
        //add product 
        Route::post('/add-product', [ProductController::class, 'createProduct'])->name('createProduct');
        //edit product  page
        Route::get('/edit-product/{id}', [ProductController::class, 'editproduct'])->name('editproduct');
        //update product 
        Route::post('/edit-product/{id}', [ProductController::class, 'updateproduct'])->name('updateproduct');
        //delete product 
        Route::get('/delete-product/{id}', [ProductController::class, 'deleteproduct'])->name('deleteproduct');
    });    
});


