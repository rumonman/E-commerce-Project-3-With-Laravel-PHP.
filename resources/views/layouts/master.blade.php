<!DOCTYPE html>
<html leng="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset=utf-8>
		<meta name=description content="">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Ecommerce</title>
		
		@include('partials.css')
		@include('partials.other.css')
	</head>
	<body>
		
		@include('partials.nav')
		<section class="section">
			@yield('content')
		</section>
		<section class="footer-top-section home-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-8 col-sm-12">
					<div class="footer-widget about-widget">
						<img src="{{asset('other/img/logo.png')}}" class="footer-logo" alt="">
						<p>Tha Plaza Bangladesh is known to be the first ever online platform that offers buying and selling in bangladesh. It is the fastest growing ecommerce platform in Bangladesh offering an unparalleled shopping experience at the comfort of your home. You can enjoy convenient and hassle free shopping without rushing to the stores. Tha Plaza promises to take your style statement to a whole new level by having a wide variety of products, categories and brands on board.</p>
						<div class="cards">
							<img src="{{asset('other/img/cards/5.png')}}" alt="">
							<img src="{{asset('other/img/cards/4.png')}}" alt="">
							<img src="{{asset('other/img/cards/3.png')}}" alt="">
							<img src="{{asset('other/img/cards/2.png')}}" alt="">
							<img src="{{asset('other/img/cards/1.png')}}" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">usefull Links</h6>
						<ul>
							<li><a href="#">Partners</a></li>
							<li><a href="#">Bloggers</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Sitemap</h6>
						<ul>
							<li><a href="#">Partners</a></li>
							<li><a href="#">Bloggers</a></li>
							<li><a href="#">Support</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Press</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Shipping & returns</h6>
						<ul>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Track Orders</a></li>
							<li><a href="#">Returns</a></li>
							<li><a href="#">Jobs</a></li>
							<li><a href="#">Shipping</a></li>
							<li><a href="#">Blog</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-6">
					<div class="footer-widget">
						<h6 class="fw-title">Contact</h6>
						<div class="text-box">
							<p>Tha Plaza Company Ltd </p>
							<p>35/1, Sector-3, Uttara, Dhaka-1230, </p>
							<p>+8801717877561</p>
							<p>info@thaplaza.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		@include('partials.footer')
		
		 @include('partials.script')
		
		@include('partials.other.script')
       
	</body>
</html>