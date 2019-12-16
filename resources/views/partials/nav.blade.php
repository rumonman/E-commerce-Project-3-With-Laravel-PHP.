<nav id="navigation"  class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
	<div class="container">
		<a class="navbar-brand" href="{{route('home')}}">
			<img src="{{asset('other/img/logo.png')}}" class="footer-logo" alt="">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item {{Route::is('home') ? 'active': ''}}">
					<a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item {{Route::is('product') ? 'active': ''}}">
					<a class="nav-link" href="{{route('product')}}">Products</a>
				</li>
				<li class="nav-item {{Route::is('contact') ? 'active': ''}}">
					<a class="nav-link" href="{{route('contact')}}">Contact</a>
				</li>
				<li class="nav-item cta cta-colored">
					<a href="{{route('user.carts')}}" class="nav-link" id="totalItems"><i class="fas fa-shopping-cart"></i>[ {{ App\Cart::totalItems() }} ]</a>
				</li>
				<li class="nav-item">
					<form class="form-inline my-2 my-lg-0" action="{{route('product.search')}}" method="get">
						<div class="input-group mb-3">
							<input type="text" class="form-control" name="search" placeholder="Search Products" aria-label="Recipient's username" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-outline-secondary search-icon-button" type="button"><i class="fas fa-search"></i></button>
							</div>
						</div>
					</form>
				</li>
				
			</ul>
			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->
				@guest
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
				</li>
				@if (Route::has('register'))
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
				</li>
				@endif
				@else

				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						<img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}" style="width: 40px;" class="img rounded-circle">
						{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('user.dashboard') }}">
							{{ __('My Dashboard') }}
						</a>
						<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>

				@endguest
			</ul>
			
		</div>
	</div>
</nav>