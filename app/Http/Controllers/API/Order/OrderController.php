<?php

namespace App\Http\Controllers\API\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public $successStatus = 200;
    /** 
     * return menu items 
     * 
     * @return \Illuminate\Http\Response 
     */ 

    public function create(Request $request){ 
        if (!Auth::check()) {
            $cart = Cart::where('guest_id',$request->user_id)->first();
            $cart_items = CartItem::where('cart_id',$cart->id)->get();
            $order = Order::where('cart_id',$cart->id)->delete();
            $order = new Order;
            $order->guest_id = $request->user_id;
            $order->cart_id = $cart->id;
            $order->save();
        }else{
            $cart = Cart::where('user_id',Auth::user()->id)->first();
            $cart_items = CartItem::where('cart_id',$cart->id)->get();
            $order = Order::where('cart_id',$cart->id)->delete();
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->cart_id = $cart->id;
            $order->save();
            $cart_items = CartItem::where('cart_id',$cart->id)->delete();
        }
        $success['order']   =  'order has been created successfully';
        return response()->json($success, $this-> successStatus); 
    }
}
