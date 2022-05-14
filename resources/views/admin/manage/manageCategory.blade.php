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
                        <h4 my-3>Manage category</h4 my-3>
                    </div>
                    <div class="col-4">
                        <h4 my-3><a href="{{route('category.create')}}" class="btn btn-success">Add New category</a></h4 my-3>
                    </div>
                </div>
                <table class="table">
                    <tr>
                        <td>Id</td>
                        <td>Title</td>
                        <td>Parent id</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($category as $item)
                    <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->cat_title}}</td>
                            <td>
                                @if ($item->parent_id == 0)
                                    main 
                                @else
                                    {{$item->parent->cat_title}}
                                @endif
                            </td>
                            <td>
                                <form action="{{route('category.destroy',[$item])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="X" class="btn btn-danger">
                                    <a href="{{route('category.edit',[$item])}}" class="btn btn-info">Edit</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
