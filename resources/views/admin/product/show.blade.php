@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="pull-left h3">
                        <i class="fa fa-product-hunt "></i><span class="ml-2">Show Product</span>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('product') }}">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class=" mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ asset($product->img_path) }}" alt="{{ $product->name }}" class="card-img" >
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->details }}.</p>
                                <p class="card-text"><small class="text-muted"><i class="fa fa-tag"></i> {{ $product->category['name'] }}</small></p>
                                <p class="card-text"><span class="badge badge-success">{{ 'SDG'.$product->price }}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated {{ $product->updated_at->format('d M Y h:m t') }}.</small>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
@endsection
