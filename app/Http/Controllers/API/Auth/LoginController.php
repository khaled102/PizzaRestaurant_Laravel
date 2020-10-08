<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\User;

class LoginController extends Controller
{
    public $successStatus = 200;
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 

    public function login(Request $request){ 
        $validator = Validator::make($request->all(), [
            'email'         => 'required', 
            'password'      => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user(); 
            $success['user']  =  $user;
            $success['token'] =  $user->createToken('CMS')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus); 
        }else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
}
