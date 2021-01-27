@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="pull-left h3">
                        <i class="fa fa-tag "></i><span class="ml-2">Show Category</span>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('category') }}">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <span class="fa fa-tag h1"></span>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <p class="card-text">{{ $category->desc }}.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
