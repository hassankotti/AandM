@extends('layouts.app')

@section('content')
    <div class="container-fluid">
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
    </div>
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <h3 class="page-title"><i class="fa fa-user"></i><span class="ml-2">{{ __('Roles') }}</span> </h3>
            </div>

            <div class="pull-right">
                <form class="inline-form row">
                    <a class="btn btn-primary col-3 mr-2" href="{{ route('roles.create') }}"> New</a>
                    <input type="text" class="form-control col-6" placeholder="search...">
                    <button type="submit" class="btn btn-default col-2"><span class="fa fa-search"></span>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <th> {{ $role->id }}</th>
                            <td>{{ $role->name }}</td>
                            <td>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST">

                                    <a class="btn btn-secondary btn-sm fa fa-eye "
                                        href="{{ route('roles.show', $role->id) }}"></a>

                                    <a class="btn btn-primary btn-sm fa fa-edit "
                                        href="{{ route('roles.edit', $role->id) }}"></a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm fa fa-trash"></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center"> No Data to show!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                {{ $roles->links() }}
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
