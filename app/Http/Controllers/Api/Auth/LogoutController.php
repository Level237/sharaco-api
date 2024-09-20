<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LogoutController extends Controller
{
    public function logout(){
        $user = Auth::guard('api')->user();
        $user->token()->revoke();
        return response()->json(['message'=>"Deconnexion Reussit"]);
    }
}
