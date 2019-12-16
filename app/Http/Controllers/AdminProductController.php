<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use Image;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
     public function show()
     {
     	$products = Product::orderBy('id','desc')->get();
     	return view('backend.product.show',compact('products'));
     }

    public function create()
    {
    	return view('backend.product.create');
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
         'title' => ['required','max:255'],
         'description' => ['required',],
          'price' => ['required','numeric'],
          'quantity' => ['required','numeric'],
          'category_id' => ['required','numeric'],
          'brand_id' => ['required','numeric'],
           ]);

    	$product = new Product;
    	$product->title = $request->title;
    	$product->description = $request->description;
    	$product->price = $request->price;
    	$product->quantity = $request->quantity;

    	$product->slug =Str::slug($product->title);
    	$product->category_id =$request->category_id;
    	$product->brand_id = $request->brand_id;
    	$product->admin_id = 1;
    	
    	$product->save();

    	// if($request->hasFile('product_image')){
    	// 	$image = $request->file('product_image');
    	// 	$img =time().'.'. $image->getClientOriginalExtension();
    	// 	$location = public_path('frontend/img/'.$img);
    	// 	Image::make($image)->resize(850, 800)->save($location);

    	// 	$product_image =new ProductImage;
    	// 	$product_image->product_id=$product->id;
    	// 	$product_image->image=$img;
    	// 	$product_image->save();
    	// }

    	if(($request->product_image)>0){
         $i =0;
    		foreach($request->product_image as $image){

    		//$image = $request->file('product_image');
    		$img =time().$i. '.'. $image->getClientOriginalExtension();
    		$location = public_path('frontend/img/'.$img);
    		Image::make($image)->resize(850, 600)->save($location);

    		$product_image =new ProductImage;
    		$product_image->product_id=$product->id;
    		$product_image->image=$img;
    		$product_image->save();
    	   $i++;
    		}
    	}

    	return back()->with('success','Your Product Insert Successfully!!');
    }

    public function edit($id)
    {
    	$edit_product = Product::findOrFail($id);
     	return view('backend.product.edit',compact('edit_product'));
    }

    public function update(Request $request, $id)
    {
    	$validatedData = $request->validate([
         'title' => ['required','max:255'],
         'description' => ['required',],
          'price' => ['required','numeric'],
          'quantity' => ['required','numeric'],
          'category_id' => ['required','numeric'],
          'brand_id' => ['required','numeric'],
           ]);

    	$product = Product::find($id);
    	$product->title = $request->title;
    	$product->description = $request->description;
    	$product->price = $request->price;
    	$product->quantity = $request->quantity;
        $product->category_id =$request->category_id;
        $product->brand_id = $request->brand_id;

    	$product->save();

    	return back()->with('update','Your Product Update Successfully!!');
    }

    public function delete($id)
    {
    	$product= Product::find($id);
    	if(!is_null($product)){
    		$product->delete();
    	}
    	return back()->with('delete','Your Product Delete Successfully!!');
    }
}
