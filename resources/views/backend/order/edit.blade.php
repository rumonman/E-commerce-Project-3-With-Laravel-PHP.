@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
	<div class="row page-title-header">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3>Edit Product</h3>
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
					
					<form action="{{route('admin.category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" placeholder="Category Name" name="name" value="{{$category->name}}">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea type="text" class="form-control"  placeholder="Enter Category Description" name="description" rows="4">{{$category->description}}</textarea>
						</div>

						<div class="form-group">
							<label for="parent_category">Parent Category</label>
							<select class="form-control" name="parent_id">
								<option value=""> -- Select One --</option>
								@foreach($main_categorys as $cat)
                                <option value="{{$cat->id}}"{{$cat->id ==$category->parent_id ? "selected":""}}>{{$cat->name}}</option>
								@endforeach
							</select>
						</div>
						
						<div class="form-group">
							<label for="category_image">Category Image</label>
							<input type="file" class="form-control" id="category_image" name="image">
							<hr>
							<img src="{{asset('frontend/img/categorys/'.$category->image)}}" alt="Not Found" width="150px">
						</div>
						
						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection