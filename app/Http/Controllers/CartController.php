<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::find($request->productId);
        if ($product->product_sale_price){
            $price = $product->product_sale_price;
        }else{
            $price = $product->product_regular_price;
        }
        Cart::add([
           'id' => $request->productId,
            'qty' => $request->qty,
            'name' => $product->product_name,
            'price' => $price,
            'options' => ['image' => $product->product_image],
        ]);
        return redirect('cart/show');
    }
    public function showCart(){

        $cartItems = Cart::content();

        return view('frontend.cart.cart',compact('cartItems'));
    }
    public function deleteCart($id){
        Cart::remove($id);
        return redirect('/cart/show');
    }
    public function updateCart(Request $request){
        $rowId = $request->rowID;
        $newQty = $request->newQty;
        Cart::update($rowId, $newQty);
        return redirect('/cart/show');
    }

    public function customerRegister(Request $request){
       return $request->all();
    }
    public function shippingAddress(Request $request){
        return $request->all();
    }
}
