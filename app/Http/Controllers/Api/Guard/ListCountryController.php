<?php

namespace App\Http\Controllers\Api\Guard;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListCountryController extends Controller
{
    public function index(){
        $countries=Country::all();

        return $countries;
    }
}
