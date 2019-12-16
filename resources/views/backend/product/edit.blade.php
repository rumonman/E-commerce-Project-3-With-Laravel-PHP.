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
					
					<form action="{{route('admin.products.update', $edit_product->id)}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="exampleInputEmail1">Title</label>
							<input type="text" class="form-control" placeholder="Product Title" name="title" value="{{$edit_product->title}}">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Description</label>
							<textarea type="text" class="form-control"  placeholder="Enter Product Description" name="description" rows="4">{{$edit_product->description}}</textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Price</label>
							<input type="number" class="form-control"  placeholder="Enter Product Price" name="price" value="{{$edit_product->price}}">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Quentity</label>
							<input type="number" class="form-control"  placeholder="Enter Product Quentity" name="quantity" value="{{$edit_product->quantity}}">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Select Category</label>
							<select name="category_id" class="form-control">
								<option value="">--Select One--</option>
								@foreach(App\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent)
								<option value="{{$parent->id}}" {{$parent->id == $edit_product->category->id ? 'selected': ''}}>{{$parent->name}}</option>
								
								@foreach(App\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as $child)
								<option value="{{$child->id}}" {{$child->id == $edit_product->category->id ? 'selected': ''}}> ---->{{$child->name}}</option>
								@endforeach
								@endforeach
								
							</select>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Select Brand</label>
							<select name="brand_id" class="form-control">
								<option value="">--Select One--</option>
								@foreach(App\Brand::orderBy('name','asc')->get() as $br)
								<option value="{{$br->id}}" {{$br->id == $edit_product->brand->id ? 'selected': ''}}>{{$br->name}}</option>
								
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
						
						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection