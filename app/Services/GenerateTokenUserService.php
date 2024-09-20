<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Interfaces\GenerateTokenInterface;

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
            "grant_type" => "credentials",
            "client_id"=>2,
            'client_secret' => "vtHsZDNuSRjfxKrI5LbkqGHbM0BGMVpuMVzGPyCq",
            'username'      => $userData['email'],
            'password'      => $password,
            "scope"         =>$scope
        ]);

        // Fire off the internal request.
    $token = Request::create(
        'oauth/token',
        'POST'
    );
    return Route::dispatch($token);
        }
    }
