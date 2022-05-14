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
                        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for=""> Title</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                                @error('title')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Category</label>
                                <select name="category_id" id="" class="form-select">
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->cat_title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-danger small">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for=""> Brand</label>
                                <select name="brand_id" value="{{ old('brand_id') }}" id="" class="form-select">
                                    @foreach ($brand as $item)
                                        <option value="{{ $item->id }}">{{ $item->brand_title }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for=""> Image</label>
                                <input type="file" name="image"
                                    class="form-control" value="{{ old('image') }}">
                                @error('image')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for=""> Description</label>
                                <input type="text" name="description" value="{{ old('description') }}"
                                    class="form-control">
                                @error('description')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for=""> Price</label>
                                <input type="number" name="price" value="{{ old('price') }}" class="form-control">
                                @error('price')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Descount price</label>
                                <input type="number" name="discount_price" value="{{ old('discount_price') }}"
                                    class="form-control">
                                @error('discount_price')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Stoke</label>
                                <input type="number" name="stock" value="{{ old('stock') }}" class="form-control">
                                @error('stock')
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
