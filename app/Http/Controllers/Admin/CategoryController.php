<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
           'title' => 'required',
           'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug =  str_slug($request->title);
        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'.
                $image->getClientOriginalExtension();
            if (!file_exists('uploads/categoryImage')){
                mkdir('uploads/categoryImage',0777,true);
            }
            $image->move('uploads/categoryImage',$imagename);
        }else{
            $imagename = 'default.png';
        }

        $category = new Category();
        $category->cat_title = $request->title;
        $category->cat_slug = $slug;
        $category->cat_image = $imagename;
        $category->save();

        return redirect()->route('category.index')->with('successMsg','Category Successfullly added');
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
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
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
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug =  str_slug($request->title);
        $category = Category::find($id);


        if (isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug .'-'. $currentDate .'-'. uniqid() .'.'.
                $image->getClientOriginalExtension();
            if (!file_exists('uploads/categoryImage')){
                mkdir('uploads/categoryImage',0777,true);
            }
            $image->move('uploads/categoryImage',$imagename);
        }else{
            $imagename = $category->cat_image;
        }


        $category->cat_title = $request->title;
        $category->cat_slug = $slug;
        $category->cat_image = $imagename;
        $category->save();
        return redirect()->route('category.index')->with('successMsg','Category Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (file_exists('uploads/categoryImage/'.$category->cat_image))
        {
            unlink('uploads/categoryImage/'.$category->cat_image);
        }
        $category->delete();
        return redirect()->back()->with('successMsg','Category Successfully Deleted');

    }
}
