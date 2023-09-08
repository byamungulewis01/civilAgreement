<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use Illuminate\Http\Request;

class CivilAgreements extends Controller
{
    public function index()
    {
        $agreements = Agreement::orderBy('id','desc')->get();
        return view('admin.agreements.index',compact('agreements'));
    }
    public function pending()
    {
        $agreements = Agreement::orderBy('id','desc')->get();
        return view('admin.agreements.index',compact('agreements'));
    }
    public function fail()
    {
        $agreements = Agreement::orderBy('id','desc')->get();
        return view('admin.agreements.index',compact('agreements'));
    }
    public function completed()
    {
        $agreements = Agreement::orderBy('id','desc')->get();
        return view('admin.agreements.index',compact('agreements'));
    }
}
