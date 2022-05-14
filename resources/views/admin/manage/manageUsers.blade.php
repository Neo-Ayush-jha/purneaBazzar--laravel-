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
                        <h4 my-3>Manage User</h4 my-3>
                    </div>
                    <div class="col-4">
                        <h4 my-3><a href="{{route('user.create')}}" class="btn btn-success">Add New User</a></h4 my-3>
                    </div>
                </div>
                <table class="table">
                    <tr>
                        <td>Id</td>
                        <td>User Name</td>
                        <td>Email</td>
                        <td>Contact</td>
                        <td>Address</td>
                        <td>City</td>
                        <td>State</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($user as $item)
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->contact}}</td>
                        <td>{{$item->user_type}}</td>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
