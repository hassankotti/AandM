@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
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
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>Message!</strong><br><br>
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h3>Add New Product</h3>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('product.create') }}"> New Product</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Details</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th scope="row"> {{ $product->id }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->details }}</td>
                                        <td><img src="{{ asset($product->img_path) }}" class="thumbnail"></td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            <form action="{{ route('product.destroy',$product->id) }}" method="POST">
   
                                                <a class="btn btn-secondary btn-sm fa fa-eye" href="{{ route('product.show',$product->id) }}"></a>
                                
                                                <a class="btn btn-primary btn-sm fa fa-edit" href="{{ route('product.edit',$product->id) }}"></a>
                            
                                                @csrf
                                                @method('DELETE')
                                
                                                <button type="submit" class="btn btn-danger btn-sm fa fa-trash"></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                       <div class="d-flex justify-content-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection