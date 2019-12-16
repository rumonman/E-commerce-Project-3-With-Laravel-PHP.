<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Order;
use App\Cart;
use Auth;

class CheckoutController extends Controller
{
    public function index()
    {
    	$payments = Payment::orderBy('priority','asc')->get();
    	return view('frontend.checkout.index',compact('payments'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
         'name' => 'required',
         'phone_no' => 'required',
         'shipping_address' => 'required',
         'payment_method_id' => 'required',
    	]);
         
        $order = new Order();

        if($request->payment_method_id != 'cash_in'){
        	if($request->transaction_id == NULL || empty($request->transaction_id)){
        	 return back()->with('error','Please Give Transaction ID For Your Payment.');
        	}
        }
          $order->name = $request->name;
          $order->email = $request->email;
          $order->phone_no = $request->phone_no;
          $order->shipping_address = $request->shipping_address;
          $order->message = $request->message;
          $order->transaction_id = $request->transaction_id;
          $order->ip_address = request()->ip();
           if(Auth::check()){
           	$order->user_id = Auth::id();
           }
    	  $order->payment_id = Payment::where('short_name',$request->payment_method_id)->first()->id;

    	$order->save();

    	foreach(Cart::totalCarts() as $cart){
    		$cart->order_id = $order->id;
    		$cart->save();
    	}

    	return redirect()->route('home')->with('success','Your Order Has Taken Successfully .. Please Wait Admin Will Soon Confirm It');
    }
}
