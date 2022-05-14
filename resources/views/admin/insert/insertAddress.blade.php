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
                       <form action="{{route('address.store')}}" method="post">
                           @csrf
                           <div class="mb-3">
                                <label for=""> street</label>
                                <input type="text" name="street" value="{{old('street')}}" class="form-control">
                                @error('street')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div>
                           <div class="mb-3">
                                <label for=""> landmark</label>
                                <input type="text" name="landmark" value="{{old('landmark')}}" class="form-control">
                                @error('landmark')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div>
                           <div class="mb-3">
                                <label for=""> pincode</label>
                                <input type="text" name="pincode" value="{{old('pincode')}}" class="form-control">
                                @error('pincode')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div>
                           <div class="mb-3">
                               <label for=""> state</label>
                               <input type="text" name="state" value="{{old('state')}}" class="form-control">
                               @error('state')
                               <p class="small text-danger">{{$message}}</p>
                               @enderror
                            </div>
                            <div class="mb-3">
                                <label for=""> city</label>
                                <input type="text" name="city" value="{{old('city')}}" class="form-control">
                                @error('city')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div>
                            <div class="mb-3">
                                <label for=""> name</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                                @error('name')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                            <div class="mb-3">
                                <label for=""> contact</label>
                                <input type="text" name="contact" value="{{old('contact')}}" class="form-control">
                                @error('contact')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div>
                            <div class="mb-3">
                                <label for=""> user_id</label>
                                <select name="user_id" id="" class="form-select">
                                    @foreach ($user as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('contact')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div>
                            {{-- <div class="mb-3">
                                <label for=""> type</label>
                                <input type="text" name="type" value="{{old('type')}}" class="form-control">
                                @error('type')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div> --}}
                           <div class="form-group col">
                            <label for="">type</label>
                            <div class="mb-1 col px-3 rounded py-1 d-flex border border-1">
                              <div class="mx-3">
                                <input type="radio" name="type" value="home" class="me-5 form-check-input me-1">
                                <label for="" class="me-5 form-check-label">home</label>
                              </div>
                              <div class="mx-3">
                                <input type="radio" name="type" value="office" class="me-5 form-check-input me-1">
                                <label for="" class="me-5 form-check-label">office</label>
                              </div>
                            </div>
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