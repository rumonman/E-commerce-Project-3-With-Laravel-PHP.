@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
	<div class="row page-title-header">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h3>All Category</h3>
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
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Sl No</th>
								<th scope="col">Category Image</th>
								<th scope="col">Category Name</th>
								<th scope="col">Parent Category</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($categorys as $category)
							<tr>
								<th>{{$loop->index+1}}</th>
								<td>
									<img src="{{asset('frontend/img/categorys/'.$category->image)}}" alt="Not Found">
								</td>
								<td>{{ $category->name}}</td>
								<td>
									@if($category->parent_id == NULL)
									Primary Category
									@else
                                     {{ $category->parent->name }}
									@endif
								</td>
							
								<td>
									<a href="{{route('admin.category.edit', $category->id)}}"><i class="fas fa-edit"></i></a>

									<a href="#deleteModal{{$category->id}}" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>

									<!-- DeleteModal -->
									<div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle">Are You Sure To Delete?</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="{{route('admin.category.delete',$category->id)}}" method="POST">
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
								</td>
								
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection