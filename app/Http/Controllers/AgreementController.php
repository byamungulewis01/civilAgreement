<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    // index
    public function index()
    {
        return view('civilian.agreement.agreement');
    }
    public function show()
    {
        return view('civilian.agreement.show');
    }
    //create
    public function create()
    {
        return view('civilian.agreement.create');
    }
    // upload video
    public function upload(Request $request)
    {

        dd($request->all());


    }
}
