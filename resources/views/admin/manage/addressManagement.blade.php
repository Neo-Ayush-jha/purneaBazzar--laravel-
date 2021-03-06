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
                        <h4 my-3>Manage Address</h4 my-3>
                    </div>
                    <div class="col-4">
                        <h4 my-3><a href="" class="btn btn-success">Add New address</a></h4 my-3>
                    </div>
                </div>
                <table class="table">
                    <tr>
                        <td>Id</td>
                        <td>User name</td>
                        <td>Contact</td>
                        <td>street</td>
                        <td>Landmark</td>
                        <td>city</td>
                        <td>Pincode</td>
                        <td>State</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
