@extends('layouts.master')
@section('content')
<div class="container">
	<div class="card card-body">
		<h3>Confirm Item</h3>
		<hr>
		<div class="row">
			<div class="col-md-7 border-right">
				@foreach(App\Cart::totalCarts() as $cart)
				<p>
					{{$cart->product->title}} - <strong>Tk: {{$cart->product->price}}</strong> - {{$cart->product_quantity}}
				</p>
				@endforeach
			</div>
			<div class="col-md-5">
				@php $total_price=0; @endphp
				@foreach(App\Cart::totalCarts() as $cart)
				@php
				$total_price += $cart->product->price * $cart->product_quantity;
				@endphp
				@endforeach
				<p>Total Price: <strong> Tk: {{$total_price}}</strong></p>
				<p>Total Price With Shipping Cost: <strong> Tk: {{$total_price + App\Setting::first()->shipping_cost}}</strong></p>
			</div>
		</div>
		
		<p>
			<a href="{{route('user.carts')}}">Change Cart Item</a>
		</p>
	</div>
	<div class="card card-body mt-2">
		<div class="card-body">
			<h3>Shipping Address</h3>
			<hr>
			@if (session('error'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				{{ session('error') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif
			<form method="POST" action="{{ route('user.checkouts.store') }}">
				@csrf
				<div class="form-group row">
					<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
					<div class="col-md-6">
						<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::check()?Auth::user()->first_name.' '.Auth::user()->last_name :'' }}" required autocomplete="name" autofocus>
						@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				
				<div class="form-group row">
					<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
					<div class="col-md-6">
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check()?Auth::user()->email :'' }}" required autocomplete="email">
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				<div class="form-group row">
					<label for="phone_no" class="col-md-4 col-form-label text-md-right">{{ __('Phone/Mobile') }}</label>
					<div class="col-md-6">
						<input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ Auth::check()?Auth::user()->phone_no :'' }}" required autocomplete="phone_no" autofocus>
						@error('phone_no')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				
				
				<div class="form-group row">
					<label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>
					<div class="col-md-6">
						<textarea id="message" class="form-control @error('message') is-invalid @enderror" name="message" rows="4"></textarea>
						@error('message')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				<div class="form-group row">
					<label for="shipping_address" class="col-md-4 col-form-label text-md-right">{{ __('Shipping Address') }}</label>
					<div class="col-md-6">
						<textarea id="shipping_address" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address" rows="4">{{ Auth::check()?Auth::user()->shipping_address :'' }}</textarea>
						@error('shipping_address')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				<div class="form-group row">
					<label for="payment_method" class="col-md-4 col-form-label text-md-right">{{ __('Payment') }}</label>
					<div class="col-md-6">
						<select class="form-control" name="payment_method_id" required id="payments">
							<option value=""> Select A Payment Method Please</option>
							@foreach($payments as $payment)
							<option value="{{$payment->short_name}}">{{$payment->name}}</option>
							@endforeach
						</select>
						
						@foreach($payments as $payment)
						
						@if( $payment->short_name == "cash_in")
						<div id="payment_{{$payment->short_name}}" class="alert alert-success hidden mt-3 text-center">
							<h3>
							For Cash In There Is Nothing Necessary. Just Click Finish Order.
							</h3>
							<br>
							<small>
							You Will Get Your Product In Two Or Three Business Days.
							</small>
						</div>
						@else
						<div id="payment_{{$payment->short_name}}" class="alert alert-success hidden mt-3 text-center">
							<h3>{{$payment->name}} Payment</h3>
							<p>
								<strong>{{$payment->name}} No : {{$payment->no}}</strong>
								<br>
								<strong>Account Type: {{$payment->type}}</strong>
							</p>
							<div class="alert alert-success">
								Please send The Above Money To This Bkash No And Write Your Transaction Code Below There.
							</div>
							
						</div>
						@endif
						@endforeach
						<input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter Transaction Code">
					</div>
				</div>
				<div class="form-group row mb-0">
					<div class="col-md-6 offset-md-4">
						<button type="submit" class="btn btn-primary">
						{{ __('Order Now') }}
						</button>
					</div>
				</div>
			</form>
		</p>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
								
$("#payments").change(function(){
	$payment_method = $("#payments").val();
	if($payment_method == "cash_in"){
$("#payment_cash_in").removeClass('hidden');
$("#payment_bkash").addClass('hidden');
$("#payment_rocket").addClass('hidden');
	}else if($payment_method == "bkash"){

$("#payment_bkash").removeClass('hidden');
$("#payment_rocket").addClass('hidden');
$("#payment_cash_in").addClass('hidden');
$("#transaction_id").removeClass('hidden');
	}else if($payment_method == "rocket"){
$("#payment_rocket").removeClass('hidden');
$("#payment_bkash").addClass('hidden');
$("#payment_cash_in").addClass('hidden');
$("#transaction_id").removeClass('hidden');
	}
	
	
})
</script>
@endsection