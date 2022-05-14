<?php

namespace App\Http\Controllers;

use App\Models\{Product,Category,Brand};

 
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product'] = Product::all();
        return view('admin.manage.manageProduct',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = Category::all();
        $data['brand'] = Brand::all();
        return view('admin.insert.insertProduct',$data);
    }

    public function store(Request $request)
    {
         //dd($request);die;
        $request->validate([
           'title'=>'required', 
           'category_id'=>'required', 
           'brand_id'=>'required', 
           'image'=>'required', 
           'description'=>'required', 
           'price'=>'required', 
           'discount_price'=>'required', 
           'stock'=>'required', 
        ]);
        if($request->hasFile("image")){
                    $file=$request->file("image");

                    $coverName=rand().'_'.time().'_'.$file->getClientOriginalName();

                    $file->move(\public_path("image/"),$coverName);
        
            $pro = new Product();
            $pro->title=$request->title;
            $pro->category_id=$request->category_id;
            $pro->brand_id=$request->brand_id;
            $pro->description=$request->description;
            $pro->price=$request->price;
            $pro->discount_price=$request->discount_price;
            $pro->stock=$request->stock;
            $pro->image=$coverName;
            $pro->save();
        }
        return redirect()->route('product.index')->with('success','Wow! data is inserted successfulley');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data['category'] = Category::all();
        $data['brand'] = Brand::all();
        $data['product']=Product::all();
        return view('admin.edit.editProduct',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
           'title'=>'required', 
           'category_id'=>'required', 
           'brand_id'=>'required', 
           'image'=>'required', 
           'description'=>'required', 
           'price'=>'required', 
           'discount_price'=>'required', 
           'stock'=>'required', 
        ]);
        if($request->hasFile("image")){
                    $file=$request->file("image");

                    $coverName=rand().'_'.time().'_'.$file->getClientOriginalName();

                    $file->move(\public_path("image/"),$coverName);
        
            $product->title=$request->title;
            $product->category_id=$request->category_id;
            $product->brand_id=$request->brand_id;
            $product->description=$request->description;
            $product->price=$request->price;
            $product->discount_price=$request->discount_price;
            $product->stock=$request->stock;
            $product->image=$coverName;
            $product->save();
        }
        return redirect()->route('product.index')->with('success','Wow! data is inserted successfulley');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product ->delete();
        return redirect()->route('product.index')->with('error','Ho! data is delete successfulley');
    }
}
