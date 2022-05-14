@extends('./admin.base')
@section('jha')
    <div class="container">
        <div class="row mt-3">
            <div class="col-3">
                @include('./admin.side')
            </div>
            <div class="col-9">
                <h3>Insert Product Here</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('coupon.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for=""> code</label>
                                <input type="text" name="code" value="{{ old('code') }}" class="form-control">
                                @error('code')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for=""> amount</label>
                                <input type="text" name="amount" value="{{ old('amount') }}" class="form-control">
                                @error('amount')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for=""> status</label>
                                <input type="text" name="status" value="{{ old('status') }}" class="form-control">
                                @error('status')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input type="submit" name="submit" class="w-100 btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
