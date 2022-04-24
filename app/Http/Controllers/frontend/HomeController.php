<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //home page view
    public function homePage(){
        $allCategory = Category::whereNull('cat_id')->paginate(9);
        $allProducts = Product::latest()->paginate(10);
        return view('frontend.home.home', compact('allCategory', 'allProducts'));
    }

    //show product by category
    public function showCategoryProduct($id){
        $allCategory = Category::whereNull('cat_id')->paginate(9);
        $subProducts = Product::where('cat_id', $id)->get();
        return view('frontend.productByCategory.index', compact('allCategory', 'subProducts'));
    }
}