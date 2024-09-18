<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function register(RegisterRequest $request){
        $user=new User;
        $user->company_name=$request->company_name;
        $user->name=$request->name;
        $user->profile=$request->profile;
        $user->email=$request->email;
        $user->role_id=$request->role_id;
        $user->country_id=$request->country_id;
        $user->phone_number=$request->phone_number;
        $user->password=Hash::make($request->password);

        if($user->save()){

            return response($user, 200)
                 ->header('Content-Type', 'application/json');
       }else{
        return response("{error:error}", 500)
                  ->header('Content-Type', 'application/json');
       }
    }
}
