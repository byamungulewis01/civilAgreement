<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashController extends Controller
{
    //index
    public function index()
    {
        return view('admin.index');
    }
}
