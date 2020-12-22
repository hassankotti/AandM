
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="display-5 pull-left">
                            {{ __('Add New Product')}}
                        </div>

                        <div class="pull-right">
                            <a href="{{ route('product') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{ asset($product->img_path) }}" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title"> {{ $product->name }}</h5>
                                <p class="card-text">{{ $product->details }}</p>
                                <a href="#" class="btn btn-primary">{{ '$'.$product->price }}</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection