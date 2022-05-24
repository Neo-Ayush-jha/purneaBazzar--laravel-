@extends('public.master')
@section('ayush')
    <div class="container-fluid bg-dark text-white p-2 shadow sticky-top">
        <div class="container">
            <h4 class="h2 fw-lighter">Your Cart</h4>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-8">
                <h1>My Cart</h1>
                @foreach ($order->orderItem as $item)
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow-xl border border-3" style="border-radius: 5px">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="{{asset('image/'.$item->product->image)}}" class="w-100 shadow" style="object-fit: cover;height:220px" alt="">
                                    </div>
                                    <div class="col-8 card-body">
                                        <h5>{{$item->product->title}}</h5>
                                        <p>{{$item->product->category->cat_title}}</p>
                                        <h6> Rs {{$item->product->discount_price}} <del>Rs {{$item->product->price}}</del></h6>
                                        <a href="{{route('removeFromCart',['p_id'=>$item->product->id])}}" class="btn btn-danger">-</a>
                                        <span class="lead fw-bolder">{{$item->qty}}</span>
                                        <a href="{{route('addToCart',['p_id'=>$item->product->id])}}" class="btn btn-success">+</a>
                                        <a href="{{route('removeItemFromCart',['p_id'=>$item->product->id])}}" class="btn btn-dark floate-end">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-4">
                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action">Total Amount <span class="floate-end">Rs. {{total_amount()}}/-</span></a>
                    <a href="" class="list-group-item list-group-item-action text-white bg-success">Total Descount <span class="floate-end">Rs. {{total_saving_amount()}}/-</span></a>
                    <a href="" class="list-group-item list-group-item-action">Tax (18%)<span class="floate-end">Rs. {{get_tax()}}</span></a>
                    {{-- <a href="" class="list-group-item list-group-item-action text-white bg-warning">Coupon Descount <span class="floate-end">Rs. {{$order->coupon->amount}} /-</span></a> --}}
                    <a href="" class="list-group-item list-group-item-action text-white bg-warning">Coupon Descount <span class="floate-end">Rs. 00 /-</span></a>
                    <a href="" class="list-group-item list-group-item-action"><h5>Payment Amount</h5><span class="floate-end">Rs. {{get_payable_amount()}} /-</span></a>
                </div>
                <div class="row mt-2 px-2">
                    <a href="" class="btn btn-success col">Continer Shopping</a>
                    <a href="{{route('checkout')}}" class="btn btn-danger col ms-2">CheckOut</a>
                </div>
            </div>
        </div>
    </div>
@endsection