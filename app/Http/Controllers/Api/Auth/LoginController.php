<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request){
        try{
            $valid = validator($request->only('email','password'), [
                'email' => 'required|email|exists:users',
                'password' => 'required|string',
            ]);

            if ($valid->fails()) {
                return response()->json(['error'=>$valid->errors()], 400);

            }

            $data=request()->only('email','password');
        }catch(\Exception $e){

        }
    }
}
