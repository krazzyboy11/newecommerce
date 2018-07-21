<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        $subcategories = SubCategory::all();


        //dd( $subcategories->category->cat_title);
        return view('admin.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create',compact('categories'));
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
            'subname' => 'required',
            'parentcategory' => 'required',
        ]);

        $slug =  str_slug($request->subname.'.'.$request->parentcategory);

        $subcategory = new SubCategory();
        $subcategory->sub_category_name = $request->subname;
        $subcategory->category_id = $request->parentcategory;
        $subcategory->sub_category_slug = $slug;
        $subcategory->save();

        return redirect()->route('subcategory.index')->with('successMsg','Sub Category Successfullly added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategories = SubCategory::find($id);
        $categories = Category::all();
        //dd($subcategory);
        return view('admin.subcategory.edit',compact('subcategories','categories'));
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
            'subname' => 'required',
            'parentcategory' => 'required',
        ]);
        $data = $request->parentcategory;







        $slug =  str_slug($request->subname.'.'.$data);
        $subcategory = SubCategory::find($id);
        $subcategory->sub_category_name = $request->subname;
        $subcategory->category_id = $data;
        $subcategory->sub_category_slug = $slug;
        $subcategory->save();

        return redirect()->route('subcategory.index')->with('successMsg','Sub Category Successfully added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);

        $subcategory->delete();
        return redirect()->back()->with('successMsg','Sub Category Successfully Deleted');
    }
}
