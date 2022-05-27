@extends('public.master')
@section('ayush')
    <div class="container-fluid bg-dark text-white p-2 shadow sticky-top">
        <div class="container">
            <h4 class="h2 fw-lighter">Your Checkout</h4>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row mt-3 mb-5" >
            <div class="col-8 mt-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route("address.store")}}" method="POST">
                            @csrf
                            <div class="row">
                               <div class="col-4">
                                     <label for="">Name</label>
                                     <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                     @error('name')
                                         <p class="small text-danger">{{$message}}</p>
                                     @enderror
                               </div>
                               <div class="col-4">
                                     <label for="">Contact</label>
                                     <input type="text" name="contact" class="form-control" value="{{old('contact')}}">
                                     @error('contact')
                                         <p class="small text-danger">{{$message}}</p>
                                     @enderror
                                 </div>
                                 <div class="col-4">
                                     <label for="">type</label>
                                     <select name="type" class="form-select">
                                             <option value="office">Office</option>
                                             <option value="home">home</option>
                                     </select>
                                     @error('type')
                                         <p class="small text-danger">{{$message}}</p>
                                     @enderror
                                 </div>
                             </div>
                             <div class="row mt-3">
                                 <div class="col-6">
                                     <label for="">street/village</label>
                                     <input type="text" name="street" class="form-control" value="{{old('street')}}">
                                     @error('street')
                                         <p class="small text-danger">{{$message}}</p>
                                     @enderror
                                 </div>
                                 <div class="col-6">
                                     <label for="">landmark</label>
                                     <input type="text" name="landmark" class="form-control" value="{{old('landmark')}}">
                                     @error('landmark')
                                         <p class="small text-danger">{{$message}}</p>
                                     @enderror
                                 </div>
                             </div>
                             <div class="row mt-3">
                                 <div class="col-6">
                                     <label for="">City</label>
                                     <input type="text" name="city" class="form-control" value="{{old('city')}}">
                                     @error('city')
                                         <p class="small text-danger">{{$message}}</p>
                                     @enderror
                                 </div>
                                 <div class="col-6">
                                     <label for="">state</label>
                                     <input type="text" name="state" class="form-control" value="{{old('state')}}">
                                     @error('state')
                                         <p class="small text-danger">{{$message}}</p>
                                     @enderror
                                 </div>
                             </div>
                             <div class="row mt-3">
                                 <div class="col-6">
                                     <label for="">Pincode</label>
                                     <input type="text" name="pincode" class="form-control" value="{{old('pincode')}}">
                                     @error('pincode')
                                         <p class="small text-danger">{{$message}}</p>
                                     @enderror
                                 </div>
                                 <div class="col-6 mt-4 ">
                                     <input type="submit" name="submit" class="btn btn-success w-100" >
                                 </div>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4 ">
                @foreach ($address as $item)
                <div class="card mt-3  @if ($item->type == "office")
                    border border-success
                @else
                    border border-danger
                @endif bg-light">
                    <div class="card-body">
                        <span class="@if ($item->type== "office")
                            bg-success
                        @else
                            bg-danger
                        @endif badge position-absolute shadow-sm text-capitalize" style="right:0;border-radius:5px 0px 0px 5px">
                            {{$item->type}}
                        </span>                    
                        <h5>{{$item->name}} ({{$item->contact}})</h5>
                        <p class="small mb-0">{{$item->street}} <br>{{$item->city}} ({{$item->state}}) - {{$item->pincode}}</p>
                        <p class="small mb-0">LandMark: {{$item->landmark}}</p>
                        <form action="{{route("paymentnow")}}" method="POST">
                            <input type="hidden" name="address_id" value="{{$item->id}}">
                            <input type="hidden" name="amount" value="{{get_payable_amount()}}">
                            @csrf
                            <input type="submit" class="btn btn-warning small mt-2 " value="use This">
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection