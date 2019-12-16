@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
	<div class="row page-title-header">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3>Add Product</h3>
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
					<form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="exampleInputEmail1">Title</label>
							<input type="text" class="form-control" placeholder="Product Title" name="title">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Description</label>
							<textarea type="text" class="form-control"  placeholder="Enter Product Description" name="description" rows="4"></textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Price</label>
							<input type="number" class="form-control"  placeholder="Enter Product Price" name="price">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Quentity</label>
							<input type="number" class="form-control"  placeholder="Enter Product Quentity" name="quantity">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Select Category</label>
							<select name="category_id" class="form-control">
								<option value="">--Select One--</option>
								@foreach(App\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent)
								<option value="{{$parent->id}}">{{$parent->name}}</option>
								
								@foreach(App\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as $child)
								<option value="{{$child->id}}"> ---->{{$child->name}}</option>
								@endforeach
								@endforeach
								
							</select>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Select Brand</label>
							<select name="brand_id" class="form-control">
								<option value="">--Select One--</option>
								@foreach(App\Brand::orderBy('name','asc')->get() as $brand)
								<option value="{{$brand->id}}">{{$brand->name}}</option>
								
								@endforeach
								
							</select>
						</div>

						<div class="form-group">
							<label for="product_image">Product Image</label>
							<div class="row">
								<div class="col-md-4">
									<input type="file" class="form-control" id="product_image" name="product_image[]">
								</div>
								<div class="col-md-4">
									<input type="file" class="form-control" id="product_image" name="product_image[]">
								</div>
								<div class="col-md-4">
									<input type="file" class="form-control" id="product_image" name="product_image[]">
								</div>
								<div class="col-md-4">
									<input type="file" class="form-control" id="product_image" name="product_image[]">
								</div>
								<div class="col-md-4">
									<input type="file" class="form-control" id="product_image" name="product_image[]">
								</div>
							</div>
						</div>
						
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection