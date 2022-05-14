@extends('./admin.base')
@section('jha')
    <div class="container">
        <div class="row mt-3">
            <div class="col-3">
                @include('./admin.side')
            </div>
            <div class="col-9">
               <h3>Insert Barand Here</h3>
               <div class="card">
                   <div class="card-body">
                       <form action="{{route('brand.store')}}" method="post">
                           @csrf
                           <div class="mb-3">
                                <label for=""> Title</label>
                                <input type="text" name="brand_title" value="{{old('brand_title')}}" class="form-control">
                                @error('brand_title')
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