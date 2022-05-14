@extends('./admin.base')
@section('jha')
    <div class="container">
        <div class="row mt-3">
            <div class="col-3">
                @include('./admin.side')
            </div>
            <div class="col-9">
               <h3>Insert Category Here</h3>
               <div class="card">
                   <div class="card-body">
                       <form action="{{route('category.store')}}" method="post">
                           @csrf
                           <div class="mb-3">
                            <label for="">Parent</label>
                            <select name="parent_id" value="{{old('parent_id')}}" id="" class="form-select">
                                <option value="0">Main Category</option>
                                @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->cat_title}}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <p class="small text-danger">{{$message}}</p>
                            @enderror
                           </div>
                           <div class="mb-3">
                                <label for="">Category Title</label>
                                <input type="text" name="cat_title" value="{{old('cat_title')}}" class="form-control">
                                @error('cat_title')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div>
                           <div class="mb-3">
                               <input type="submit" name="submit" class="btn btn-success">
                           </div>
                       </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection