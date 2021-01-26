@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="pull-left h3">
                        <i class="fa fa-tag "></i><span class="ml-2">Categories</span>
                    </div>
                    <div class="pull-right">
                        <form class="inline-form row">
                            <a class="btn btn-primary col-3 mr-2" href="{{ route('category.create') }}"> New</a>
                            <input type="text"  class="form-control col-6" placeholder="search...">
                            <button type="submit" class="btn btn-default col-2"><span class="fa fa-search"></span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-title">

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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>Message!</strong><br><br>
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Operations</th>
                        </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <th> {{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->desc }}</td>
                                <td>
                                    <img src="{{ asset($category->img_path) }}" class="img-thumbnail img-responsive" alt="{{ asset($category->img_path) }}">
                                </td>
                                <td class="col-2">
                                    <form action="{{ route('category.destroy',$category->id) }}" method="POST">

                                        <a class="btn btn-secondary btn-sm fa fa-eye" href="{{ route('category.show',$category->id) }}"></a>

                                        <a class="btn btn-primary btn-sm fa fa-edit" href="{{ route('category.edit',$category->id) }}"></a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm fa fa-trash"></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center"> No Data to show!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
</div>
@endsection
