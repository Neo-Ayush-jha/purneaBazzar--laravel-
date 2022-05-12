@extends('public.master')
@section('ayush')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-3">
                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action">Item 1</a>
                    <a href="" class="list-group-item list-group-item-action">Item 1</a>
                    <a href="" class="list-group-item list-group-item-action">Item 1</a>
                    <a href="" class="list-group-item list-group-item-action">Item 1</a>
                    <a href="" class="list-group-item list-group-item-action">Item 1</a>
                    <a href="" class="list-group-item list-group-item-action">Item 1</a>
                    <a href="" class="list-group-item list-group-item-action">Item 1</a>
                </div>
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-4">
                            <img src="http://via.placeholder.com/600.jpg" class="w-100" style="object-fit: cover;height:220px" alt="">
                        </div>
                        <div class="col-8">
                            <table class="table">
                                <tr>
                                    <th>Title</th>
                                    <td>This is product title</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>This is product category</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>  <del>This is productdiscount</del></td>
                                </tr>
                                <tr>
                                    <th>Office Price</th>
                                    <td>This is product Price</td>
                                </tr>
                                <tr>
                                    <th>Brand</th>
                                    <td>This is product brand</td>
                                </tr>
                                <tr>
                                    <th>Qty</th>
                                    <td>This is product qty</td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col my-3">
                                    <a href="" class="btn btn-success">Add To Card</a>
                                    <a href="" class="btn btn-warning">Buy Now</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-header">Description</div>
                            <div class="card-body">
                                <p class="lead">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Commodi autem mollitia, reprehenderit alias repudiandae eligendi excepturi sed? Sed beatae itaque ipsum adipisci rerum, quasi possimus, cumque voluptatibus explicabo quaerat debitis.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection