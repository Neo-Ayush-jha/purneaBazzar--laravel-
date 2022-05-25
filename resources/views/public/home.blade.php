@extends('public.master')
@section('ayush')
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
               @include('public.side')
            </div>
            <div class="col-9">
                <div class="row">
                        @foreach ($products as $item)
                        <div class="col-3 my-2">
                            <div class="card">
                                <img src="{{asset('image/'.$item->image)}}" class="w-100" style="object-fit: cover;height:220px" alt="">
                                <div class="card-body">
                                    <strong>{{$item->title}}</strong>
                                    <p class="m-0 p-0">Rs. {{$item->discount_price}}/- <del>{{$item->price}}/-</del></p>
                                    <p class="m-0 text-lead p-0">{{$item->category->cat_title}}</p>
                                    <a href="{{route("viewProduct",['p_id'=>$item->id])}}" class="stretched-link"></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
@endsection