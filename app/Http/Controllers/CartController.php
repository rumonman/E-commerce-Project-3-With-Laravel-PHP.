<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;

use Auth;

class CartController extends Controller
{
    public function index()
    {
    	return view('frontend.carts.index');
    }


    public function store(Request $request)
    {
    	$this->validate($request, [
         'product_id' => 'required'
    	]);

      if(Auth::check()){
      	  $cart = Cart::where('user_id', Auth::id())
        ->where('product_id',$request->product_id)
        ->where('order_id',NULL)
        ->first();
    }else{
    	  $cart = Cart::where('ip_address',request()->ip())
        ->where('product_id',$request->product_id)
        ->where('order_id',NULL)
        ->first();
    }
          
          if(!is_null($cart)){
            $cart->increment('product_quantity');
          }else{
           $cart = new Cart();
    	if(Auth::check()){
    		$cart->user_id = Auth::id();
    	}

    	$cart->ip_address = request()->ip();
    	$cart->product_id = $request->product_id;
    	$cart->save();
          }
    	return back()->with('success','Product Has Added To Cart');
    }


    public function update(Request $request, $id)
    {
      $cart= Cart::find($id);

      if(!is_null($cart)){
        $cart->product_quantity = $request->product_quantity;
        $cart->save();
      }else{

      }
      return back()->with('update','Product Has Update To Cart');
    }

    public function delete($id)
    {
      $cart= Cart::find($id);
      
      if(!is_null($cart)){
        $cart->delete();
      }else{

      }
      return back()->with('delete','Product Has Delete To Cart');
    }
}
