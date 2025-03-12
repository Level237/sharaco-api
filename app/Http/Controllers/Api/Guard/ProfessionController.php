<?php

namespace App\Http\Controllers\Api\Guard;

use App\Models\Profession;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfessionController extends Controller
{
    public function index()
    {
        $professions = Profession::all();
        return response()->json($professions);
    }
}
