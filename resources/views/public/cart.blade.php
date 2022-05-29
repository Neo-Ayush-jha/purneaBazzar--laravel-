@extends('public.master')
@section('ayush')
    <div class="container-fluid bg-dark text-white p-2 shadow sticky-top">
        <div class="container">
            <h4 class="h2 fw-lighter">Your Cart</h4>
        </div>
    </div>
    <div class="container mt-3">
        @if ($order)
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
                                            <h6> ₹ {{$item->product->discount_price}} <del>₹ {{$item->product->price}}</del></h6>
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
                        <div href="" class="list-group-item list-group-item-action">Total Amount <span class="floate-end">₹. {{total_amount()}}/-</span></div>
                        <div href="" class="list-group-item list-group-item-action text-white bg-success">Total Descount <span class="floate-end">₹. {{total_saving_amount()}}/-</span></div>
                        <div href="" class="list-group-item list-group-item-action">Tax (18%)<span class="floate-end">₹. {{get_tax()}}</span></div>
                        {{-- <a href="" class="list-group-item list-group-item-action text-white bg-warning">Coupon Descount <span class="floate-end">₹. {{$order->coupon->amount}} /-</span></a> --}}
                        @if ($order->coupon_id != null)
                
                        <div class="list-group-item list-group-item-action  bg-warning text-dark">Coupon Descount <span  class="float-end">{{$order->coupon->amount}} <a href="{{route('removeCoupon')}}" class="text-danger fw-bold text-decoration-none" title="Remove Coupon Code">X</a></span></div>
        
                        @endif
                        <div href="" class="list-group-item list-group-item-action"><h5>Payment Amount</h5><span class="floate-end">₹. {{get_payable_amount()}} /-</span></div>
                    </div>
                    <div class="row mt-2 px-2">
                        <a href="" class="btn btn-success col">Continer Shopping</a>
                        <a href="{{route('checkout')}}" class="btn btn-danger col ms-2">CheckOut</a>
                    </div>
                    @if ($order->coupon_id == null)
                        <div class="card mt-4">
                            <div class="card-body">
                                <h6 class="lead">Have any Coupon?</h6>
                                <form action="{{route('applyCoupon')}}" class="d-flex" method="post">
                                    @csrf
                                    <input type="text" placeholder="Enter Code" name="code" value="{{old('code')}}" class="form-control">
                                    @error('code')
                                        <p class="btn btn-danger">{{$massage}}</p>
                                    @enderror
                                    <input type="submit" value="Apply" class="btn btn-success">
                                </form>
                                @if (($msg = Session::get('msg')))
                                    <div class="alert alert-dabger mt-3 p-1">{{$msg}}</div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @else
        <h1>Cart is empty please buy more save more</h1>
        @endif
  
        @guest
            <H1>Sorry Cart is Empty Please Login for Access </H1>
        @endguest
      </div>
@endsection