<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.addbrand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addbrand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug =  str_slug($request->name);
        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'.
                $image->getClientOriginalExtension();
            if (!file_exists('uploads/brandImage')){
                mkdir('uploads/brandImage',0777,true);
            }
            $image->move('uploads/brandImage',$imagename);
        }else{
            $imagename = 'default.png';
        }

        $brand = new Brand();
        $brand->brand_name = $request->name;
        $brand->brand_slug = $slug;
        $brand->brand_image = $imagename;
        $brand->save();

        return redirect()->route('brand.index')->with('successMsg','Brand Successfullly added');
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
        $brand = Brand::find($id);
        return view('admin.addbrand.edit',compact('brand'));
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
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug =  str_slug($request->name);
        $brand = Brand::find($id);


        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'.
                $image->getClientOriginalExtension();
            if (!file_exists('uploads/brandImage')){
                mkdir('uploads/brandImage',0777,true);
            }
            $image->move('uploads/brandImage',$imagename);
        }else{
            $imagename = $brand->brand_image;
        }


        $brand->brand_name = $request->name;
        $brand->brand_slug = $slug;
        $brand->brand_image = $imagename;
        $brand->save();
        return redirect()->route('brand.index')->with('successMsg','Brand Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (file_exists('uploads/brandImage/'.$brand->brand_image))
        {
            unlink('uploads/brandImage/'.$brand->brand_image);
        }
        $brand->delete();
        return redirect()->back()->with('successMsg','Brand Successfully Deleted');
    }
}
