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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-4">
                                    <img src="http://via.placeholder.com/600.jpg" class="w-100" style="object-fit: cover;height:220px" alt="">
                                </div>
                                <div class="col-8 card-body">
                                    <h5>This is product title</h5>
                                    <p>Mobile</p>
                                    <h6> Rs 555 <del>Rs100</del></h6>
                                    <a href="" class="btn btn-danger">-</a>
                                    <span class="lead fw-bolder">0</span>
                                    <a href="" class="btn btn-success">+</a>
                                    <a href="" class="btn btn-dark floate-end">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action">Total Amount <span class="floate-end">Rs. 5555</span></a>
                    <a href="" class="list-group-item list-group-item-action text-white bg-success">Total Descount <span class="floate-end">Rs. 4444</span></a>
                    <a href="" class="list-group-item list-group-item-action">Tax (18%)<span class="floate-end">Rs. 444</span></a>
                    <a href="" class="list-group-item list-group-item-action text-white bg-warning">Coupon Descount <span class="floate-end">Rs. 111</span></a>
                    <a href="" class="list-group-item list-group-item-action"><h5>Payment Amount</h5><span class="floate-end">Rs. 9999 /-</span></a>
                </div>
                <div class="row mt-2 px-2">
                    <a href="" class="btn btn-success col">Continer Shopping</a>
                    <a href="{{route('checkout')}}" class="btn btn-danger col ms-2">CheckOut</a>
                </div>
            </div>
        </div>
    </div>
@endsection