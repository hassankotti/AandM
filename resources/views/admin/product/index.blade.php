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
                        <div class="pull-left">
                            <h3 class="page-title">
                                <i class="fa fa-user"></i><span class="ml-2">Products</span>
                            </h3>
                        </div>
                        <div class="pull-right">
                            <form class="inline-form row">
                                <a class="btn btn-primary col- mr-2" href="{{ route('product.create') }}"> New</a>
                                <input type="text"  class="form-control col-6" placeholder="search...">
                                <button type="submit" class="btn btn-default col-2"><span class="fa fa-search"></span>
                            </form>
                        </div>
                    </div>   
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                <th class="w-1">#</th>
                                <th class="w-25">Name</th>
                                <th class="w-25">Details</th>
                                <th class="w-10">Image</th>
                                <th class="w-10">Price</th>
                                <th class="w-10">Category</th>
                                <th class="w-20">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <th class="w-1"> {{ $product->id }}</th>
                                        <td class="w-25">{{ $product->name }}</td>
                                        <td class="w-25"><small>{{ $product->details }}</small></td>
                                        <td class="w-10">
                                            <img src="{{ asset($product->img_path) }}" class="img-thumbnail img-responsive">
                                        </td>
                                        <td class="w-10">{{ '$'.(($product->price)/100) }}</td>
                                        <td class="w-10">{{ $product->category['name'] }}</td>
                                        <td class="w-25">
                                            <form action="{{ route('product.destroy',$product->id) }}" method="POST" >

                                                <a class="btn btn-secondary btn-sm fa fa-eye " href="{{ route('product.show',$product->id) }}"></a>
                                
                                                <a class="btn btn-primary btn-sm fa fa-edit " href="{{ route('product.edit',$product->id) }}"></a>
                            
                                                @csrf
                                                @method('DELETE')
                                
                                                <button type="submit" class="btn btn-danger btn-sm fa fa-trash"></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <p> No Data to show!</p>
                                @endforelse
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