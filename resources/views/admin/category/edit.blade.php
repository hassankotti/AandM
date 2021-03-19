@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h3 class="page-title">
                        <i class="fa fa-tag"></i><span class="ml-2">Edit Categories</span>
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
                <form action=" {{ route('category.update', $category->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea type="text" class="form-control" name="desc">{{ $category->desc }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
