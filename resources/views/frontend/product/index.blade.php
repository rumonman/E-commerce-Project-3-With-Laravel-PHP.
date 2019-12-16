@extends('layouts.master')
@section('content')
{{-- siteber+content --}}
<div class="container margin-top">
	<div class="row">
		<div class="col-md-4">
			@include('partials.product-sitebar')
		</div>
		<div class="col-md-8">
			<div class="widget">
				<h3>All Products</h3>
				@include('frontend.product.all_product_siteber')
			</div>
			<div class="widget">
				
			</div>
		</div>
	</div>
</div>
{{-- end siteber --}}
@endsection