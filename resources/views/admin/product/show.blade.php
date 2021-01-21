@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="display-5 pull-left">
                    {{ __('Add New Product') }}
                </div>

                <div class="pull-right">
                    <a href="{{ route('product') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="container border rounded">
                    <div class="row">
                        <div class="col-2 p-1 border-right">
                            <img style="width: 150px" class="img-responsive text-center"
                                src="{{ asset($product->img_path) }}" alt="{{ $product->name }}">
                        </div>
                        <div class="col-10 p-4">
                            <h5 class="card-title"><b>Name : </b>{{ $product->name }}</h5>
                            <p class="card-text"><b>Details :</b>{{ $product->details }}</p>
                            <p class="card-text"><b>Category :</b>{{ $product->category['name'] }}</p>
                            <p><b>Price :</b> <span class="badge badge-success">{{ 'SDG ' . $product->price }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
