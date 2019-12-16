@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
	<div class="row page-title-header">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3>Edit Districe</h3>
				</div>
				<div class="card-body">
					@if (session('update'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ session('update') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@endif
					
					<form action="{{route('admin.district.update', $district->id)}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" name="name" value="{{$district->name}}">
						</div>

						<div class="form-group">
							<label for="">Select A Division For This District </label>
							<select class="form-control" name="division_id">
								<option value="">-- Select One --</option>
								@foreach($divisions as $division)
                                 <option value="{{$division->id}}" {{$district->division->id == $division->id ? 'selected':''}}>{{$division->name}}</option>
								@endforeach
							</select>
						</div>
						
						
						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection