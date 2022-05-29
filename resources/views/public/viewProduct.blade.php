@extends('public.master')
@section('ayush')
    <div class="container-fluid mt-3">
        <div class="row">
            {{-- <div class="col-3">
                @include('public.side')
            </div> --}}
            <div class="col-8">
                <div class="row">
                    <div class="col-4">
                            <img src="{{asset('image/'.$product->image)}}" class="w-100" style="object-fit: cover;height:220px" alt="">
                        </div>
                        <div class="col-8">
                            <table class="table">
                                <tr>
                                    <th>Title</th>
                                    <td>{{$product->title}}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{$product->category->cat_title}}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>₹ {{$product->discount_price}}  <del> ₹ {{$product->price}}</del></td>
                                </tr>
                                <tr>
                                    <th>Office Price</th>
                                    <td> ₹ {{$product->discount_price}} </td>
                                </tr>
                                <tr>
                                    <th>Brand</th>
                                    <td>{{$product->brand->brand_title}}</td>
                                </tr>
                                <tr>
                                    <th>Qty</th>
                                    <td>{{$product->stock}}</td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col my-3">
                                    <a href="{{route("addToCart",['p_id'=>$product->id])}}" class="btn btn-success">Add To Card</a>
                                    <a href="" class="btn btn-warning">Buy Now</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-header">Description</div>
                            <div class="card-body">
                                <p class="lead">
                                    {{$product->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection