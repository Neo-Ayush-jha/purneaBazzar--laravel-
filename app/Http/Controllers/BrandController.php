<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['brands'] = Brand::all();
        return view('admin.manage.manageBarand',$data);  
      }
    public function create()
    {
        return view('admin.insert.insertBarand');
    }
    public function store(Request $request)
    {
        $request->validate([
            'brand_title'=>'required',
        ]);
        $brand=new Brand();
        $brand->brand_title=$request->brand_title;
        $brand->save();
        return redirect()->route('brand.index')->with('success','Wow! data is inserted successfulley');
    }
    public function show(Brand $brand)
    {
        //
    }
    public function edit(Brand $brand)
    {
        return view('admin.edit.editBarand',['brand'=>$brand]);
    }
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'brand_title'=>'required',
        ]);
        $brand->brand_title=$request->brand_title;
        $brand->save();
        return redirect()->route('brand.index')->with('success','Wow! data updated is inserted successfulley');
    }
    public function destroy(Brand $brand)
    {
        $brand ->delete();
        return redirect()->route('brand.index')->with('error','Ho! data is delete successfulley');
    }
}
