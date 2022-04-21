<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //product page
    public function allProduct(){
        $products = Product::all();
        return view('admin.product.product', compact('products'));
    }

    //add product page
    public function addProduct(){
        $categories = Category::whereNull('cat_id')->get();
        return view('admin.product.add-product', compact('categories'));
    }

    //create product
    public function createProduct(Request $request){
        $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'cat_id' => 'required',
            'image' => 'required|image',
            'qty' => 'required',
            'price' => 'required',
            'small_description' => 'required',
            'description' => 'required',
        ]);

        //insert product data
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->slug = Str::slug($request->product_name);
        $product->cat_id = $request->cat_id;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $exten = $file->getClientOriginalExtension();
            $fileName = time().'.'.$exten;
            $file->move('uploads/productImages',$fileName);
            $product->image = $fileName;
        }
        $product->qty = $request->qty;
        $product->price = $request->price;
        $product->small_description = $request->small_description;
        $product->description = $request->description;
        $query = $product->save();
        if($query){
            return back()->with('success', 'product add successfully');
        }else{
            return back()->with('fail', 'something worng');
        }
    }

    //edit product page
    public function editproduct($id){
        $productData = Product::find($id);
        $category = Category::whereNull('cat_id')->get();
        return view('admin.product.edit-product', compact('productData', 'category'));
    }
}