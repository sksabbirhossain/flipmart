<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    //add to cart
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        $request->validate([
            'product_id' => 'required',
        ]);
        $cart_item = Cart::add(array(
            'id' => $request->product_id, // inique row ID
            'name' => $product->product_name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
                'image' => $product->image,
            )
        ));
        return response()->json(['status' => 200, 'msg' => 'product add successfully']);
    }

    //update cart
    public function updateCart(Request $request, $id)
    {
        Cart::update($id, [
            'quantity' =>  1,
        ]);
        return response()->json(['status' => 200, 'msg' => 'Cart update successfully']);
    }

    //delete cart items
    public function delete($id)
    {
        Cart::remove($id);
        return response()->json(['status' => 200, 'msg' => 'cart item remove']);
    }
}
