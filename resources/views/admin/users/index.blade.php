@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <h3 class="page-title"><i class="fa fa-user"></i><span class="ml-2">{{ __('Users') }}</span> </h3>
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
                <div class="pull-right">
                    <form class="inline-form row">
                        <a class="btn btn-primary col-3 mr-2" href="{{ route('users.create') }}"> New</a>
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
                            <th>Email</th>
                            <th>User Role</th>
                            <th>Created At</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <th> {{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td><small>{{ $user->email }}</small></td>
                                <td>{{ $user->user_role }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">

                                        <a class="btn btn-secondary btn-sm fa fa-eye "
                                            href="{{ route('users.show', $user->id) }}"></a>

                                        <a class="btn btn-primary btn-sm fa fa-edit "
                                            href="{{ route('users.edit', $user->id) }}"></a>

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
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
