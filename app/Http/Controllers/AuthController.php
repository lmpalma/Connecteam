<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.login');
    }

    public function signup()
    {
        return view('frontend.signup');
    }
}
