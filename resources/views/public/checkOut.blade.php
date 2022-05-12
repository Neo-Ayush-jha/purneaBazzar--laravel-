@extends('public.master')
@section('ayush')
    <div class="container-fluid bg-dark text-white p-2 shadow sticky-top">
        <div class="container">
            <h4 class="h2 fw-lighter">Your Checkout</h4>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row mt-3">
            <div class="col-8 mt-3">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-4">
                                    <label for="">Name</label>
                                    <input type="text" , name="name" value="{{old('name')}}" class="form-conyrol">
                                    @error('name')
                                        <p class="small text-danger">{{$massage}}</p>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">Contact</label>
                                    <input type="text" , name="contact" value="{{old('contact')}}" class="form-conyrol">
                                    @error('contact')
                                        <p class="small text-danger">{{$massage}}</p>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">Address</label>
                                    <input type="text" , name="address" value="{{old('address')}}" class="form-conyrol">
                                    @error('address')
                                        <p class="small text-danger">{{$massage}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-5">
                                    <label for="">Street/village</label>
                                    <input type="text" , name="street" value="{{old('street')}}" class="form-conyrol">
                                    @error('street')
                                        <p class="small text-danger">{{$massage}}</p>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">LandMark</label>
                                    <input type="text" , name="landmark" value="{{old('landmark')}}" class="form-conyrol">
                                    @error('landmark')
                                        <p class="small text-danger">{{$massage}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <label for="">State</label>
                                    <input type="text" , name="state" value="{{old('state')}}" class="form-conyrol">
                                    @error('state')
                                        <p class="small text-danger">{{$massage}}</p>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">City</label>
                                    <input type="text" , name="city" value="{{old('city')}}" class="form-conyrol">
                                    @error('city')
                                        <p class="small text-danger">{{$massage}}</p>
                                    @enderror
                                </div>
                                <div class="col-4">
                                    <label for="">Pincode</label>
                                    <input type="text" , name="pincode" value="{{old('pincode')}}" class="form-conyrol">
                                    @error('pincode')
                                        <p class="small text-danger">{{$massage}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col mt-4">
                                <input type="submit" name="submit" class="btn btn-success w-100">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mt-4 bg-light">
                    <div class="card-body">
                        <h5>Ayush (123654789)</h5>
                        <p class="small">Line basti Panchayat bhawan near newalal chowk. <br>Purnia (Purnea).</p>
                        <a href="" class="btn btn-info small">Bihar (854301)</a>
                    </div>
                </div>
                <div class="card mt-4 bg-light">
                    <div class="card-body">
                        <h5>Aditya (123654789)</h5>
                        <p class="small">Line basti Panchayat bhawan near newalal chowk. <br>Purnia (Purnea).</p>
                        <a href="" class="btn btn-info small">Bihar (854301)</a>
                    </div>
                </div>
                <div class="card mt-4 bg-light">
                    <div class="card-body">
                        <h5>Ayush (123654789)</h5>
                        <p class="small">Lorem ipsum dolor sit amet. <br>Lorem, ipsum dolor.</p>
                        <a href="" class="btn btn-info small">Use this address</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection