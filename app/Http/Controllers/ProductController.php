<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function product()
    {
    	$products = Product::orderBy('id','desc')->get();
    	return view('frontend.product.index',compact('products'));
    }

    public function show($slug)
    {
    	$product =Product::where('slug',$slug)->first();
    	if(!is_null($product)){

        return view('frontend.product.show',compact('product'));

    	}else{

    	}
    }

    public function index()
    {
        # code...
    }

    public function category($id)
    {
        $category =Category::find($id);
        if(!is_null($category)){

        return view('frontend.category.show',compact('category'));

        }else{

        }
    }
}
