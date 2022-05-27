@extends('./admin.base')
@section('jha')
    <div class="container">
        <div class="row mt-3">
            <div class="col-3">
                @include('./admin.side')
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-8">
                        <h4 my-3>Manage Products</h4 my-3>
                    </div>
                    <div class="col-4">
                        <h4 my-3><a href="" class="btn btn-success">Add New Products</a></h4 my-3>
                    </div>
                </div>
                <table class="table">
                    <tr>
                        <td>Id</td>
                        <td>User Name</td>
                        <td>Coupon</td>
                        <td>Address</td>
                        <td>ordered</td>
                        <td>Is Delivered</td>
                        <td>Is Processing</td>
                        <td>Is Shipped</td>
                        <td>DateOfOrder</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($order as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->user_id}}</td>
                            <td>{{$item->address_id}}</td>
                            <td>{{$item->coupon_id}}</td>
                            <td>{{$item->isDeliverd}}</td>
                            <td>{{$item->isShippend}}</td>
                            <td>{{$item->dateOfOrderd}}</td>
                            <td>{{$item->ordered}}</td>
                            <td>
                                <input type="submit" value="X" class="btn btn-danger">
                                <a href="" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
