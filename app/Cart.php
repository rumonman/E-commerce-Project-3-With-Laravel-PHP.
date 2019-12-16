<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

class Cart extends Model
{
    protected $fillable = [
        'product_id','user_id','order_id','ip_address','product_quantity',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    }

    public static function totalItems()
    {
    	
        $carts = Cart::totalCarts();
    	$total_item = 0;

    	foreach($carts as $cart){
    		$total_item +=$cart->product_quantity;
    	}
    	return $total_item;
    }

     public static function totalCarts()
    {
        if(Auth::check()){
            $carts =Cart::where('user_id', Auth::id())
            ->where('order_id',NULL)
            ->get();
        }else{
            $carts =Cart::where('ip_address',request()->ip())->where('order_id',NULL)->get();
        }
    
        return $carts;
    }
}
