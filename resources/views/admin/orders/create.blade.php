@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h3>
                        <i class="fa fa-user"></i><span class="ml-2">Product</span>
                    </h3>
                </div>
                <div class="pull-right">
                            <a href="{{ route('product') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action=" {{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name"  placeholder="Enter Product Name">
                        </div>
                        <div class="form-group ">
                                <label for="name">Category</label>
                                <Select  class="form-control" name="category_id"  placeholder="Choose Category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                        </div>


                            <div class="form-group">
                                <label for="name">Price</label>
                                <input type="text" class="form-control" name="price"  placeholder="Enter Price">
                            </div>
                            <div class="custom-file">
                                <label class="custom-file-label" for="img_path">Image</label>
                                <input type="file" class="custom-file-input" name="img_path">
                            </div>

                    <div class="form-group">
                        <label for="desc">Details</label>
                        <textarea type="text" class="form-control" name="details" placeholder="Enter Product Details"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
