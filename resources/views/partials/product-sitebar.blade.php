<div class="list-group">
	@foreach(App\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent)
	<a href="#main-{{$parent->id}}" class="list-group-item list-group-item-action hover" data-toggle="collapse">
		<img src="{{asset('frontend/img/categorys/'. $parent->image)}}" alt="not found" width="40px">   {{$parent->name}}
	</a>
	<div class="collapse child-row

      @if(Route::is('product.category.show'))
          @if( App\Category::ParentOrNotCategory($parent->id, $category->id))
            show
          @endif
          @endif
	" id="main-{{$parent->id}}">
		@foreach(App\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as $child)

		<a href="{{route('product.category.show',$child->id)}}" class="list-group-item list-group-item-action
          
          @if(Route::is('product.category.show'))
          
          @if($child->id == $category->id)
            active
          @endif
          @endif

			">
			<img src="{{asset('frontend/img/categorys/'. $child->image)}}" alt="not found" width="30px">   {{$child->name}}
		</a>

		@endforeach
	</div>
	@endforeach
</div>