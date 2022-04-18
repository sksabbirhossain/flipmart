<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    return view('welcome');
});

// admin all route start here
//dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
//all category page
Route::get('/admin/all-category', [CategoryController::class, 'allcategory']);
//add category page
Route::get('/admin/add-category', [CategoryController::class, 'addcategory']);
//add category 
Route::post('/admin/add-category', [CategoryController::class, 'createCategory']);
//edit category  page
Route::get('/admin/edit-category/{id}', [CategoryController::class, 'editCategory']);
//update category 
Route::post('/admin/edit-category/{id}', [CategoryController::class, 'updateCategory']);
//delete category 
Route::get('/admin/delete-category/{id}', [CategoryController::class, 'deleteCategory']);

//product page
Route::get('/admin/all-products', [ProductController::class, 'allProduct']);
//product page
Route::get('/admin/add-product', [ProductController::class, 'addProduct']);
//add product 
Route::post('/admin/add-product', [ProductController::class, 'createProduct']);
//edit product  page
Route::get('/admin/edit-product/{id}', [ProductController::class, 'editproduct']);
//update product 
Route::post('/admin/edit-product/{id}', [ProductController::class, 'updateproduct']);
//delete product 
Route::get('/admin/delete-product/{id}', [ProductController::class, 'deleteproduct']);