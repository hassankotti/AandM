@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="display-5 pull-left">
                            {{ __('Add New order')}}
                        </div>

                        <div class="pull-right">
                            <a href="{{ route('order') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('order.update',$order->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name"  placeholder="Enter order Name" value="{{ $order->name }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Category</label>
                                <Select  class="form-control" name="category_id"  placeholder="Choose Category" select="{{ $order->category->id }}">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Price</label>
                                <input type="text" class="form-control" name="price"  placeholder="Enter Price" value="{{ $order->price }}">
                            </div>
                            <div class="form-group">
                                <img src="{{ url($order->img_path) }}" class="rounded col-sm-1" alt="{{ $order->img_path }}">
                            </div>
                            <div class="custom-file">
                                <label class="custom-file-label" for="img_path">Image</label>
                                <input type="file" class="custom-file-input" name="img_path" value="{{ $order->img_path }}" >
                            </div>
                            <div class="form-group">
                                <label for="desc">Details</label>
                                <textarea type="text" class="form-control" name="details" placeholder="Enter order Details" >{{ $order->details }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
