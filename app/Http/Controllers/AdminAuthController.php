<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    //index
    public function index()
    {
        return view('admin-auth.index');
    }
    // forgot password
    public function forgotPassword()
    {
        return view('admin-auth.forgetPassword');
    }
    // reset password
    public function resetPassword()
    {
        return view('admin-auth.resetPassword');
    }

}
