@extends('layouts.master')
@section('content')
@include('partials.other.css')


<div class="page-info-section page-info">
	<div class="container">
		<div class="site-breadcrumb">
			<a href="">Home</a> /
			<span>Contact</span>
		</div>
		<img src="{{asset('other/img/page-info-art.png')}}" alt="" class="page-info-art">
	</div>
</div>
<div class="page-area contact-page">
	<div class="container spad">
		<div class="text-center">
			<h4 class="contact-title">Get in Touch</h4>
		</div>
		<form class="contact-form">
			<div class="row">
				<div class="col-md-6">
					<input type="text" placeholder="First Name *">
				</div>
				<div class="col-md-6">
					<input type="text" placeholder="Last Name *">
				</div>
				<div class="col-md-12">
					<input type="text" placeholder="Subject">
					<textarea placeholder="Message"></textarea>
					<div class="text-center">
						<button class="site-btn">Send Message</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="container contact-info-warp">
		<div class="contact-card">
			<div class="contact-info">
				<h4>Shipping & Returnes</h4>
				<p>Phone:    +8801717877561</p>
				<p>Email:   info@thaplaza.com</p>
			</div>
			<div class="contact-info">
				<h4>Informations</h4>
				<p>Phone:    +8801912209383</p>
				<p>Email:   thaplaza@gmail.com</p>
			</div>
		</div>
	</div>
	<div class="map-area">
		<div class="map active" id="map-canvas"></div>
	</div>
</div>
@include('partials.other.script')
@endsection