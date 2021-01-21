@extends('layouts.app')

@section('content')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h3 class="page-title">
                        <i class="fa fa-tag"></i><span class="ml-2">Show Categories</span>
                        <div class="container">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </h3>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mr-2" href="{{ route('category') }}"> Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="container border rounded">
                    <div class="row">
                        <div class="col-2 p-1 border-right">
                            <img style="width: 150px" class="img-responsive text-center" src="{{ asset($category->img_path) }}" alt="{{ $category->name }}">
                        </div>
                        <div class="col-10 p-4">
                            <h5 class="row">Name: {{ $category->name }}</h5>
                            <h5 class="row">Description: {{ $category->desc }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
