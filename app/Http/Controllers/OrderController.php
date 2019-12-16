<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

use PDF;

class OrderController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
    	$orders = Order::orderBy('id','desc')->get();
    	return view('backend.order.index',compact('orders'));
    }

    public function show($id)
    {
    	$order = Order::find($id);
      $order->is_seen_by_admin = 1;
      $order->save();
        return view('backend.order.show',compact('order'));
    }

    public function completed($id)
    {
      $order = Order::find($id);
      if($order->is_completed){
        $order->is_completed = 0;
      }else{
        $order->is_completed = 1;
      }
      $order->save();
      return back()->with('completed','Order Completed Status Change.');
    }

    public function chargeUpdate(Request $request,$id)
    {
      $order = Order::find($id);
     $order->shipping_charge = $request->shipping_charge;
     $order->custom_discount = $request->custom_discount;
     $order->save();

      return back()->with('charge','Order Change And Discount Has Change.');
    }


    public function paid($id)
    {
      $order = Order::find($id);
      if($order->is_paid){
        $order->is_paid = 0;
      }else{
        $order->is_paid = 1;
      }
      $order->save();
      return back()->with('paid','Order Paid Status Change.');
    }

    public function generateInvoice($id)
    {
      $order = Order::find($id);
      return view('backend.order.invoice', compact('order'));
      $pdf = PDF::loadView('backend.order.invoice', compact('order'));
       
      return $pdf->stream('invoice.pdf');
       //return $pdf->download('invoice.pdf');
    }

     public function delete($id)
    {
      $order= Order::find($id);
      if(!is_null($order)){

        $order->delete();
      }
      return back()->with('delete','Your Order Delete Successfully!!');
    }

}
