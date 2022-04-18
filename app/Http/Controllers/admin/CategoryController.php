<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    //all category 
    public function allcategory(){
        $category = Category::whereNull('cat_id')->get();
        return view('admin.category.category', compact('category'));
    }

    //add category 
    public function addcategory(){
        $category = Category::whereNull('cat_id')->get();
        return view('admin.category.add-category', compact('category'));
    }

    //add category 
    public function createCategory(Request $request){
        $request->validate([
            'category_name'=> 'required |unique:categories',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->cat_id = $request->cat_id;
        $query = $category->save();

        if(!$query){
            return back()->with('fail', 'Please Try Again!!!');
        }else{
            Toastr::info('Category Add Successfully');
            return back()->with('success', 'Category Add Successfully');
        }
    }

    //edit category
    public function editCategory($id){
        $categoryData = Category::find($id);
        $category = Category::whereNull('cat_id')->get();
        return view('admin.category.edit-category', compact('categoryData', 'category'));
    }

    //edit category
    public function updateCategory(Request $request, $id){
        $request->validate([
            'category_name'=> 'required |unique:categories',
        ]);
        
        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->cat_id = $request->cat_id;
        $query = $category->save();

        if($query){
            Toastr::success('Category Update Successfull');
            return redirect('/admin/all-category');
        }else{
            return back()->with('fail', 'Please Try Again!!!');
        }
    }

    //delete category
    public function deleteCategory($id){
        $category = Category::find($id)->delete();

        if($category){
            Toastr::info('Category Delete Successfull!!!');
            return back();
        }
    }
}