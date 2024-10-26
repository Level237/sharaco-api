<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Interfaces\GenerateTokenInterface;
use Illuminate\Support\Facades\Auth;
class GenerateTokenUserService implements GenerateTokenInterface{

    public function generate($clientData, $userData,$password,$request)
    {
        $scope="";

        if($userData['role_id']===1){
            $scope="admin";
        }else if($userData['role_id']===2){
            $scope="user";
        }
        $request->request->add([
            "grant_type" => "password",
            "client_id"=>$clientData->id,
            'client_secret' => $clientData->secret,
            'username'      => $userData['email'],
            'password'      => $password,
            'scope'         =>$scope
        ]);

        // Fire off the internal request.
    $token = Request::create(
        'oauth/token',
        'POST',

    );
    //return response()->json(['token'=>$token]);
    return Route::dispatch($token);
        }
    }
