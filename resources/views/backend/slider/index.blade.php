@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
	<div class="row page-title-header">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3>All Slider</h3>
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
					@if (session('delete'))
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						{{ session('delete') }}
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@endif
					@if (session('update'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ session('update') }}
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
					<a href="#addSliderModal" data-toggle="modal" class="btn btn-info float-right mb-2">Add New Slider</i></a>
					<table class="table mt-2">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Sl No</th>
								<th scope="col">Slider Name</th>
								<th scope="col">Slider Image</th>
								<th scope="col">Slider Priority</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($sliders as $slider)
							<tr>
								<th>{{$loop->index+1}}</th>
								<td>{{ $slider->title}}</td>
								<td>
									<img src="{{asset('frontend/img/sliders/'.$slider->image)}}" alt="Not Found">
								</td>
								<td>{{ $slider->priority}}</td>
								<td>
									<a href="#editModal{{$slider->id}}" data-toggle="modal"><i class="fas fa-edit"></i></a>
									<a href="#deleteModal{{$slider->id}}" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>
									<!-- DeleteModal -->
									<div class="modal fade" id="deleteModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog " role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle">Are You Sure To Delete?</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="{{route('admin.slider.delete',$slider->id)}}" method="POST">
														@csrf
														<button type="submit" class="btn btn-danger btn-sm">Permanent Delete</button>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
												</div>
											</div>
										</div>
									</div>

									<!-- editModal -->
					<div class="modal fade" id="editModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Edit Slider</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="{{route('admin.slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="form-group row">
											<label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
											<div class="col-md-6">
												<input id="title" title="text" class="form-control @error('first_name') is-invalid @enderror" name="title" value="{{ $slider->title }}" required autocomplete="title" autofocus>
												@error('title')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
											<div class="col-md-6">
												<input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}">
												<img src="{{asset('frontend/img/sliders/'.$slider->image)}}" alt="Not Found">
											</div>
											
										</div>
										<div class="form-group row">
											<label for="button_text" class="col-md-4 col-form-label text-md-right">{{ __('Button Text') }}</label>
											<div class="col-md-6">
												<input id="button_text" type="button_text" class="form-control @error('button_text') is-invalid @enderror" name="button_text" value="{{ $slider->button_text }}">
											</div>
										</div>
										<div class="form-group row">
											<label for="button_link" class="col-md-4 col-form-label text-md-right">{{ __('Button Link') }}</label>
											<div class="col-md-6">
												<input id="button_link" type="text" class="form-control" name="button_link" value="{{  $slider->button_link }}">
											</div>
										</div>

										<div class="form-group row">
											<label for="priority" class="col-md-4 col-form-label text-md-right">{{ __('Priority') }}</label>
											<div class="col-md-6">
												<input id="priority" type="text" class="form-control" name="priority" value="{{ $slider->priority }}">
											</div>
										</div>

										<button type="submit" class="btn btn-success">Update</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									</form>
								</div>
							</div>
						</div>
					</div>
								</td>
								
							</tr>
							@endforeach
						</tbody>
					</table>
					<!-- AddModal -->
					<div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Add New Slider</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="form-group row">
											<label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
											<div class="col-md-6">
												<input id="title" title="text" class="form-control @error('first_name') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
												@error('title')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
											<div class="col-md-6">
												<input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}">
											</div>
										</div>
										<div class="form-group row">
											<label for="button_text" class="col-md-4 col-form-label text-md-right">{{ __('Button Text') }}</label>
											<div class="col-md-6">
												<input id="button_text" type="button_text" class="form-control @error('button_text') is-invalid @enderror" name="button_text" value="{{ old('button_text') }}">
											</div>
										</div>
										<div class="form-group row">
											<label for="button_link" class="col-md-4 col-form-label text-md-right">{{ __('Button Link') }}</label>
											<div class="col-md-6">
												<input id="button_link" type="text" class="form-control" name="button_link" value="{{ old('button_link') }}">
											</div>
										</div>

										<div class="form-group row">
											<label for="priority" class="col-md-4 col-form-label text-md-right">{{ __('Priority') }}</label>
											<div class="col-md-6">
												<input id="priority" type="text" class="form-control" name="priority" value="{{ old('priority') }}">
											</div>
										</div>

										<button type="submit" class="btn btn-success">Add Now</button>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection