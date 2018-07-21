<?php

namespace App\Http\Controllers\Admin;

use App\ChildCategory;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childcategories = ChildCategory::all();
       // dd($childcategories->subcategory);

        return view('admin.childcategory.index',compact('childcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::all();
        return view('admin.childcategory.create',compact('subcategories'));
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
            'childname' => 'required',
            'childcategory' => 'required',
        ]);

        $slug =  str_slug($request->childname.'.'.$request->childcategory);

        $childcategory = new ChildCategory();
        $childcategory->child_cat_name = $request->childname;
        $childcategory->sub_category_id = $request->childcategory;
        $childcategory->child_cat_slug = $slug;
        $childcategory->save();

        return redirect()->route('childcategory.index')->with('successMsg','Child Category Successfullly added');

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
        $childcategories = ChildCategory::find($id);
        $subcategories = SubCategory::all();
        //dd($subcategory);
        return view('admin.childcategory.edit',compact('childcategories','subcategories'));
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
            'childname' => 'required',
            'subcategory' => 'required',
        ]);

        $slug =  str_slug($request->childname.'.'.$request->childcategory);

        $childcategory = ChildCategory::find($id);
        $childcategory->child_cat_name = $request->childname;
        $childcategory->sub_category_id = $request->subcategory;
        $childcategory->child_cat_slug = $slug;
        $childcategory->save();

        return redirect()->route('childcategory.index')->with('successMsg','Child Category Updated Successfullly added');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $childcategory = ChildCategory::find($id);

        $childcategory->delete();
        return redirect()->back()->with('successMsg','Child Category Successfully Deleted');
    }
}
