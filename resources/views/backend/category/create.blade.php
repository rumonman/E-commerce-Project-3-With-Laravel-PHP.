@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
	<div class="row page-title-header">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3>Add Category</h3>
				</div>
				<div class="card-body">
					@if (session('success'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ session('success') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@endif
					@if ($errors->any())
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<form action="{{route('admin.category.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" placeholder="Category Name" name="name">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<textarea type="text" class="form-control"  placeholder="Enter Category Description" name="description" rows="4"></textarea>
						</div>

						<div class="form-group">
							<label for="parent_category">Parent Category</label>
							<select class="form-control" name="parent_id">
								<option value=""> -- Select One --</option>
								@foreach($main_categorys as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
								@endforeach
							</select>
						</div>
						
						<div class="form-group">
							<label for="category_image">Category Image</label>
							<input type="file" class="form-control" id="category_image" name="image">
						</div>
						
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection