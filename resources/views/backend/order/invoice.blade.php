<!DOCTYPE html>
<html>
	<head>
		<title>Invoice-{{$order->id}}</title>
		<link rel="stylesheet" href="{{asset('other/css/style.css')}}"/>
		<link rel="stylesheet" href="{{asset('other/css/bootstrap.min.css')}}"/>
		<style>
		</style>
	</head>
	<body>
		<div class="content-wrapper">
			<div class="invoice-header">
				<div class="float-left site-logo">
					<img src="{{asset('frontend/img/logo/logo.png')}}" alt="" width="100px">
				</div>
				
				<div class="float-right site-address">
					<h4>Nipa'S</h4>
					<p>23/5 Sector- 03, Uttara Dhaka</p>
					<p>Phone: <a href="#">01717877561</a></p>
					<p>email: <a href="#">info@nipas.com</a></p>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<h3>View Orders  #LEE{{$order->id}}</h3>
				</div>
				<div class="card-body">
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
								<th>Product Name</th>
								<th>Product Quantity</th>
								<th>Unit Price</th>
								<th>Sub Total Price</th>
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
									<a href="{{route('product.show',$cart->product->slug)}}">{{$cart->product->title}}</a>
								</td>
								<td>Tk: {{$cart->product->price}}</td>
								<td>
									@php
									$total_price +=$cart->product->price * $cart->product_quantity;
									@endphp
									Tk: {{$cart->product->price * $cart->product_quantity }}
								</td>
								
							</tr>
							@endforeach
							<tr>
								<td colspan="2"></td>
								<td>Total Amount</td>
								<td colspan="5">Tk: {{$total_price}}</td>
							</tr>
						</tbody>
					</table>
					@endif
				</div>
			</div>
		</div>
	</body>
</html>