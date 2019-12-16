@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
	<div class="row page-title-header">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3>Manage Orders</h3>
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
					<table class="table" id="dataTable">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Sl No</th>
								<th scope="col">Order ID</th>
								<th scope="col">Orderer Name</th>
								<th scope="col">Orderer Phone No</th>
								<th scope="col">Orderer Transaction ID</th>
								<th scope="col">Orderer Status</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($orders as $order)
							<tr>
								<th>{{$loop->index+1}}</th>
								<td>#LEE{{ $order->id}}</td>
								<td>{{ $order->name}}</td>
								<td>{{ $order->phone_no}}</td>
								<td>{{ $order->transaction_id}}</td>
								<td>
									<P>
									@if($order->is_seen_by_admin)
                                    <button type="submit" class="btn btn-sm btn-success">Seen</button>
									@else
                                  <button type="submit" class="btn btn-sm btn-warning">Unseen</button>
									@endif
									</P>
									<P>
									@if($order->is_completed)
                                    <button type="submit" class="btn btn-sm btn-success">Completed</button>
									@else
                                  <button type="submit" class="btn btn-sm btn-warning">Uncompleted</button>
									@endif
									</P>
									<P>
									@if($order->is_paid)
                                    <button type="submit" class="btn btn-sm btn-success">Paid</button>
									@else
                                  <button type="submit" class="btn btn-sm btn-danger">Unpaid</button>
									@endif
									</P>
								</td>
								<td>
									<a href="{{route('admin.order.show', $order->id)}}"><i class="fas fa-eye"></i></a>

									<a href="#deleteModal{{$order->id}}" data-toggle="modal"><i class="fas fa-trash-alt"></i></a>

									<!-- DeleteModal -->
									<div class="modal fade" id="deleteModal{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLongTitle">Are You Sure To Delete?</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="{{route('admin.order.delete',$order->id)}}" method="POST">
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
						<tfoot>
							<tr>
								<th>Sl No</th>
								<th>Order ID</th>
								<th>Orderer Name</th>
								<th>Orderer Phone No</th>
								<th>Orderer Transaction ID</th>
								<th>Orderer Status</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection