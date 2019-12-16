@extends('layouts.backend')
@section('content')
<div class="content-wrapper">
	<div class="card">
		<div class="card-header">
			<h3>View Orders  #LEE{{$order->id}}</h3>
		</div>
		<div class="card-body">
			@if (session('completed'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('completed') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif
			@if (session('paid'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('paid') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif
			@if (session('charge'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('charge') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif
			<h3>Order Informetion</h3>
			<div class="row">
				<div class="col-md-6 border-right">
					<p><strong>Order Name:</strong> {{$order->name}}</p>
					<p><strong>Order Phone:</strong> {{$order->phone_no}}</p>
					<p><strong>Order Email:</strong> {{$order->email}}</p>
					<p><strong>Order Shipping Address:</strong> {{$order->shipping_address}}</p>
				</div>
				<div class="col-md-6">
					<p><strong>Order Payment Method:</strong> {{$order->payment->name}}</p>
					<p><strong>Order Payment Transaction:</strong> {{$order->transaction_id}}</p>
				</div>
			</div>
			<hr>
			<h3>Order Item</h3>
			@if($order->cart->count() > 0)
			<table class="table table-bordered table-striped mt-4">
				<thead>
					<tr>
						<th>No</th>
						<th>Product Image</th>
						<th>Product Name</th>
						<th>Product Quantity</th>
						<th>Unit Price</th>
						<th>Sub Total Price</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php
					$total_price = 0;
					@endphp
					@foreach($order->cart as $cart)
					<tr>
						<td>{{$loop->index + 1}}</td>
						<td>
							@if($cart->product->images->count() > 0)
							<img src="{{asset('frontend/img/'.$cart->product->images->first()->image)}}" alt="" width="40px">
							@endif
						</td>
						<td>
							<a href="{{route('product.show',$cart->product->slug)}}">{{$cart->product->title}}</a>
						</td>
						<td>
							<form class="form-inline" action="{{route('user.carts.update',$cart->id)}}" method="POST">
								@csrf
								<input type="number" name="product_quantity" class="form-control" value="{{$cart->product_quantity}}" />
								<button type="submit" class="btn btn-sm btn-success ml-2">Update</button>
							</form>
						</td>
						<td>Tk: {{$cart->product->price}}</td>
						<td>
							@php
							$total_price +=$cart->product->price * $cart->product_quantity;
							@endphp
							Tk: {{$cart->product->price * $cart->product_quantity }}
						</td>
						<td>
							<form class="form-inline" action="{{route('user.carts.delete',$cart->id)}}" method="POST">
								@csrf
								<input type="hidden" name="card_id"/>
								<button type="submit" class="btn btn-sm btn-danger">Delete</button>
							</form>
						</td>
					</tr>
					@endforeach
					<tr>
						<td colspan="4"></td>
						<td>Total Amount</td>
						<td colspan="6">Tk: {{$total_price}}</td>
					</tr>
				</tbody>
			</table>
			@endif

			<hr>
			
			
				<form action="{{route('admin.order.charge',$order->id)}}" method="POST">
				@csrf
				<label>Shipping Cost: </label>
				<input type="number" name="shipping_charge" id="shipping_charge" value="{{$order->shipping_charge}}" class="form-control">
				<br>
				<label>Custom Discount: </label>
				<input type="number" name="custom_discount" id="custom_discount" value="{{$order->custom_discount}}" class="form-control">
				<br>

				 <input type="submit" value="Update" class="btn btn-success mt-2"/>
				 <a href="{{ route('admin.order.invoice',$order->id) }}" class="btn btn-info mt-2">General Invoice</a>
				
			</form>
			

			<hr>
			<form  action="{{route('admin.order.completed',$order->id)}}" method="POST" style="display: inline-block!important;">
				@csrf
				@if($order->is_completed)
               <input type="submit" value="Cancel Order" class="btn btn-danger"/>
				@else
              <input type="submit" value="Complete Order" class="btn btn-success"/>
				@endif
				
			</form>
			<form action="{{route('admin.order.paid',$order->id)}}" method="POST" style="display: inline-block!important;">
				@csrf
				@if($order->is_paid)
                <input type="submit" value="Cancel Payment" class="btn btn-danger"/>
				@else
				<input type="submit" value="Paid Order" class="btn btn-success"/>
				@endif
			</form>
		</div>
	</div>
</div>
@endsection