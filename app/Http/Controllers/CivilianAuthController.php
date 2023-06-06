<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CivilianAuthController extends Controller
{
    //index
    public function index()
    {
        return view('civilian-auth.index');
    }
    // register
    public function register()
    {
        return view('civilian-auth.register');
    }
    // login
    public function login()
    {
        return view('civilian-auth.login');
    }
    // forgot password
    public function forgotPassword()
    {
        return view('civilian-auth.forgot-password');
    }
    // reset password
    public function resetPassword()
    {
        return view('civilian-auth.reset-password');
    }
  
}
