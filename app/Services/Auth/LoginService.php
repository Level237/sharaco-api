<?php

namespace App\Services\Auth;

use App\Interfaces\LoginInterface;
use App\Repositories\LoginRepository;

class LoginService implements LoginInterface{

    public function login($data){

        $dataLogin=(new LoginRepository)->login($data);

        return $dataLogin;
    }
}
