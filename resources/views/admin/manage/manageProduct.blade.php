@extends('./admin.base')
@section('jha')
    <div class="container">
        <div class="row mt-3">
            <div class="col-3">
                @include('./admin.side')
            </div>
            <div class="col-9">
                <div class="container">
                    @if ($msg = Session::get('success'))
                        <div class="alert bg-success text-light">
                            {{$msg}}
                        </div>
                    @endif
                    @if ($msg = Session::get('error'))
                        <div class="alert bg-danger text-light">
                            {{$msg}}
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-8">
                        <h4 my-3>Manage Products</h4 my-3>
                    </div>
                    <div class="col-4">
                        <h4 my-3><a href="{{route('product.create')}}" class="btn btn-success">Add New Products</a></h4 my-3>
                    </div>
                </div>
                <table class="table">
                    <tr>
                        <td>Id</td>
                        <td>Title</td>
                        <td>Brand</td>
                        <td>Category</td>
                        <td>Image</td>
                        <td>Description</td>
                        <td>Price</td>
                        <td>Qty</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($product as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->category->cat_title}}</td>
                            <td>{{$item->brand->brand_title}}</td>
                            <td><img src="{{asset('image/'.$item->image)}}" height="50px" alt=""></td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->discount_price}} <del>{{$item->price}}</del></td>
                            {{-- <td>{{$item->discount_price}}</td> --}}
                            <td>{{$item->stock}}</td>
                            <td>
                                <form action="{{route('product.destroy',[$item])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="X" class="btn btn-danger">
                                    <a href="{{route('product.edit',[$item])}}" class="btn btn-info">Edit</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
