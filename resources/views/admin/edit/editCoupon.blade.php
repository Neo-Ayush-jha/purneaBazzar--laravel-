@extends('./admin.base')
@section('jha')
    <div class="container">
        <div class="row mt-3">
            <div class="col-3">
                @include('./admin.side')
            </div>
            <div class="col-9">
               <h3>Update Coupon Here</h3>
               <div class="card">
                   <div class="card-body">
                       <form action="{{route('coupon.update',$coupon)}}"  method="post">
                        @method('put')
                           @csrf
                           <div class="mb-3">
                                <label for=""> code</label>
                                <input type="text" name="code" value="{{$coupon->code}}" class="form-control">
                                @error('code')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div>
                           <div class="mb-3">
                                <label for=""> amount</label>
                                <input type="text" name="amount" value="{{$coupon->amount}}" class="form-control">
                                @error('amount')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div>
                           <div class="mb-3">
                                <label for=""> status</label>
                                <input type="text" name="status" value="{{$coupon->status}}" class="form-control">
                                @error('status')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                           </div>
                           <div class="mb-3">
                               <input type="submit" name="update coupon" class="w-100 btn btn-success">
                           </div>
                       </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection