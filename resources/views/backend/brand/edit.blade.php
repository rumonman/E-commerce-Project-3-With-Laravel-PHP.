@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
	<div class="row page-title-header">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3>Edit Brand</h3>
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
					
					<form action="{{route('admin.brand.update', $brand->id)}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" placeholder="Category Name" name="name" value="{{$brand->name}}">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea type="text" class="form-control"  placeholder="Enter Category Description" name="description" rows="4">{{$brand->description}}</textarea>
						</div>

						
						<div class="form-group">
							<label for="category_image">Brand Image</label>
							<input type="file" class="form-control" id="category_image" name="image">
							<hr>
							<img src="{{asset('frontend/img/brands/'.$brand->image)}}" alt="Not Found" width="150px">
						</div>
						
						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection