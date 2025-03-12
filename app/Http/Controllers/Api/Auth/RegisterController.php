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
        $user->lastName=$request->lastName;
        $user->firstName=$request->firstName;
        $user->email=$request->email;
        $user->role_id=2;
        $user->isCompany=$request->isCompany;
        $user->adress_id=$request->adress_id;
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
