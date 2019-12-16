@extends('frontend.user.master')
@section('sub-content')
<div class="container">
	<h2>Welcome {{$user->first_name. ' '. $user->last_name}}</h2>
	<p>You Can Change Your Profile and Every Informetions Here..</p>
	<hr>

	<div class="row">
		<div class="col-md-4">
			<div class="card card-body mt-2 pointer" onclick="location.href='{{route('user.profile.show')}}'">
				<h6 class="text-center">Update Profile</h6>
			</div>
		</div>
	</div>
</div>
@endsection