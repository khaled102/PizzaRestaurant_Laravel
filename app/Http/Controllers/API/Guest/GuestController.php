<?php

namespace App\Http\Controllers\API\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Cart;

class GuestController extends Controller
{
    public $successStatus = 200;

    /** 
     * return store to cart 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function create($name, $mobile){
        $guest = Guest::where('mobile', $mobile)->first();
        if (!$guest) {
            $guest = new Guest;
            $guest->mobile = $mobile;
            $guest->name = $name;
            $guest->save();
        }
        $success['guest']   =  $guest;
        return response()->json($success, $this-> successStatus); 
    }
}
