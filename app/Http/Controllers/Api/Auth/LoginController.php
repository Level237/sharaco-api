<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Services\Auth\LoginService;
use App\Http\Controllers\Controller;
use App\Repositories\GetClientRepository;
use App\Services\GenerateTokenUserService;
use Illuminate\Support\Facades\Route;

class LoginController extends Controller
{
    public function login(Request $request){
        try{
            $valid = validator($request->only('email','password'), [
                'email' => 'email|exists:users',
                'password' => 'string',
            ]);

            if($request->email=="" && $request->password==""){
                return response()->json(['message'=>"l'email ou mot de passe ne peut pas etre nul"],400);
            }
            if ($valid->fails()) {
                return response()->json(['error'=>$valid->errors()], 500);

            }

            $data=request()->only('email','password');
            $loginUser=(new LoginService())->login($data);
            $client=(new GetClientRepository())->getClient();
            $tokenUser=(new GenerateTokenUserService())->generate($client,$loginUser,$data['password'],$request);

            //$response=json_decode($tokenUser);
           return $tokenUser;
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
                'errors' => $e
              ], 500);
        }
    }

    public function refresh(Request $request){
        $client=(new GetClientRepository())->getClient();
        $request->request->add([
            'grant_type' => 'refresh_token',
            'refresh_token' => $request->refreshToken,
            "client_id"=>$client->id,
            'client_secret' => $client->secret,
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
