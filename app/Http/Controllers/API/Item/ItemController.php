<?php

namespace App\Http\Controllers\API\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;

class ItemController extends Controller
{
    public $successStatus = 200;
    /** 
     * return menu items 
     * 
     * @return \Illuminate\Http\Response 
     */ 

    public function show(Request $request){ 
        $items = Item::all();
        $success['items']   =  $items;
        return response()->json($success, $this-> successStatus); 
    }
}
