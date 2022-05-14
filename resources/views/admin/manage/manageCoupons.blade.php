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
                        <h4 my-3>Manage Coupons</h4 my-3>
                    </div>
                    <div class="col-4">
                        <h4 my-3><a href="{{route('coupon.create')}}" class="btn btn-success">New Coupon</a></h4 my-3>
                    </div>
                </div>
                <table class="table">
                    <tr>
                        <td>Id</td>
                        <td>code</td>
                        <td>status</td>
                        <td>amount</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($coupon as $item)
                       <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->code}}</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->amount}}</td>
                        <td>
                            <form action="{{route('coupon.destroy',[$item])}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="X" class="btn btn-danger">
                                <a href="{{route('coupon.edit',[$item])}}" class="btn btn-info">Edit</a>
                            </form>
                       </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
 