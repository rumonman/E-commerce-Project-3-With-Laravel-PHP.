@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h3>My Carts Items</h3>
	@if (session('update'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		{{ session('update') }}
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
	@if(App\Cart::totalItems() > 0)
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
			@foreach(App\Cart::totalCarts() as $cart)
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
	<div class="float-right">
		<a href="{{route('home')}}" class="btn btn-sm btn-info">Continue Shopping</a>
		<a href="{{route('user.checkouts')}}" class="btn btn-sm btn-warning">Checkout</a>
	</div>
	@else
     <div class="alert alert-warning">
     	<strong>There Is No Item In Your Cart.</strong>
     	<br>
     	<a href="{{route('home')}}" class="btn btn-sm btn-info">Continue Shopping</a>
     </div>
	@endif
	
		</div>
	</div>
</div>
@endsection