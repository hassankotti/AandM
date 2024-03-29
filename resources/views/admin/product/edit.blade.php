@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h3 class="card-title">
                        <i class="fa fa-product-hunt"></i><span class="ml-2">Product</span>
                    </h3>
                </div>
                <div class="pull-right">
                    <a href="{{ route('product') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action=" {{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter Product Name" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Category</label>
                        <Select  class="form-control" name="category_id"  placeholder="Choose Category" select="{{ $product->category->id }}">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Price</label>
                        <input type="text" class="form-control" name="price"  placeholder="Enter Price" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <img src="{{ url($product->img_path) }}" class="rounded col-sm-1" alt="{{ $product->img_path }}">
                    </div>
                    <div class="custom-file">
                        <label class="custom-file-label" for="img_path">Image</label>
                        <input type="file" class="custom-file-input" name="img_path" value="{{ $product->img_path }}" >
                    </div>
                    <div class="form-group">
                        <label for="desc">Details</label>
                        <textarea type="text" class="form-control" name="details" placeholder="Enter Product Details" >{{ $product->details }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
