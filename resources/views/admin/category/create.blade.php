@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="display-4 pull-left">
                            {{ __('Add New Category')}}
                        </div>

                        <div class="pull-right">
                            <a href="{{ route('category') }}" class="btn btn-primary">Back</a>
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
                                <label class="form-label" for="img_path">Image</label>
                                <input type="file" class="form-control" name="img_path">
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
    </div>
@endsection