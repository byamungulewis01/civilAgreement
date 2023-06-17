<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgreementController extends Controller
{
    // index
    public function index()
    {
        return view('civilian.agreement');
    }
    public function show()
    {
        return view('civilian.show');
    }
    //create
    public function create()
    {
        return view('civilian.create');
    }
}
