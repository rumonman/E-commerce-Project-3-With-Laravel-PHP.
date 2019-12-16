@extends('layouts.master')
@section('content')
 <div class="our-slider">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  	@foreach($sliders as $slider)
    <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{$loop->index == 0 ? 'active':''}}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">
     @foreach($sliders as $slider)
    <div class="carousel-item {{$loop->index == 0 ?'active': ''}}">
      <img class="d-block w-100" src="{{asset('frontend/img/sliders/'.$slider->image)}}" alt="{{$slider->title}}" style="height: 450px;"/>
      <div class="carousel-caption d-none d-md-block">
    <h5>{{$slider->title}}</h5>
    @if($slider->button_text)
    <p><a href="{{$slider->button_link}}" target="_blank" class="btn btn-danger btn-sm">{{$slider->button_text}}</a></p>
    @endif
  </div>
    </div>
   @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>		
  </div>
<div class="container mt-4">
	<div class="row">
		<div class="col-md-4">
			@include('partials.product-sitebar')
		</div>
		<div class="col-md-8">
			<div class="widget">
				@if (session('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('success') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			@endif
				<h3>FEATURED PRODUCTS</h3>
				@include('frontend.product.all_product_siteber')
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