@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
		<div class="col-md-3">
			<div class="card card-body">
				<div class="card-img-top">
					<img src="{{ asset($profile->img_path) }}" class="img-responsive w-100 rounded-circle" alt="">
				</div>
				<div class="card-title text-center m-3">
					<div class="card-text">
						{{ $profile->name }}
					</div>
					<div class="card-text">
						Developer
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="card-text text-center">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
				</div>

			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
			   Some user related content goes here...
            </div>
		</div>
	</div>
</div>
@endsection
