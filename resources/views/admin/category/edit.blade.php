@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="h3 pull-left">
                            {{ __('Edit Category')}}
                        </div>

                        <div class="pull-right">
                            <a href="{{ route('category') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action=" {{ route('category.update',$category->id) }}"  enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name"  value="{{ $category->name }}">
                            </div>
                            <div class="form-group">
                                <img src="{{ url($category->img_path) }}" class="rounded col-sm-1" alt="{{ $category->img_path }}">
                            </div>
                            <div class="custom-file">
                                <label class="custom-file-label" for="img_path">Image</label>
                                <input type="file" class="custom-file-input" name="img_path" value="{{ $category->img_path }}">
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea type="text" class="form-control" name="desc" >{{ $category->desc }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
