@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="pull-left h3">
                        <i class="fa fa-tag "></i><span class="ml-2">Show User</span>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('users') }}">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3 " style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ asset($user->img_path) }}" alt="{{ $user->name }}" class="card-img" >
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <span class="card-title h5"><i class="mr-2 fa fa-user-o"></i>{{ $user->name }}</span>
                                <span class="ml-2 badge badge-success"><i class="mr-2 fa fa-warning"></i>{{ $user->user_role?'Admin':'user' }}</span>
                                <p class="card-text"><i class="mr-2 fa fa-money"></i>{{ $user->balance }}.</p>
                                <p class="card-text"><i class="mr-2 fa fa-envelope"></i>{{ $user->email }}.</p>
                                <p class="card-text text-muted"><i class="fa fa-clock-o"></i> {{ $user->email_verified_at==null? 'Email not verified yet!' :$user->email_verified_at->format('d M Y h:m t') }}</p>
                                <p class="card-text text-muted"><i class="fa fa-calendar-check-o"></i> {{ $user->created_at==null? 'Email not verified yet!' :$user->created_at->format('d M Y h:m t') }}</p>
                                <p class="card-text"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
