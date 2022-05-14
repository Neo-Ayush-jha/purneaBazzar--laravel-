<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['category'] =Category::all();
        return view('admin.manage.manageCategory',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::where('parent_id',0)->get();
        return view('admin.insert.insertCategory',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_title'=>'required',
            'parent_id'=>'required',
        ]);
        $category=new Category();
        $category->cat_title=$request->cat_title;
        $category->parent_id=$request->parent_id;
        $category->save();
        return redirect()->route('category.index')->with('success','Wow! data is inserted successfulley');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data['categories'] = Category::where('parent_id',0)->get();
        $data['category'] = $category;
        return view('admin.edit.editCategory',$data);
    }
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'cat_title'=>'required',
            'parent_id'=>'required',
        ]);
        $category->cat_title=$request->cat_title;
        $category->parent_id=$request->parent_id;
        $category->save();
        return redirect()->route('category.index')->with('success','Wow! data is inserted successfulley');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        $category->delete();
        return redirect()->route('category.index')->with('error','Oh! data is deleted successfulley');
    }
}
