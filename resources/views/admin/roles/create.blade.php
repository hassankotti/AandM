@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h3>
                        <i class="fa fa-user"></i><span class="ml-2">Roles</span>
                    </h3>
                </div>
                <div class="pull-right">
                    <a href="{{ route('roles') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action=" {{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Role Name">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
