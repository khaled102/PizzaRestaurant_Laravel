<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\User;

class RegisterController extends Controller
{
    public $successStatus = 200;
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 

    public function register(Request $request){ 
        $validator = Validator::make($request->all(), [
            'email'         => 'required', 
            'password'      => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input); 
        $response['user'] =   $user;
        Auth::login($user);
        $success['user']  =  $user;
        $success['token'] =  $user->createToken('CMS')-> accessToken;
        return response()->json(['success' => $success], $this-> successStatus); 
    }
}
