<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\ChildCategory;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $childcategories = ChildCategory::all();
        $brands = Brand::all();
        return view('admin.product.create',compact('childcategories','brands'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$filename = $request->productimage->getClientOriginalName();
        print_r($filename);*/
/*        return $request;*/
        $this->validate($request,[
            'productname' => 'required',
            'productregularprice' =>'required',
            'productimage' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('productimage');
        $slug =  str_slug($request->productname);
        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'.
                $image->getClientOriginalExtension();
            if (!file_exists('uploads/ProductImage')){
                mkdir('uploads/ProductImage',0777,true);
            }
            $image->move('uploads/ProductImage',$imagename);
        }else{
            $imagename = 'default.png';
        }
        if ($request->featureproduct == "on"){
            $productfeature = 1;
        }else{
            $productfeature = 0;

        }
        if ($request->publicationstatus == "on"){
            $productstatus = 1;
        }else{
            $productstatus = 0;

        }
        $product = new Product();

        $brand = $request->brandname;
        if (isset($brand)){
            $product->brand_id = $brand;

        }else{
            $emptybrand = NULL;
            $product->brand_id = $emptybrand;

        }
        $saleprice = $request->productsaleprice;
        if (isset($saleprice)){
            $product->product_sale_price = $saleprice;
        }else{
            $saleprice = NULL;
            $product->product_sale_price = $saleprice;

        }


        $product->child_category_id = $request->categoryname;
        $product->product_name = $request->productname;
        $product->product_slug = $slug;

        $product->product_regular_price = $request->productregularprice;
        $product->product_quantity = $request->productquantity;
        $product->product_sku = $request->productsku;
        $product->product_short_description = $request->shortdesciption;
        $product->product_long_description = $request->longdesciption;
        $product->product_tag = $request->producttag;
        $product->product_image = $imagename;
        $product->product_feature = $productfeature;
        $product->product_status = $productstatus;
        $product->save();

        return redirect()->route('product.index')->with('successMsg','Product Successfully added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        $childcategories = ChildCategory::all();
        $brands = Brand::all();
        return view('admin.product.edit',compact('products','childcategories','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $this->validate($request,[
            'productname' => 'required',
            'productregularprice' =>'required',
            'productimage' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('productimage');
        $slug =  str_slug($request->productname);

        $product = Product::find($id);

        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'.
                $image->getClientOriginalExtension();
            if (!file_exists('uploads/productImage')){
                mkdir('uploads/productImage',0777,true);
            }
            $image->move('uploads/productImage',$imagename);
        }else{
            $imagename = $product->product_image;
        }
        $product->child_category_id = $request->categoryname;
        $product->brand_id = $request->brandname;
        $product->product_name = $request->productname;
        $product->product_slug = $slug;
        $product->product_regular_price = $request->productregularprice;
        $product->product_sale_price = $request->productsaleprice;
        $product->product_quantity = $request->productquantity;
        $product->product_sku = $request->productsku;
        $product->product_short_description = $request->shortdesciption;
        $product->product_long_description = $request->longdesciption;
        $product->product_tag = $request->producttag;
        $product->product_image = $imagename;

        $product->save();

        return redirect()->route('product.index')->with('successMsg','Product Successfully updated');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::find($id);
        if (file_exists('uploads/productImage/'.$product->product_image))
        {
            unlink('uploads/productImage/'.$product->product_image);
        }
        $product->delete();
        return redirect()->back()->with('successMsg','Product Successfully Deleted');
    }
}
