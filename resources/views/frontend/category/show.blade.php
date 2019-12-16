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
				@php
					$products =$category->products;
				@endphp

				@if($products->count() >0)
                 @include('frontend.product.all_product_siteber')
				@else
                 <div class="alert alert-warning">
                 	No Products Has Added Yet In This Category. 
                 </div>
				@endif
				
			</div>
			<div class="widget">
				
			</div>
		</div>
	</div>
</div>
{{-- end siteber --}}
@endsection