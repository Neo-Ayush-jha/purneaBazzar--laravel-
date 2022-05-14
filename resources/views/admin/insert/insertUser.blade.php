@extends('./admin.base')
@section('jha')
    <div class="container">
        <div class="row mt-3">
            <div class="col-3">
                @include('./admin.side')
            </div>
            <div class="col-9">
               <h3>Insert Usert Here</h3>
               <div class="card">
                   <div class="card-body">
                       <form action="{{route('user.store')}}" method="post">
                           @csrf
                           <div class="mb-3">
                                <label for=""> name</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control">
                                @error('name')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div>
                           <div class="mb-3">
                                <label for=""> email</label>
                                <input type="text" name="email" value="{{old('email')}}" class="form-control">
                                @error('email')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div>
                           <div class="mb-3">
                                <label for=""> contact</label>
                                <input type="text" name="contact" value="{{old('contact')}}" class="form-control">
                                @error('contact')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div>
                           {{-- <div class="mb-3">
                                <label for=""> user_type</label>
                                <input type="text" name="user_type" value="{{old('user_type')}}" class="form-control">
                                @error('user_type')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div> --}}
                           <div class="mb-3">
                                <label for=""> password</label>
                                <input type="text" name="password" value="{{old('password')}}" class="form-control">
                                @error('password')
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