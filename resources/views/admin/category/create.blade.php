@extends('layouts.app')

@section('content')
   <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h3 class="page-title">
                        <i class="fa fa-tag"></i><span class="ml-2">Add New Category</span>
                    </h3>
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
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary mr-2" href="{{ route('category.create') }}">{{ __('Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action=" {{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter Category Name">
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea type="text" class="form-control" name="desc" placeholder="Enter Category Description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
