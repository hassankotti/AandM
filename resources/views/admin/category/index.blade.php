@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="display-4 pull-left">
                            {{ __('Categories')}}
                        </div>

                        <div class="pull-right">
                            <a href="{{ route('category.create') }}" class="btn btn-primary">New Category</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row"> {{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->img_path }}</td>
                                        <td>
                                        
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection