@extends('layouts.master')
@section('content')
@include('partials.other.css')
<div class="page-info-section page-info-big">
	<div class="container">
		<h2>Product</h2>
		<div class="site-breadcrumb">
			<a href="{{route('home')}}">Home</a> /
			<span>{{$product->title}} </span>
		</div>
		<img src="{{asset('other/img/categorie-page-top.png')}}" alt="" class="cata-top-pic">
	</div>
</div>
<div class="page-area product-page spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<figure>
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							@php $i=1; @endphp
                             @foreach($product->images as $image)
							<div class="carousel-item {{$i==1 ? 'active':''}}">
								<img class="d-block w-100" src="{{asset('frontend/img/'.$image->image)}}" alt="First slide">
							</div>
							@php $i++; @endphp
                             @endforeach
							
						</div>
						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</figure>
				
			</div>
			<div class="col-lg-6">
				<div class="product-content">
					<h2>{{$product->title}}</h2>
					<div class="pc-meta">
						<h4 class="price">Tk: {{$product->price}}</h4>

					<span> {{$product->quantity < 1 ?'No Item In Available':$product->quantity.' '.'Item In Stock' }}</span>
					
							<br><br>
						<div class="review">
							<div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star is-fade"></i>
							</div>
							<span>(2 reviews)</span>
						</div>
					</div>
					<p>{{$product->description}}</p>
					<div class="color-choose">
						<span>Colors:</span>
						<div class="cs-item">
							<input type="radio" name="cs" id="black-color" checked>
							<label class="cs-black" for="black-color"></label>
						</div>
						<div class="cs-item">
							<input type="radio" name="cs" id="blue-color">
							<label class="cs-blue" for="blue-color"></label>
						</div>
						<div class="cs-item">
							<input type="radio" name="cs" id="yollow-color">
							<label class="cs-yollow" for="yollow-color"></label>
						</div>
						<div class="cs-item">
							<input type="radio" name="cs" id="orange-color">
							<label class="cs-orange" for="orange-color"></label>
						</div>
					</div>
					
					@include('partials.card-button')
				</div>
			</div>
		</div>
		<div class="product-details">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<ul class="nav" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Description</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Additional information</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Reviews (0)</a>
						</li>
					</ul>
					<div class="tab-content">
						<!-- single tab content -->
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
							<p>{{$product->description}}</p>
						</div>
						<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
							<p>{{$product->description}}</p>
						</div>
						<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
</div>
@include('partials.other.script')
@endsection