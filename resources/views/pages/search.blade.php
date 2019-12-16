@extends('layouts.master')
@section('content')

<div class="container margin-top">
	<div class="row">
		<div class="col-md-4">
			@include('partials.product-sitebar')
		</div>
		<div class="col-md-8">
			<div class="widget">
				<h3>Products</h3>
				<div class="row">
                  @foreach($products as $product)
					<div class="col-md-4">
						<div class="card">
							@php $i = 1; @endphp
							@foreach($product->images as $image)
							@if($i >0)
							<a href="{{route('product.show', $product->slug )}}">
							<img class="card-img-top feature-img" src="{{asset('frontend/img/'.$image->image)}}" alt="{{$product->title}}">
							</a>
							@endif
							@php $i--; @endphp
							@endforeach
							<div class="card-body">
								<h4 class="card-title">
									<a href="{{route('product.show', $product->slug )}}">{{$product->title}}</a>
								</h4>
								<p class="card-text">Tk: {{$product->price}}</p>
								<a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add To Cart</a>
							</div>
						</div>
					</div>
					@endforeach

				</div>
			</div>
			<div class="widget">
				
			</div>
			<div class="pagination mt-2">
				{{$products->links()}}
			</div>
			
		</div>

	</div>

</div>

@endsection