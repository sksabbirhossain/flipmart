<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    //product details
    public function productDetails($slug, $id){
        $productDetails = Product::where('slug', $slug)->first();
        $product_id = Product::find($id);
        $categoryProduct = $product_id->cat_id;
        $relatedProducts = Product::where('cat_id', $categoryProduct)->get();
        return view('frontend.productDetails.product-details', compact('productDetails', 'relatedProducts'));
    }
}