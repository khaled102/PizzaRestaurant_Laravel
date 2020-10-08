<?php

namespace App\Http\Controllers\API\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Guest;
use Auth;

class CartController extends Controller
{
    public $successStatus = 200;

    /** 
     * return store to cart 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function create(Request $request){
        if (!Auth::check()) {
            $cart = Cart::where('guest_id',$request->guest_id)->first();
            if(!$cart){
                $cart = new cart;
                $cart->guest_id = $request->guest_id;
            }
        }else {
            $cart = Cart::where('user_id',Auth::user()->id)->first();
            if(!$cart){
                $cart = new cart;
                $cart->user_id = Auth::user()->id;
            }
        }
        $cart->total_amount = $request->total_amount;
        $cart->save();
        $success['cart']   =  $cart;
        return response()->json($success, $this-> successStatus); 
    }
    /** 
     * return store to cart 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function store(Request $request){
        $cart_item = CartItem::where('item_id',$request->item_id)->where('cart_id',$request->cart_id)->delete();
        if(!$cart_item){
            $cart_item = new CartItem;
            $cart_item->item_id = $request->item_id;
            $cart_item->cart_id = $request->cart_id;
            $cart_item->save();
        }
        $success['cart_item']   =  $cart_item;
        return response()->json($success, $this-> successStatus); 
    }
}
