<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Slider;


class PagesController extends Controller
{
    public function index()
    {
    	$products = Product::orderBy('id','desc')->paginate(9);
        $sliders = Slider::orderBy('priority','asc')->get();
    	return view('pages.index',compact('products','sliders'));
    }

    public function contact()
    {
    	return view('pages.contact');
    }

    public function search(Request $request)
    {
    	$search=$request->search;

    	$products = Product::orWhere('title','like','%'.$search.'%')
    	->orWhere('description','like','%'.$search.'%')
    	->orWhere('price','like','%'.$search.'%')
    	->orWhere('quantity','like','%'.$search.'%')
    	->orderBy('id','desc')
    	->paginate(5);
    	return view('pages.search',compact('search','products'));
    } 
} 
