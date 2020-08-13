@extends('admin.layouts.dashboard')
@section('title','Trashed Product')
@section('content')

<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{route('product.index')}}" class="btn btn-md btn-primary rounded-pill shadow-lg"><i class="fas fa-arrow-left"></i> Back To All Product</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($products as $key => $product)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{!! $product->description !!}</td>
                                <td><img src="{{asset($product->image)}}" class="img-fluid" width="100px" /></td>
                                <td>{{$product->price}}</td>
                                <td>
                                    <a href="{{route('product.restore',$product->id)}}" class="btn btn-sm btn-warning">Restore</a>
                                    <a href="{{route('product.kill',$product->id)}}" class="btn btn-sm btn-danger btn-hapus">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection