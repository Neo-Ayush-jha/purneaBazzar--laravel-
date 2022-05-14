<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'category_id', 
        'brand_id', 
        'image', 
        'description', 
        'price', 
        'descount_price', 
        'stock', 
    ];
    public function category(){
        return $this->hasOne(Category::class,'id',"category_id");
    }
    public function brand(){
        return $this->hasOne(Brand::class,'id','brand_id');
    }
   
}
