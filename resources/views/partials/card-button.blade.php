<form class="form-inline" action="{{route('user.carts.store')}}" method="POST">
	@csrf
	<input type="hidden" name="product_id" value="{{ $product->id }}">
  <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-shopping-cart"></i>Add To Cart</button>
</form>