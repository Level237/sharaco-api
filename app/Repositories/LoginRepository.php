<?php

namespace App\Repositories;

use App\Models\User;

class LoginRepository{

    public function login($data){

        $user=User::where("email",$data["email"])->first();

            return $user;


    }
}
