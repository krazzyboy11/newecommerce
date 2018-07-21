<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class EshopController extends Controller
{
    public function index(){
        $newProducts = Product::where('product_status',1)
            ->orderBy('created_at','DESC')
            ->take(6)
            ->get();
        $featureProducts = Product::where('product_feature',1)
            ->orderBy('id','DESC')
            ->take(6)
            ->get();

        return view('frontend.home.home',compact('newProducts','featureProducts'));
    }
    public function categoryProduct($id){
        $products = Product::where('child_category_id',$id)->get();
        return view('frontend.category.category-content',compact('products'));
    }
    /*public function category(){
        $categoires = Category::all();

        return view('frontend.master',compact('categoires'));
    }*/

    public function productDetails($id){
        $productDetails = Product::find($id);
        return view('frontend.product.product-details',compact('productDetails'));
    }

}
