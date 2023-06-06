<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CivilianDashController extends Controller
{
    //
    public function index()
    {
        return view('civilian.index');
    }
}
